<?php

if ( ! class_exists( 'TOC_Plus' ) ) :
	class TOC_Plus {

		private $path;      // eg /wp-content/plugins/toc
		private $options;
		private $show_toc;  // allows to override the display (eg through [no_toc] shortcode)
		private $exclude_post_types;
		private $collision_collector;  // keeps a track of used anchors for collision detecting
		private $defaults;

		public function __construct() {
			$this->show_toc            = true;
			$this->exclude_post_types  = [ 'attachment', 'revision', 'nav_menu_item', 'safecss' ];
			$this->collision_collector = [];

			// get options
			$this->defaults = [  // default options
				'fragment_prefix'                    => 'i',
				'position'                           => TOC_POSITION_BEFORE_FIRST_HEADING,
				'start'                              => 4,
				'show_heading_text'                  => true,
				'heading_text'                       => 'Contents',
				'auto_insert_post_types'             => [ 'page' ],
				'show_heirarchy'                     => true,
				'ordered_list'                       => true,
				'smooth_scroll'                      => false,
				'smooth_scroll_offset'               => TOC_SMOOTH_SCROLL_OFFSET,
				'visibility'                         => true,
				'visibility_show'                    => 'show',
				'visibility_hide'                    => 'hide',
				'visibility_hide_by_default'         => false,
				'width'                              => 'Auto',
				'width_custom'                       => '275',
				'width_custom_units'                 => 'px',
				'wrapping'                           => TOC_WRAPPING_NONE,
				'font_size'                          => '95',
				'font_size_units'                    => '%',
				'theme'                              => TOC_THEME_GREY,
				'custom_background_colour'           => TOC_DEFAULT_BACKGROUND_COLOUR,
				'custom_border_colour'               => TOC_DEFAULT_BORDER_COLOUR,
				'custom_title_colour'                => TOC_DEFAULT_TITLE_COLOUR,
				'custom_links_colour'                => TOC_DEFAULT_LINKS_COLOUR,
				'custom_links_hover_colour'          => TOC_DEFAULT_LINKS_HOVER_COLOUR,
				'custom_links_visited_colour'        => TOC_DEFAULT_LINKS_VISITED_COLOUR,
				'lowercase'                          => false,
				'hyphenate'                          => false,
				'bullet_spacing'                     => false,
				'include_homepage'                   => false,
				'exclude_css'                        => false,
				'exclude'                            => '',
				'heading_levels'                     => [ 1, 2, 3, 4, 5, 6 ],
				'restrict_path'                      => '',
				'css_container_class'                => '',
				'sitemap_show_page_listing'          => true,
				'sitemap_show_category_listing'      => true,
				'sitemap_heading_type'               => 3,
				'sitemap_pages'                      => 'Pages',
				'sitemap_categories'                 => 'Categories',
				'show_toc_in_widget_only'            => false,
				'show_toc_in_widget_only_post_types' => [ 'page' ],
				'rest_toc_output'                    => false,
			];

			$options       = get_option( 'toc-options', $this->defaults );
			$this->options = wp_parse_args( $options, $this->defaults );

			add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ] );
			add_action( 'admin_init', [ $this, 'admin_init' ] );
			add_action( 'admin_menu', [ $this, 'admin_menu' ] );
			add_action( 'widgets_init', [ $this, 'widgets_init' ] );
			add_action( 'delete_widget', [ $this, 'sidebar_admin_setup' ], 10, 3 );
			add_action( 'init', [ $this, 'init' ] );

			add_filter( 'the_content', [ $this, 'the_content' ], 100 );  // run after shortcodes are interpreted (level 10)
			add_filter( 'plugin_action_links', [ $this, 'plugin_action_links' ], 10, 2 );
			add_filter( 'widget_text', 'do_shortcode' );

			add_shortcode( 'toc', [ $this, 'shortcode_toc' ] );
			add_shortcode( 'no_toc', [ $this, 'shortcode_no_toc' ] );
			add_shortcode( 'sitemap', [ $this, 'shortcode_sitemap' ] );
			add_shortcode( 'sitemap_pages', [ $this, 'shortcode_sitemap_pages' ] );
			add_shortcode( 'sitemap_categories', [ $this, 'shortcode_sitemap_categories' ] );
			add_shortcode( 'sitemap_posts', [ $this, 'shortcode_sitemap_posts' ] );
		}


		public function __destruct() {}


		public function get_options() {
			return $this->options;
		}


		public function set_option( $options ) {
			$this->options = array_merge( $this->options, $options );
		}


		/**
		 * Allows the developer to disable TOC execution
		 */
		public function disable() {
			$this->show_toc = false;
		}


		/**
		 * Allows the developer to enable TOC execution
		 */
		public function enable() {
			$this->show_toc = true;
		}


		public function set_show_toc_in_widget_only( $value = false ) {
			if ( $value ) {
				$this->options['show_toc_in_widget_only'] = true;
			} else {
				$this->options['show_toc_in_widget_only'] = false;
			}

			update_option( 'toc-options', $this->options );
		}


		public function set_show_toc_in_widget_only_post_types( $value = false ) {
			if ( $value ) {
				$this->options['show_toc_in_widget_only_post_types'] = $value;
			} else {
				$this->options['show_toc_in_widget_only_post_types'] = [];
			}

			update_option( 'toc-options', $this->options );
		}


		public function get_exclude_post_types() {
			return $this->exclude_post_types;
		}


		public function plugin_action_links( $links, $file ) {
			if ( 'table-of-contents-plus/toc.php' === $file ) {
				$settings_link = '<a href="options-general.php?page=toc">' . __( 'Settings', 'table-of-contents-plus' ) . '</a>';
				$links         = array_merge( [ $settings_link ], $links );
			}
			return $links;
		}


		public function shortcode_toc( $attributes ) {
			$atts = shortcode_atts(
				[
					'label'          => $this->options['heading_text'],
					'label_show'     => $this->options['visibility_show'],
					'label_hide'     => $this->options['visibility_hide'],
					'no_label'       => false,
					'class'          => false,
					'wrapping'       => $this->options['wrapping'],
					'heading_levels' => $this->options['heading_levels'],
					'exclude'        => $this->options['exclude'],
					'collapse'       => false,
					'no_numbers'     => false,
					'start'          => $this->options['start'],
				],
				$attributes
			);

			$re_enqueue_scripts = false;

			if ( $atts['no_label'] ) {
				$this->options['show_heading_text'] = false;
			}
			if ( $atts['label'] ) {
				$this->options['heading_text'] = wp_kses_post( html_entity_decode( $atts['label'] ) );
			}
			if ( $atts['label_show'] ) {
				$this->options['visibility_show'] = wp_kses_post( $atts['label_show'] );
				$re_enqueue_scripts               = true;
			}
			if ( $atts['label_hide'] ) {
				$this->options['visibility_hide'] = wp_kses_post( $atts['label_hide'] );
				$re_enqueue_scripts               = true;
			}
			if ( $atts['class'] ) {
				$this->options['css_container_class'] = wp_kses_post( html_entity_decode( $atts['class'] ) );
			}
			if ( $atts['wrapping'] ) {
				switch ( strtolower( trim( $atts['wrapping'] ) ) ) {
					case 'left':
						$this->options['wrapping'] = TOC_WRAPPING_LEFT;
						break;

					case 'right':
						$this->options['wrapping'] = TOC_WRAPPING_RIGHT;
						break;

					default:
						// do nothing
				}
			}

			if ( $atts['exclude'] ) {
				$this->options['exclude'] = $atts['exclude'];
			}
			if ( $atts['collapse'] ) {
				$this->options['visibility_hide_by_default'] = true;
				$re_enqueue_scripts                          = true;
			}

			if ( $atts['no_numbers'] ) {
				$this->options['ordered_list'] = false;
			}

			if ( is_numeric( $atts['start'] ) ) {
				$this->options['start'] = $atts['start'];
			}

			if ( $re_enqueue_scripts ) {
				wp_deregister_script( 'toc-front' );
				do_action( 'wp_enqueue_scripts' );
			}

			// if $atts['heading_levels'] is an array, then it came from the global options
			// and wasn't provided by per instance
			if ( $atts['heading_levels'] && ! is_array( $atts['heading_levels'] ) ) {
				// make sure they are numbers between 1 and 6 and put into
				// the $clean_heading_levels array if not already
				$clean_heading_levels = [];
				foreach ( explode( ',', $atts['heading_levels'] ) as $heading_level ) {
					if ( is_numeric( $heading_level ) ) {
						$heading_level = (int) $heading_level;
						if ( 1 <= $heading_level && $heading_level <= 6 ) {
							if ( ! in_array( $heading_level, $clean_heading_levels, true ) ) {
								$clean_heading_levels[] = (int) $heading_level;
							}
						}
					}
				}

				if ( count( $clean_heading_levels ) > 0 ) {
					$this->options['heading_levels'] = $clean_heading_levels;
				}
			}

			if ( ! is_search() && ! is_archive() && ! is_feed() ) {
				return '<!--TOC-->';
			} else {
				return '';
			}
		}


		public function shortcode_no_toc( $atts ) {
			$this->show_toc = false;

			return '';
		}


		public function shortcode_sitemap( $atts ) {
			$html = '';

			// only do the following if enabled
			if ( $this->options['sitemap_show_page_listing'] || $this->options['sitemap_show_category_listing'] ) {
				$html = '<div class="toc_sitemap">';
				if ( $this->options['sitemap_show_page_listing'] ) {
					$html .=
						'<h' . $this->options['sitemap_heading_type'] . ' class="toc_sitemap_pages">' . htmlentities( $this->options['sitemap_pages'], ENT_COMPAT, 'UTF-8' ) . '</h' . $this->options['sitemap_heading_type'] . '>' .
						'<ul class="toc_sitemap_pages_list">' .
							wp_list_pages(
								[
									'title_li' => '',
									'echo'     => false,
								]
							) .
						'</ul>';
				}
				if ( $this->options['sitemap_show_category_listing'] ) {
					$html .=
						'<h' . $this->options['sitemap_heading_type'] . ' class="toc_sitemap_categories">' . htmlentities( $this->options['sitemap_categories'], ENT_COMPAT, 'UTF-8' ) . '</h' . $this->options['sitemap_heading_type'] . '>' .
						'<ul class="toc_sitemap_categories_list">' .
							wp_list_categories(
								[
									'title_li' => '',
									'echo'     => false,
								]
							) .
						'</ul>';
				}
				$html .= '</div>';
			}

			return $html;
		}


		public function shortcode_sitemap_pages( $attributes ) {
			$atts = shortcode_atts(
				[
					'heading'      => $this->options['sitemap_heading_type'],
					'label'        => $this->options['sitemap_pages'],
					'no_label'     => false,
					'exclude'      => '',
					'exclude_tree' => '',
					'child_of'     => 0,
				],
				$attributes
			);

			$atts['heading'] = intval( $atts['heading'] );  // make sure it's an integer

			if ( $atts['heading'] < 1 || $atts['heading'] > 6 ) {  // h1 to h6 are valid
				$atts['heading'] = $this->options['sitemap_heading_type'];
			}

			if ( 'current' === strtolower( $atts['child_of'] ) ) {
				$atts['child_of'] = get_the_ID();
			} elseif ( is_numeric( $atts['child_of'] ) ) {
				$atts['child_of'] = intval( $atts['child_of'] );
			} else {
				$atts['child_of'] = 0;
			}

			$html = '<div class="toc_sitemap">';
			if ( ! $atts['no_label'] ) {
				$html .= '<h' . $atts['heading'] . ' class="toc_sitemap_pages">' . htmlentities( $atts['label'], ENT_COMPAT, 'UTF-8' ) . '</h' . $atts['heading'] . '>';
			}
			$html .=
					'<ul class="toc_sitemap_pages_list">' .
						wp_list_pages(
							[
								'title_li'     => '',
								'echo'         => false,
								'exclude'      => $atts['exclude'],
								'exclude_tree' => $atts['exclude_tree'],
								'hierarchical' => true,
								'child_of'     => $atts['child_of'],
							]
						) .
					'</ul>' .
				'</div>';

			return $html;
		}


		public function shortcode_sitemap_categories( $attributes ) {
			$atts = shortcode_atts(
				[
					'heading'      => $this->options['sitemap_heading_type'],
					'label'        => $this->options['sitemap_categories'],
					'no_label'     => false,
					'exclude'      => '',
					'exclude_tree' => '',
				],
				$attributes
			);

			$atts['heading'] = intval( $atts['heading'] );  // make sure it's an integer

			if ( $atts['heading'] < 1 || $atts['heading'] > 6 ) {  // h1 to h6 are valid
				$atts['heading'] = $this->options['sitemap_heading_type'];
			}

			$html = '<div class="toc_sitemap">';
			if ( ! $atts['no_label'] ) {
				$html .= '<h' . $atts['heading'] . ' class="toc_sitemap_categories">' . htmlentities( $atts['label'], ENT_COMPAT, 'UTF-8' ) . '</h' . $atts['heading'] . '>';
			}
			$html .=
					'<ul class="toc_sitemap_categories_list">' .
						wp_list_categories(
							[
								'title_li'     => '',
								'echo'         => false,
								'exclude'      => $atts['exclude'],
								'exclude_tree' => $atts['exclude_tree'],
							]
						) .
					'</ul>' .
				'</div>';

			return $html;
		}


		public function shortcode_sitemap_posts( $attributes ) {
			$atts = shortcode_atts(
				[
					'order'    => 'ASC',
					'orderby'  => 'title',
					'separate' => true,
				],
				$attributes
			);

			$articles = new WP_Query(
				[
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'order'          => $atts['order'],
					'orderby'        => $atts['orderby'],
					'posts_per_page' => -1,
				]
			);

			$html   = '';
			$letter = '';

			$atts['separate'] = strtolower( $atts['separate'] );
			if ( 'false' === $atts['separate'] || 'no' === $atts['separate'] ) {
				$atts['separate'] = false;
			}

			while ( $articles->have_posts() ) {
				$articles->the_post();
				$title = wp_strip_all_tags( get_the_title() );

				if ( $atts['separate'] ) {
					if ( strtolower( $title[0] ) !== $letter ) {
						if ( $letter ) {
							$html .= '</ul></div>';
						}

						$html  .= '<div class="toc_sitemap_posts_section"><p class="toc_sitemap_posts_letter">' . strtolower( $title[0] ) . '</p><ul class="toc_sitemap_posts_list">';
						$letter = strtolower( $title[0] );
					}
				}

				$html .= '<li><a href="' . get_permalink( $articles->post->ID ) . '">' . $title . '</a></li>';
			}

			if ( $html ) {
				if ( $atts['separate'] ) {
					$html .= '</div>';
				} else {
					$html = '<div class="toc_sitemap_posts_section"><ul class="toc_sitemap_posts_list">' . $html . '</ul></div>';
				}
			}

			wp_reset_postdata();

			return $html;
		}


		/**
		 * Register and load CSS and javascript files for frontend.
		 */
		public function wp_enqueue_scripts() {
			$js_vars = [];

			wp_register_style( 'toc-screen', TOC_PLUGIN_PATH . '/screen.min.css', [], TOC_VERSION );
			wp_register_script( 'toc-front', TOC_PLUGIN_PATH . '/front.min.js', [ 'jquery' ], TOC_VERSION, true );

			// enqueue them!
			if ( ! $this->options['exclude_css'] ) {
				wp_enqueue_style( 'toc-screen' );

				// add any admin GUI customisations
				$custom_css = $this->get_custom_css();
				if ( $custom_css ) {
					wp_add_inline_style( 'toc-screen', $custom_css );
				}
			}

			if ( $this->options['smooth_scroll'] ) {
				$js_vars['smooth_scroll'] = true;
			}
			wp_enqueue_script( 'toc-front' );
			if ( $this->options['show_heading_text'] && $this->options['visibility'] ) {
				$width                      = ( 'User defined' !== $this->options['width'] ) ? $this->options['width'] : $this->options['width_custom'] . $this->options['width_custom_units'];
				$js_vars['visibility_show'] = esc_js( wp_kses_post( $this->options['visibility_show'] ) );
				$js_vars['visibility_hide'] = esc_js( wp_kses_post( $this->options['visibility_hide'] ) );
				if ( $this->options['visibility_hide_by_default'] ) {
					$js_vars['visibility_hide_by_default'] = true;
				}
				$js_vars['width'] = esc_js( $width );
			}
			if ( TOC_SMOOTH_SCROLL_OFFSET !== $this->options['smooth_scroll_offset'] ) {
				$js_vars['smooth_scroll_offset'] = esc_js( $this->options['smooth_scroll_offset'] );
			}

			if ( count( $js_vars ) > 0 ) {
				wp_localize_script(
					'toc-front',
					'tocplus',
					$js_vars
				);
			}
		}


		public function plugins_loaded() {
			load_plugin_textdomain( 'table-of-contents-plus', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}


		public function admin_init() {
			wp_register_script( 'toc_admin_script', TOC_PLUGIN_PATH . '/admin.js', [], TOC_VERSION, true );
			wp_register_style( 'toc_admin_style', TOC_PLUGIN_PATH . '/admin.css', [], TOC_VERSION );
		}


		public function admin_menu() {
			$page = add_submenu_page(
				'options-general.php',
				__( 'TOC', 'table-of-contents-plus' ) . '+',
				__( 'TOC', 'table-of-contents-plus' ) . '+',
				'manage_options',
				'toc',
				[ $this, 'admin_options' ]
			);

			add_action( 'admin_print_styles-' . $page, [ $this, 'admin_options_head' ] );
		}


		public function widgets_init() {
			register_widget( 'toc_widget' );
		}


		/**
		 * Remove widget options on widget deletion
		 */
		public function sidebar_admin_setup( $widget_id, $sidebar_id, $id_base ) {
			// If we aren't trying to delete a TOC widget, return early.
			if ( 'toc-widget' !== $id_base ) {
				return;
			}

			// this action is loaded at the start of the widget screen
			// so only do the following when a form action has been initiated
			$this->set_show_toc_in_widget_only( false );
			$this->set_show_toc_in_widget_only_post_types( [ 'page' ] );
		}


		public function init() {
			// Add compatibility with Rank Math SEO
			if ( class_exists( 'RankMath' ) ) {
				add_filter(
					'rank_math/researches/toc_plugins',
					function ( $toc_plugins ) {
						$toc_plugins['table-of-contents-plus/toc.php'] = 'Table of Contents Plus';
						return $toc_plugins;
					}
				);
			}
		}


		/**
		 * Load needed scripts and styles only on the toc administration interface.
		 */
		public function admin_options_head() {
			wp_enqueue_style( 'farbtastic' );
			wp_enqueue_script( 'farbtastic' );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'toc_admin_script' );
			wp_enqueue_style( 'toc_admin_style' );
		}


		/**
		 * Tries to convert $input into a valid hex colour.
		 * Returns $default if $input is not a hex value, otherwise returns verified hex.
		 */
		private function hex_value( $input = '', $default = '#' ) {
			$return = $default;

			if ( $input ) {
				// strip out non hex chars
				$return = preg_replace( '/[^a-fA-F0-9]*/', '', $input );

				switch ( strlen( $return ) ) {
					case 3:  // do next
					case 6:
						$return = '#' . $return;
						break;

					default:
						if ( strlen( $return ) > 6 ) {
							$return = '#' . substr( $return, 0, 6 );  // if > 6 chars, then take the first 6
						} elseif ( strlen( $return ) > 3 && strlen( $return ) < 6 ) {
							$return = '#' . substr( $return, 0, 3 );  // if between 3 and 6, then take first 3
						} else {
							$return = $default;  // not valid, return $default
						}
				}
			}

			return $return;
		}


		private function save_admin_options() {
			global $post_id;

			// security check
			if ( ! isset( $_POST['toc-admin-options'] ) ) {
				return false;
			}
			if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['toc-admin-options'] ) ), plugin_basename( __FILE__ ) ) ) {
				return false;
			}

			// require an administrator level to save
			if ( ! current_user_can( 'manage_options', $post_id ) ) {
				return false;
			}

			// use stripslashes on free text fields that can have ' " \
			// WordPress automatically slashes these characters as part of
			// wp-includes/load.php::wp_magic_quotes()

			$custom_background_colour    = ! empty( $_POST['custom_background_colour'] ) ? $this->hex_value( trim( wp_unslash( $_POST['custom_background_colour'] ) ), TOC_DEFAULT_BACKGROUND_COLOUR ) : TOC_DEFAULT_BACKGROUND_COLOUR; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$custom_border_colour        = ! empty( $_POST['custom_border_colour'] ) ? $this->hex_value( trim( wp_unslash( $_POST['custom_border_colour'] ) ), TOC_DEFAULT_BORDER_COLOUR ) : TOC_DEFAULT_BORDER_COLOUR; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$custom_title_colour         = ! empty( $_POST['custom_title_colour'] ) ? $this->hex_value( trim( wp_unslash( $_POST['custom_title_colour'] ) ), TOC_DEFAULT_TITLE_COLOUR ) : TOC_DEFAULT_TITLE_COLOUR; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$custom_links_colour         = ! empty( $_POST['custom_links_colour'] ) ? $this->hex_value( trim( wp_unslash( $_POST['custom_links_colour'] ) ), TOC_DEFAULT_LINKS_COLOUR ) : TOC_DEFAULT_LINKS_COLOUR; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$custom_links_hover_colour   = ! empty( $_POST['custom_links_hover_colour'] ) ? $this->hex_value( trim( wp_unslash( $_POST['custom_links_hover_colour'] ) ), TOC_DEFAULT_LINKS_HOVER_COLOUR ) : TOC_DEFAULT_LINKS_HOVER_COLOUR; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$custom_links_visited_colour = ! empty( $_POST['custom_links_visited_colour'] ) ? $this->hex_value( trim( wp_unslash( $_POST['custom_links_visited_colour'] ) ), TOC_DEFAULT_LINKS_VISITED_COLOUR ) : TOC_DEFAULT_LINKS_VISITED_COLOUR; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

			$restrict_path = ! empty( $_POST['restrict_path'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['restrict_path'] ) ) ) : '';

			if ( $restrict_path ) {
				if ( strpos( $restrict_path, '/' ) !== 0 ) {
					// restrict path did not start with a / so unset it
					$restrict_path = '';
				}
			}

			$fragment_prefix               = isset( $_POST['fragment_prefix'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['fragment_prefix'] ) ) ) : $this->defaults['fragment_prefix'];
			$position                      = isset( $_POST['position'] ) ? intval( $_POST['position'] ) : $this->defaults['position'];
			$start                         = isset( $_POST['start'] ) ? intval( $_POST['start'] ) : $this->defaults['start'];
			$show_heading_text             = isset( $_POST['show_heading_text'] ) && (bool) $_POST['show_heading_text'];
			$heading_text                  = isset( $_POST['heading_text'] ) ? stripslashes( trim( sanitize_text_field( wp_unslash( $_POST['heading_text'] ) ) ) ) : $this->defaults['heading_text'];
			$auto_insert_post_types        = isset( $_POST['auto_insert_post_types'] ) ? array_map( 'sanitize_text_field', array_map( 'wp_unslash', (array) $_POST['auto_insert_post_types'] ) ) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
			$show_heirarchy                = isset( $_POST['show_heirarchy'] ) && (bool) $_POST['show_heirarchy'];
			$ordered_list                  = isset( $_POST['ordered_list'] ) && (bool) $_POST['ordered_list'];
			$smooth_scroll                 = isset( $_POST['smooth_scroll'] ) && (bool) $_POST['smooth_scroll'];
			$smooth_scroll_offset          = isset( $_POST['smooth_scroll_offset'] ) ? intval( $_POST['smooth_scroll_offset'] ) : $this->defaults['smooth_scroll_offset'];
			$visibility                    = isset( $_POST['visibility'] ) && (bool) $_POST['visibility'];
			$visibility_show               = isset( $_POST['visibility_show'] ) ? stripslashes( trim( sanitize_text_field( wp_unslash( $_POST['visibility_show'] ) ) ) ) : $this->defaults['visibility_show'];
			$visibility_hide               = isset( $_POST['visibility_hide'] ) ? stripslashes( trim( sanitize_text_field( wp_unslash( $_POST['visibility_hide'] ) ) ) ) : $this->defaults['visibility_hide'];
			$visibility_hide_by_default    = isset( $_POST['visibility_hide_by_default'] ) && (bool) $_POST['visibility_hide_by_default'];
			$width                         = isset( $_POST['width'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['width'] ) ) ) : $this->defaults['width'];
			$width_custom                  = isset( $_POST['width_custom'] ) ? floatval( $_POST['width_custom'] ) : $this->defaults['width_custom'];
			$width_custom_units            = isset( $_POST['width_custom_units'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['width_custom_units'] ) ) ) : $this->defaults['width_custom_units'];
			$wrapping                      = isset( $_POST['wrapping'] ) ? intval( $_POST['wrapping'] ) : $this->defaults['wrapping'];
			$font_size                     = isset( $_POST['font_size'] ) ? floatval( $_POST['font_size'] ) : $this->defaults['font_size'];
			$font_size_units               = isset( $_POST['font_size_units'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['font_size_units'] ) ) ) : $this->defaults['font_size_units'];
			$theme                         = isset( $_POST['theme'] ) ? intval( $_POST['theme'] ) : $this->defaults['theme'];
			$lowercase                     = isset( $_POST['lowercase'] ) && (bool) $_POST['lowercase'];
			$hyphenate                     = isset( $_POST['hyphenate'] ) && (bool) $_POST['hyphenate'];
			$bullet_spacing                = isset( $_POST['bullet_spacing'] ) && (bool) $_POST['bullet_spacing'];
			$include_homepage              = isset( $_POST['include_homepage'] ) && (bool) $_POST['include_homepage'];
			$exclude_css                   = isset( $_POST['exclude_css'] ) && (bool) $_POST['exclude_css'];
			$heading_levels                = isset( $_POST['heading_levels'] ) ? array_map( 'intval', (array) $_POST['heading_levels'] ) : [];
			$exclude                       = isset( $_POST['exclude'] ) ? stripslashes( trim( sanitize_text_field( wp_unslash( $_POST['exclude'] ) ) ) ) : $this->defaults['exclude'];
			$sitemap_show_page_listing     = isset( $_POST['sitemap_show_page_listing'] ) && (bool) $_POST['sitemap_show_page_listing'];
			$sitemap_show_category_listing = isset( $_POST['sitemap_show_category_listing'] ) && (bool) $_POST['sitemap_show_category_listing'];
			$sitemap_heading_type          = isset( $_POST['sitemap_heading_type'] ) ? intval( $_POST['sitemap_heading_type'] ) : $this->defaults['sitemap_heading_type'];
			$sitemap_pages                 = isset( $_POST['sitemap_pages'] ) ? stripslashes( trim( sanitize_text_field( wp_unslash( $_POST['sitemap_pages'] ) ) ) ) : $this->defaults['sitemap_pages'];
			$sitemap_categories            = isset( $_POST['sitemap_categories'] ) ? stripslashes( trim( sanitize_text_field( wp_unslash( $_POST['sitemap_categories'] ) ) ) ) : $this->defaults['sitemap_categories'];
			$rest_toc_output               = isset( $_POST['rest_toc_output'] ) && (bool) $_POST['rest_toc_output'];

			$this->options = array_merge(
				$this->options,
				[
					'fragment_prefix'               => $fragment_prefix,
					'position'                      => $position,
					'start'                         => $start,
					'show_heading_text'             => $show_heading_text,
					'heading_text'                  => $heading_text,
					'auto_insert_post_types'        => $auto_insert_post_types,
					'show_heirarchy'                => $show_heirarchy,
					'ordered_list'                  => $ordered_list,
					'smooth_scroll'                 => $smooth_scroll,
					'smooth_scroll_offset'          => $smooth_scroll_offset,
					'visibility'                    => $visibility,
					'visibility_show'               => $visibility_show,
					'visibility_hide'               => $visibility_hide,
					'visibility_hide_by_default'    => $visibility_hide_by_default,
					'width'                         => $width,
					'width_custom'                  => $width_custom,
					'width_custom_units'            => $width_custom_units,
					'wrapping'                      => $wrapping,
					'font_size'                     => $font_size,
					'font_size_units'               => $font_size_units,
					'theme'                         => $theme,
					'custom_background_colour'      => $custom_background_colour,
					'custom_border_colour'          => $custom_border_colour,
					'custom_title_colour'           => $custom_title_colour,
					'custom_links_colour'           => $custom_links_colour,
					'custom_links_hover_colour'     => $custom_links_hover_colour,
					'custom_links_visited_colour'   => $custom_links_visited_colour,
					'lowercase'                     => $lowercase,
					'hyphenate'                     => $hyphenate,
					'bullet_spacing'                => $bullet_spacing,
					'include_homepage'              => $include_homepage,
					'exclude_css'                   => $exclude_css,
					'heading_levels'                => $heading_levels,
					'exclude'                       => $exclude,
					'restrict_path'                 => $restrict_path,
					'sitemap_show_page_listing'     => $sitemap_show_page_listing,
					'sitemap_show_category_listing' => $sitemap_show_category_listing,
					'sitemap_heading_type'          => $sitemap_heading_type,
					'sitemap_pages'                 => $sitemap_pages,
					'sitemap_categories'            => $sitemap_categories,
					'rest_toc_output'               => $rest_toc_output,
				]
			);

			// update_option will return false if no changes were made
			update_option( 'toc-options', $this->options );

			return true;
		}


		public function admin_options() {
			$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$msg  = '';

			// was there a form submission, if so, do security checks and try to save form
			if ( isset( $_GET['update'] ) ) {  // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( $this->save_admin_options() ) {
					$msg = '<div id="message" class="updated fade"><p>' . __( 'Options saved.', 'table-of-contents-plus' ) . '</p></div>';
				} else {
					$msg = '<div id="message" class="error fade"><p>' . __( 'Save failed.', 'table-of-contents-plus' ) . '</p></div>';
				}
			}

			?>
<div id='toc' class='wrap'>
<div id="icon-options-general" class="icon32"><br></div>
<h2>Table of Contents Plus</h2>
			<?php echo wp_kses_post( $msg ); ?>
<form method="post" action="<?php echo esc_url( '?page=' . $page . '&update' ); ?>">
			<?php wp_nonce_field( plugin_basename( __FILE__ ), 'toc-admin-options' ); ?>

<ul id="tabbed-nav">
	<li><a href="#tab1"><?php esc_html_e( 'Main Options', 'table-of-contents-plus' ); ?></a></li>
	<li><a href="#tab2"><?php esc_html_e( 'Sitemap', 'table-of-contents-plus' ); ?></a></li>
	<li class="url"><a href="https://zedzedzed.github.io/docs/tocplus.html"><?php esc_html_e( 'Help', 'table-of-contents-plus' ); ?></a></li>
</ul>
<div class="tab_container">
	<div id="tab1" class="tab_content">

<table class="form-table">
<tbody>
<tr>
	<th><label for="position"><?php esc_html_e( 'Position', 'table-of-contents-plus' ); ?></label></th>
	<td>
		<select name="position" id="position">
			<option value="<?php echo esc_attr( TOC_POSITION_BEFORE_FIRST_HEADING ); ?>"<?php if ( TOC_POSITION_BEFORE_FIRST_HEADING === $this->options['position'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Before first heading (default)', 'table-of-contents-plus' ); ?></option>
			<option value="<?php echo esc_attr( TOC_POSITION_AFTER_FIRST_HEADING ); ?>"<?php if ( TOC_POSITION_AFTER_FIRST_HEADING === $this->options['position'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'After first heading', 'table-of-contents-plus' ); ?></option>
			<option value="<?php echo esc_attr( TOC_POSITION_TOP ); ?>"<?php if ( TOC_POSITION_TOP === $this->options['position'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Top', 'table-of-contents-plus' ); ?></option>
			<option value="<?php echo esc_attr( TOC_POSITION_BOTTOM ); ?>"<?php if ( TOC_POSITION_BOTTOM === $this->options['position'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Bottom', 'table-of-contents-plus' ); ?></option>
		</select>
	</td>
</tr>
<tr>
	<th><label for="start"><?php esc_html_e( 'Show when', 'table-of-contents-plus' ); ?></label></th>
	<td>
		<select name="start" id="start">
			<?php
			for ( $i = TOC_MIN_START; $i <= TOC_MAX_START; $i++ ) {
				echo '<option value="' . esc_attr( $i ) . '"';
				if ( $i === $this->options['start'] ) {
					echo ' selected="selected"';
				}
				echo '>' . esc_html( $i ) . '</option>' . "\n";
			}
			?>
		</select>
			<?php
			/* translators: text follows drop down list of numbers */
			esc_html_e( 'or more headings are present', 'table-of-contents-plus' );
			?>
	</td>
</tr>
<tr>
	<th><?php esc_html_e( 'Auto insert for the following content types', 'table-of-contents-plus' ); ?></th>
	<td><?php
	foreach ( get_post_types() as $post_type ) {
		// make sure the post type isn't on the exclusion list
		if ( ! in_array( $post_type, $this->exclude_post_types, true ) ) {
			echo '<input type="checkbox" value="' . esc_attr( $post_type ) . '" id="auto_insert_post_types_' . esc_attr( $post_type ) . '" name="auto_insert_post_types[]"';
			if ( in_array( $post_type, $this->options['auto_insert_post_types'], true ) ) echo ' checked="checked"';
			echo ' /><label for="auto_insert_post_types_' . esc_attr( $post_type ) . '"> ' . esc_html( $post_type ) . '</label><br>';
		}
	}
	?>
	</td>
</tr>
<tr>
	<th><label for="show_heading_text"><?php
	/* translators: this is the title of the table of contents */
	esc_html_e( 'Heading text', 'table-of-contents-plus' ); ?></label></th>
	<td>
		<input type="checkbox" value="1" id="show_heading_text" name="show_heading_text"<?php if ( $this->options['show_heading_text'] ) echo ' checked="checked"'; ?> /><label for="show_heading_text"> <?php esc_html_e( 'Show title on top of the table of contents', 'table-of-contents-plus' ); ?></label><br>
		<div class="more_toc_options<?php if ( ! $this->options['show_heading_text'] ) echo ' disabled'; ?>">
			<input type="text" class="regular-text" value="<?php echo esc_attr( $this->options['heading_text'] ); ?>" id="heading_text" name="heading_text">
			<span class="description"><label for="heading_text"><?php esc_html_e( 'Eg: Contents, Table of Contents, Page Contents', 'table-of-contents-plus' ); ?></label></span><br><br>

			<input type="checkbox" value="1" id="visibility" name="visibility"<?php if ( $this->options['visibility'] ) echo ' checked="checked"'; ?> /><label for="visibility"> <?php esc_html_e( 'Allow the user to toggle the visibility of the table of contents', 'table-of-contents-plus' ); ?></label><br>
			<div class="more_toc_options<?php if ( ! $this->options['visibility'] ) echo ' disabled'; ?>">
				<table class="more_toc_options_table">
				<tbody>
				<tr>
					<th><label for="visibility_show"><?php esc_html_e( 'Show text', 'table-of-contents-plus' ); ?></label></th>
					<td><input type="text" class="" value="<?php echo esc_attr( $this->options['visibility_show'] ); ?>" id="visibility_show" name="visibility_show">
					<span class="description"><label for="visibility_show"><?php
					/* translators: example text to display when you want to expand the table of contents */
					esc_html_e( 'Eg: show', 'table-of-contents-plus' ); ?></label></span></td>
				</tr>
				<tr>
					<th><label for="visibility_hide"><?php esc_html_e( 'Hide text', 'table-of-contents-plus' ); ?></label></th>
					<td><input type="text" class="" value="<?php echo esc_attr( $this->options['visibility_hide'] ); ?>" id="visibility_hide" name="visibility_hide">
					<span class="description"><label for="visibility_hide"><?php
					/* translators: example text to display when you want to collapse the table of contents */
					esc_html_e( 'Eg: hide', 'table-of-contents-plus' ); ?></label></span></td>
				</tr>
				</tbody>
				</table>
				<input type="checkbox" value="1" id="visibility_hide_by_default" name="visibility_hide_by_default"<?php if ( $this->options['visibility_hide_by_default'] ) echo ' checked="checked"'; ?> /><label for="visibility_hide_by_default"> <?php esc_html_e( 'Hide the table of contents initially', 'table-of-contents-plus' ); ?></label>
			</div>
		</div>
	</td>
</tr>
<tr>
	<th><label for="show_heirarchy"><?php esc_html_e( 'Show hierarchy', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="checkbox" value="1" id="show_heirarchy" name="show_heirarchy"<?php if ( $this->options['show_heirarchy'] ) echo ' checked="checked"'; ?> /></td>
</tr>
<tr>
	<th><label for="ordered_list"><?php esc_html_e( 'Number list items', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="checkbox" value="1" id="ordered_list" name="ordered_list"<?php if ( $this->options['ordered_list'] ) echo ' checked="checked"'; ?> /></td>
</tr>
<tr>
	<th><label for="smooth_scroll"><?php esc_html_e( 'Enable smooth scroll effect', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="checkbox" value="1" id="smooth_scroll" name="smooth_scroll"<?php if ( $this->options['smooth_scroll'] ) echo ' checked="checked"'; ?> /><label for="smooth_scroll"> <?php esc_html_e( 'Scroll rather than jump to the anchor link', 'table-of-contents-plus' ); ?></label></td>
</tr>
</tbody>
</table>

<h3><?php esc_html_e( 'Appearance', 'table-of-contents-plus' ); ?></h3>
<table class="form-table">
<tbody>
<tr>
	<th><label for="width"><?php esc_html_e( 'Width', 'table-of-contents-plus' ); ?></label></td>
	<td>
		<select name="width" id="width">
			<optgroup label="<?php esc_html_e( 'Fixed width', 'table-of-contents-plus' ); ?>">
				<option value="200px"<?php if ( '200px' === $this->options['width'] ) echo ' selected="selected"'; ?>>200px</option>
				<option value="225px"<?php if ( '225px' === $this->options['width'] ) echo ' selected="selected"'; ?>>225px</option>
				<option value="250px"<?php if ( '250px' === $this->options['width'] ) echo ' selected="selected"'; ?>>250px</option>
				<option value="275px"<?php if ( '275px' === $this->options['width'] ) echo ' selected="selected"'; ?>>275px</option>
				<option value="300px"<?php if ( '300px' === $this->options['width'] ) echo ' selected="selected"'; ?>>300px</option>
				<option value="325px"<?php if ( '325px' === $this->options['width'] ) echo ' selected="selected"'; ?>>325px</option>
				<option value="350px"<?php if ( '350px' === $this->options['width'] ) echo ' selected="selected"'; ?>>350px</option>
				<option value="375px"<?php if ( '375px' === $this->options['width'] ) echo ' selected="selected"'; ?>>375px</option>
				<option value="400px"<?php if ( '400px' === $this->options['width'] ) echo ' selected="selected"'; ?>>400px</option>
			</optgroup>
			<optgroup label="<?php esc_html_e( 'Relative', 'table-of-contents-plus' ); ?>">
				<option value="Auto"<?php if ( 'Auto' === $this->options['width'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Auto (default)', 'table-of-contents-plus' ); ?></option>
				<option value="25%"<?php if ( '25%' === $this->options['width'] ) echo ' selected="selected"'; ?>>25%</option>
				<option value="33%"<?php if ( '33%' === $this->options['width'] ) echo ' selected="selected"'; ?>>33%</option>
				<option value="50%"<?php if ( '50%' === $this->options['width'] ) echo ' selected="selected"'; ?>>50%</option>
				<option value="66%"<?php if ( '66%' === $this->options['width'] ) echo ' selected="selected"'; ?>>66%</option>
				<option value="75%"<?php if ( '75%' === $this->options['width'] ) echo ' selected="selected"'; ?>>75%</option>
				<option value="100%"<?php if ( '100%' === $this->options['width'] ) echo ' selected="selected"'; ?>>100%</option>
			</optgroup>
			<optgroup label="<?php
			/* translators: other width */
			esc_html_e( 'Other', 'table-of-contents-plus' ); ?>">
				<option value="User defined"<?php if ( 'User defined' === $this->options['width'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'User defined', 'table-of-contents-plus' ); ?></option>
			</optgroup>
		</select>
		<div class="more_toc_options<?php if ( 'User defined' !== $this->options['width'] ) echo ' disabled'; ?>">
			<label for="width_custom"><?php
			/* translators: ignore %s as it's some HTML label tags */
			echo wp_kses_post( sprintf( __( 'Please enter a number and %s select its units, eg: 100px, 10em', 'table-of-contents-plus' ), '</label><label for="width_custom_units">' ) ); ?></label><br>
			<input type="text" class="regular-text" value="<?php echo floatval( $this->options['width_custom'] ); ?>" id="width_custom" name="width_custom" />
			<select name="width_custom_units" id="width_custom_units">
				<option value="px"<?php if ( 'px' === $this->options['width_custom_units'] ) echo ' selected="selected"'; ?>>px</option>
				<option value="%"<?php if ( '%' === $this->options['width_custom_units'] ) echo ' selected="selected"'; ?>>%</option>
				<option value="em"<?php if ( 'em' === $this->options['width_custom_units'] ) echo ' selected="selected"'; ?>>em</option>
			</select>
		</div>
	</td>
</tr>
<tr>
	<th><label for="wrapping"><?php esc_html_e( 'Wrapping', 'table-of-contents-plus' ); ?></label></td>
	<td>
		<select name="wrapping" id="wrapping">
			<option value="<?php echo esc_attr( TOC_WRAPPING_NONE ); ?>"<?php if ( TOC_WRAPPING_NONE === $this->options['wrapping'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'None (default)', 'table-of-contents-plus' ); ?></option>
			<option value="<?php echo esc_attr( TOC_WRAPPING_LEFT ); ?>"<?php if ( TOC_WRAPPING_LEFT === $this->options['wrapping'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Left', 'table-of-contents-plus' ); ?></option>
			<option value="<?php echo esc_attr( TOC_WRAPPING_RIGHT ); ?>"<?php if ( TOC_WRAPPING_RIGHT === $this->options['wrapping'] ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Right', 'table-of-contents-plus' ); ?></option>
		</select>
	</td>
</tr>
<tr>
	<th><label for="font_size"><?php esc_html_e( 'Font size', 'table-of-contents-plus' ); ?></label></th>
	<td>
		<input type="text" class="regular-text" value="<?php echo floatval( $this->options['font_size'] ); ?>" id="font_size" name="font_size" />
		<select name="font_size_units" id="font_size_units">
			<option value="px"<?php if ( 'pt' === $this->options['font_size_units'] ) echo ' selected="selected"'; ?>>pt</option>
			<option value="%"<?php if ( '%' === $this->options['font_size_units'] ) echo ' selected="selected"'; ?>>%</option>
			<option value="em"<?php if ( 'em' === $this->options['font_size_units'] ) echo ' selected="selected"'; ?>>em</option>
		</select>
	</td>
</tr>
<tr>
	<th><?php
	/* translators: appearance / colour / look and feel options */
	esc_html_e( 'Presentation', 'table-of-contents-plus' ); ?>
	</th>
	<td><?php

	$theme_options = [
		[
			'id'   => TOC_THEME_GREY,
			'name' => __( 'Grey (default)', 'table-of-contents-plus' ),
			'url'  => TOC_PLUGIN_PATH . '/images/grey.png',
		],
		[
			'id'   => TOC_THEME_LIGHT_BLUE,
			'name' => __( 'Light blue', 'table-of-contents-plus' ),
			'url'  => TOC_PLUGIN_PATH . '/images/blue.png',
		],
		[
			'id'   => TOC_THEME_WHITE,
			'name' => __( 'White', 'table-of-contents-plus' ),
			'url'  => TOC_PLUGIN_PATH . '/images/white.png',
		],
		[
			'id'   => TOC_THEME_BLACK,
			'name' => __( 'Black', 'table-of-contents-plus' ),
			'url'  => TOC_PLUGIN_PATH . '/images/black.png',
		],
		[
			'id'   => TOC_THEME_TRANSPARENT,
			'name' => __( 'Transparent', 'table-of-contents-plus' ),
			'url'  => TOC_PLUGIN_PATH . '/images/transparent.png',
		],
		[
			'id'   => TOC_THEME_CUSTOM,
			'name' => __( 'Custom', 'table-of-contents-plus' ),
			'url'  => TOC_PLUGIN_PATH . '/images/custom.png',
		],
	];

	foreach ( $theme_options as $theme_option ) {
		printf(
			'<div class="toc_theme_option">' .
				'<input type="radio" name="theme" id="theme_%1$s" value="%1$s"%2$s>' .
				'<label for="theme_%1$s"> %3$s<br><img src="%4$s"" alt="" /></label>' .
			'</div>',
			esc_attr( $theme_option['id'] ),
			( $theme_option['id'] === $this->options['theme'] ) ? ' checked="checked"' : '',
			esc_html( $theme_option['name'] ),
			esc_url( $theme_option['url'] )
		);
	}
	?>
		<div class="clear"></div>

		<div class="more_toc_options<?php if ( TOC_THEME_CUSTOM !== $this->options['theme'] ) echo ' disabled'; ?>">
			<table id="theme_custom" class="more_toc_options_table">
				<tbody>

			<?php
			$custom_theme_props = [
				[
					'id'    => 'custom_background_colour',
					'name'  => __( 'Background', 'table-of-contents-plus' ),
					'value' => $this->options['custom_background_colour'],
				],
				[
					'id'    => 'custom_border_colour',
					'name'  => __( 'Border', 'table-of-contents-plus' ),
					'value' => $this->options['custom_border_colour'],
				],
				[
					'id'    => 'custom_title_colour',
					'name'  => __( 'Title', 'table-of-contents-plus' ),
					'value' => $this->options['custom_title_colour'],
				],
				[
					'id'    => 'custom_links_colour',
					'name'  => __( 'Links', 'table-of-contents-plus' ),
					'value' => $this->options['custom_links_colour'],
				],
				[
					'id'    => 'custom_links_hover_colour',
					'name'  => __( 'Links (hover)', 'table-of-contents-plus' ),
					'value' => $this->options['custom_links_hover_colour'],
				],
				[
					'id'    => 'custom_links_visited_colour',
					'name'  => __( 'Links (visited)', 'table-of-contents-plus' ),
					'value' => $this->options['custom_links_visited_colour'],
				],
			];

			foreach ( $custom_theme_props as $custom_theme_prop ) {
				printf(
					'<tr>' .
						'<th><label for="%1$s">%2$s</label></th>' .
						'<td><input type="text" class="custom_colour_option" value="%3$s" id="%1$s" name="%1$s"> <img src="%4$s/images/colour-wheel.png" alt=""></td>' .
					'</tr>',
					esc_attr( $custom_theme_prop['id'] ),
					esc_html( $custom_theme_prop['name'] ),
					esc_attr( $custom_theme_prop['value'] ),
					esc_url( TOC_PLUGIN_PATH )
				);
			}

			?>
			</tbody>
			</table>
			<div id="farbtastic_colour_wheel"></div>
			<div class="clear"></div>
			<p><?php
			/* translators: %s translates to <code>#</code> */
			echo wp_kses_post( sprintf( __( "Leaving the value as %s will inherit your theme's styles", 'table-of-contents-plus' ), '<code>#</code>' ) ); ?></p>
		</div>
	</td>
</tr>
</tbody>
</table>

<h3><?php esc_html_e( 'Advanced', 'table-of-contents-plus' ); ?> <span class="show_hide">(<a href="#toc_advanced_usage"><?php esc_html_e( 'show', 'table-of-contents-plus' ); ?></a>)</span></h3>
<div id="toc_advanced_usage">
	<h4><?php esc_html_e( 'Power options', 'table-of-contents-plus' ); ?></h4>
	<table class="form-table">
	<tbody>
	<tr>
		<th><label for="lowercase"><?php esc_html_e( 'Lowercase', 'table-of-contents-plus' ); ?></label></th>
		<td><input type="checkbox" value="1" id="lowercase" name="lowercase"<?php if ( $this->options['lowercase'] ) echo ' checked="checked"'; ?> /><label for="lowercase"> <?php esc_html_e( 'Ensure anchors are in lowercase', 'table-of-contents-plus' ); ?></label></td>
	</tr>
	<tr>
		<th><label for="hyphenate"><?php esc_html_e( 'Hyphenate', 'table-of-contents-plus' ); ?></label></th>
		<td><input type="checkbox" value="1" id="hyphenate" name="hyphenate"<?php if ( $this->options['hyphenate'] ) echo ' checked="checked"'; ?> /><label for="hyphenate"> <?php esc_html_e( 'Use - rather than _ in anchors', 'table-of-contents-plus' ); ?></label></td>
	</tr>
	<tr>
		<th><label for="include_homepage"><?php esc_html_e( 'Include homepage', 'table-of-contents-plus' ); ?></label></th>
		<td><input type="checkbox" value="1" id="include_homepage" name="include_homepage"<?php if ( $this->options['include_homepage'] ) echo ' checked="checked"'; ?> /><label for="include_homepage"> <?php esc_html_e( 'Show the table of contents for qualifying items on the homepage', 'table-of-contents-plus' ); ?></label></td>
	</tr>
	<tr>
		<th><label for="exclude_css"><?php esc_html_e( 'Exclude CSS file', 'table-of-contents-plus' ); ?></label></th>
		<td><input type="checkbox" value="1" id="exclude_css" name="exclude_css"<?php if ( $this->options['exclude_css'] ) echo ' checked="checked"'; ?> /><label for="exclude_css"> <?php esc_html_e( "Prevent the loading of this plugin's CSS styles. When selected, the appearance options from above will also be ignored.", 'table-of-contents-plus' ); ?></label></td>
	</tr>
	<tr>
		<th><label for="bullet_spacing"><?php esc_html_e( 'Preserve theme bullets', 'table-of-contents-plus' ); ?></label></th>
		<td><input type="checkbox" value="1" id="bullet_spacing" name="bullet_spacing"<?php if ( $this->options['bullet_spacing'] ) echo ' checked="checked"'; ?> /><label for="bullet_spacing"> <?php esc_html_e( 'If your theme includes background images for unordered list elements, enable this to support them', 'table-of-contents-plus' ); ?></label></td>
	</tr>
	<tr>
		<th><?php esc_html_e( 'Heading levels', 'table-of-contents-plus' ); ?></th>
		<td>
		<p><?php esc_html_e( 'Include the following heading levels. Deselecting a heading will exclude it.', 'table-of-contents-plus' ); ?></p><?php
		// show heading 1 to 6 options
		for ( $i = 1; $i <= 6; $i++ ) {
			echo '<input type="checkbox" value="' . esc_attr( $i ) . '" id="heading_levels' . esc_attr( $i ) . '" name="heading_levels[]"';
			if ( in_array( $i, $this->options['heading_levels'], true ) ) {
				echo ' checked="checked"';
			}
			echo '><label for="heading_levels' . esc_attr( $i ) . '"> ' . esc_html( __( 'heading ', 'table-of-contents-plus' ) . $i . ' - h' . $i ) . '</label><br>';
		}
		?>
		</td>
	</tr>
	<tr>
		<th><label for="exclude"><?php esc_html_e( 'Exclude headings', 'table-of-contents-plus' ); ?></label></th>
		<td>
			<input type="text" class="regular-text" value="<?php echo esc_attr( $this->options['exclude'] ); ?>" id="exclude" name="exclude" style="width: 100%;" /><br>
			<label for="exclude"><?php echo wp_kses_post( __( 'Specify headings to be excluded from appearing in the table of contents. Separate multiple headings with a pipe <code>|</code>. Use an asterisk <code>*</code> as a wildcard to match other text. Note that this is not case sensitive. Some examples:', 'table-of-contents-plus' ) ); ?></label><br/>
			<ul>
				<li><?php echo wp_kses_post( __( '<code>Fruit*</code> ignore headings starting with "Fruit"', 'table-of-contents-plus' ) ); ?></li>
				<li><?php echo wp_kses_post( __( '<code>*Fruit Diet*</code> ignore headings with "Fruit Diet" somewhere in the heading', 'table-of-contents-plus' ) ); ?></li>
				<li><?php echo wp_kses_post( __( '<code>Apple Tree|Oranges|Yellow Bananas</code> ignore headings that are exactly "Apple Tree", "Oranges" or "Yellow Bananas"', 'table-of-contents-plus' ) ); ?></li>
			</ul>
		</td>
	</tr>
	<tr id="smooth_scroll_offset_tr" class="<?php if ( ! $this->options['smooth_scroll'] ) echo 'disabled'; ?>">
		<th><label for="smooth_scroll_offset"><?php esc_html_e( 'Smooth scroll top offset', 'table-of-contents-plus' ); ?></label></th>
		<td>
			<input type="text" class="regular-text" value="<?php echo intval( $this->options['smooth_scroll_offset'] ); ?>" id="smooth_scroll_offset" name="smooth_scroll_offset"> px<br>
			<label for="smooth_scroll_offset"><?php esc_html_e( 'If you have a consistent menu across the top of your site, you can adjust the top offset to stop the headings from appearing underneath the top menu. A setting of 30 accommodates the WordPress admin bar. This setting appears after you have enabled smooth scrolling from above.', 'table-of-contents-plus' ); ?></label>
		</td>
	</tr>
	<tr>
		<th><label for="restrict_path"><?php esc_html_e( 'Restrict path', 'table-of-contents-plus' ); ?></label></th>
		<td>
			<input type="text" class="regular-text" value="<?php echo esc_attr( $this->options['restrict_path'] ); ?>" id="restrict_path" name="restrict_path"><br>
			<label for="restrict_path"><?php esc_html_e( 'Restrict automatic generation of the table of contents to pages that match the required path. This path is from the root of your site and always begins with a forward slash.', 'table-of-contents-plus' ); ?><br>
			<span class="description"><?php
			/* translators: example of URL path restrictions */
			esc_html_e( 'Eg: /wiki/, /corporate/annual-reports/', 'table-of-contents-plus' ); ?></span></label>
		</td>
	</tr>
	<tr>
		<th><label for="fragment_prefix"><?php esc_html_e( 'Default anchor prefix', 'table-of-contents-plus' ); ?></label></th>
		<td>
			<input type="text" class="regular-text" value="<?php echo esc_attr( $this->options['fragment_prefix'] ); ?>" id="fragment_prefix" name="fragment_prefix" /><br>
			<label for="fragment_prefix"><?php esc_html_e( 'Anchor targets are restricted to alphanumeric characters as per HTML specification (see readme for more detail). The default anchor prefix will be used when no characters qualify. When left blank, a number will be used instead.', 'table-of-contents-plus' ); ?><br>
			<?php esc_html_e( 'This option normally applies to content written in character sets other than ASCII.', 'table-of-contents-plus' ); ?><br>
			<span class="description"><?php
			/* translators: example anchor prefixes when no ascii characters match */
			esc_html_e( 'Eg: i, toc_index, index, _', 'table-of-contents-plus' ); ?></span></label>
		</td>
	</tr>
	<tr>
		<th><label for="rest_toc_output"><?php esc_html_e( 'Include in REST requests', 'table-of-contents-plus' ); ?></label></th>
		<td><input type="checkbox" value="1" id="rest_toc_output" name="rest_toc_output"<?php if ( $this->options['rest_toc_output'] ) echo ' checked="checked"'; ?> /><label for="rest_toc_output"> <?php esc_html_e( 'Allow the table of contents to be included in the output of REST API requests.', 'table-of-contents-plus' ); ?></label></td>
	</tr>
	</tbody>
	</table>

	<h4><?php
	esc_html_e( 'Usage', 'table-of-contents-plus' ); ?></h4>
	<p><?php
	/* translators: advanced usage, %s is HTML code for <code>[toc]</code> */
	echo wp_kses_post( sprintf( __( 'If you would like to fully customise the position of the table of contents, you can use the %s shortcode by placing it at the desired position of your post, page or custom post type. This method allows you to generate the table of contents despite having auto insertion disabled for its content type. Please visit the help tab for further information about this shortcode.', 'table-of-contents-plus' ), '<code>[toc]</code>' ) ); ?></p>
</div>


	</div>
	<div id="tab2" class="tab_content">


<p><?php
	/* translators: %s is HTML code for <code>[sitemap]</code> */
	echo wp_kses_post( sprintf( __( 'At its simplest, placing %s into a page will automatically create a sitemap of all pages and categories. This also works in a text widget.', 'table-of-contents-plus' ), '<code>[sitemap]</code>' ) ); ?></p>
<table class="form-table">
<tbody>
<tr>
	<th><label for="sitemap_show_page_listing"><?php esc_html_e( 'Show page listing', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="checkbox" value="1" id="sitemap_show_page_listing" name="sitemap_show_page_listing"<?php if ( $this->options['sitemap_show_page_listing'] ) echo ' checked="checked"'; ?> /></td>
</tr>
<tr>
	<th><label for="sitemap_show_category_listing"><?php esc_html_e( 'Show category listing', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="checkbox" value="1" id="sitemap_show_category_listing" name="sitemap_show_category_listing"<?php if ( $this->options['sitemap_show_category_listing'] ) echo ' checked="checked"'; ?> /></td>
</tr>
<tr>
	<th><label for="sitemap_heading_type"><?php esc_html_e( 'Heading type', 'table-of-contents-plus' ); ?></label></th>
	<td><label for="sitemap_heading_type"><?php
	/* translators: the full line is supposed to read - Use [1-6 drop down list] to print out the titles */
	esc_html_e( 'Use', 'table-of-contents-plus' ); ?> h</label><select name="sitemap_heading_type" id="sitemap_heading_type">
			<?php
			// h1 to h6
			for ( $i = 1; $i <= 6; $i++ ) {
				echo '<option value="' . esc_attr( $i ) . '"';
				if ( $i === $this->options['sitemap_heading_type'] ) {
					echo ' selected="selected"';
				}
				echo '>' . esc_attr( $i ) . '</option>' . "\n";
			}
			?>
		</select> <?php
		/* translators: the full line is supposed to read - Use [h1-h6 drop down list] to print out the titles */
		esc_html_e( 'to print out the titles', 'table-of-contents-plus' ); ?>
	</td>
</tr>
<tr>
	<th><label for="sitemap_pages"><?php esc_html_e( 'Pages label', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="text" class="regular-text" value="<?php echo esc_attr( $this->options['sitemap_pages'] ); ?>" id="sitemap_pages" name="sitemap_pages" />
		<span class="description"><?php esc_html_e( 'Eg: Pages, Page List', 'table-of-contents-plus' ); ?></span>
	</td>
</tr>
<tr>
	<th><label for="sitemap_categories"><?php esc_html_e( 'Categories label', 'table-of-contents-plus' ); ?></label></th>
	<td><input type="text" class="regular-text" value="<?php echo esc_attr( $this->options['sitemap_categories'] ); ?>" id="sitemap_categories" name="sitemap_categories" />
		<span class="description"><?php esc_html_e( 'Eg: Categories, Category List', 'table-of-contents-plus' ); ?></span>
	</td>
</tr>
</tbody>
</table>

<h3><?php esc_html_e( 'Advanced usage', 'table-of-contents-plus' ); ?> <span class="show_hide">(<a href="#sitemap_advanced_usage"><?php esc_html_e( 'show', 'table-of-contents-plus' ); ?></a>)</span></h3>
<div id="sitemap_advanced_usage">
	<p><code>[sitemap_pages]</code> <?php
	/* translators: %s is the following HTML code <code>[sitemap_categories]</code> */
	echo wp_kses_post( sprintf( __( 'lets you print out a listing of only pages. Similarly %s can be used to print out a category listing. They both can accept a number of attributes so visit the help tab for more information.', 'table-of-contents-plus' ), '<code>[sitemap_categories]</code>' ) ); ?></p>
	<p><?php esc_html_e( 'Examples', 'table-of-contents-plus' ); ?></p>
	<ol>
		<li><code>[sitemap_categories no_label="true"]</code> <?php esc_html_e( 'hides the heading from a category listing', 'table-of-contents-plus' ); ?></li>
		<li><code>[sitemap_pages heading="6" label="This is an awesome listing" exclude="1,15"]</code> <?php echo wp_kses_post( __( 'Uses h6 to display <em>This is an awesome listing</em> on a page listing excluding pages with IDs 1 and 15', 'table-of-contents-plus' ) ); ?></li>
	</ol>
</div>


	</div>
</div>


<p class="submit"><input type="submit" name="submit" class="button-primary" value="<?php esc_html_e( 'Update Options', 'table-of-contents-plus' ); ?>" /></p>
</form>
</div>
			<?php
		}


		/**
		 * Returns a string of custom CSS based on appearance options the
		 * user selected in the admin GUI.
		 */
		private function get_custom_css() {
			$css = '';

			if ( ! $this->options['exclude_css'] ) {
				if ( TOC_THEME_CUSTOM === $this->options['theme'] || 'Auto' !== $this->options['width'] ) {
					$css .= 'div#toc_container {';
					if ( TOC_THEME_CUSTOM === $this->options['theme'] ) {
						$css .= 'background: ' . $this->options['custom_background_colour'] . ';border: 1px solid ' . $this->options['custom_border_colour'] . ';';
					}
					if ( 'Auto' !== $this->options['width'] ) {
						$css .= 'width: ';
						if ( 'User defined' !== $this->options['width'] ) {
							$css .= $this->options['width'];
						} else {
							$css .= $this->options['width_custom'] . $this->options['width_custom_units'];
						}
						$css .= ';';
					}
					$css .= '}';
				}

				if ( '95%' !== $this->options['font_size'] . $this->options['font_size_units'] ) {
					$css .= 'div#toc_container ul li {font-size: ' . $this->options['font_size'] . $this->options['font_size_units'] . ';}';
				}

				if ( TOC_THEME_CUSTOM === $this->options['theme'] ) {
					if ( TOC_DEFAULT_TITLE_COLOUR !== $this->options['custom_title_colour'] ) {
						$css .= 'div#toc_container p.toc_title {color: ' . $this->options['custom_title_colour'] . ';}';
					}
					if ( TOC_DEFAULT_LINKS_COLOUR !== $this->options['custom_links_colour'] ) {
						$css .= 'div#toc_container p.toc_title a,div#toc_container ul.toc_list a {color: ' . $this->options['custom_links_colour'] . ';}';
					}
					if ( TOC_DEFAULT_LINKS_HOVER_COLOUR !== $this->options['custom_links_hover_colour'] ) {
						$css .= 'div#toc_container p.toc_title a:hover,div#toc_container ul.toc_list a:hover {color: ' . $this->options['custom_links_hover_colour'] . ';}';
					}
					if ( TOC_DEFAULT_LINKS_HOVER_COLOUR !== $this->options['custom_links_hover_colour'] ) {
						$css .= 'div#toc_container p.toc_title a:hover,div#toc_container ul.toc_list a:hover {color: ' . $this->options['custom_links_hover_colour'] . ';}';
					}
					if ( TOC_DEFAULT_LINKS_VISITED_COLOUR !== $this->options['custom_links_visited_colour'] ) {
						$css .= 'div#toc_container p.toc_title a:visited,div#toc_container ul.toc_list a:visited {color: ' . $this->options['custom_links_visited_colour'] . ';}';
					}
				}
			}

			return $css;
		}


		/**
		 * Returns a clean url to be used as the destination anchor target
		 */
		private function url_anchor_target( $title ) {
			$return = false;

			if ( $title ) {
				$return = trim( wp_strip_all_tags( $title ) );

				// convert accented characters to ASCII
				$return = remove_accents( $return );

				// replace newlines with spaces (eg when headings are split over multiple lines)
				$return = str_replace( [ "\r", "\n", "\n\r", "\r\n" ], ' ', $return );

				// remove &amp;
				$return = str_replace( '&amp;', '', $return );

				// remove non alphanumeric chars
				$return = preg_replace( '/[^a-zA-Z0-9 \-_]*/', '', $return );

				// convert spaces to _
				$return = str_replace(
					[ '  ', ' ' ],
					'_',
					$return
				);

				// remove trailing - and _
				$return = rtrim( $return, '-_' );

				// lowercase everything?
				if ( $this->options['lowercase'] ) {
					$return = strtolower( $return );
				}

				// if blank, then prepend with the fragment prefix
				// blank anchors normally appear on sites that don't use the latin charset
				if ( ! $return ) {
					$return = ( $this->options['fragment_prefix'] ) ? wp_kses_post( $this->options['fragment_prefix'] ) : '_';
				}

				// hyphenate?
				if ( $this->options['hyphenate'] ) {
					$return = str_replace( '_', '-', $return );
					$return = str_replace( '--', '-', $return );
				}
			}

			if ( array_key_exists( $return, $this->collision_collector ) ) {
				$this->collision_collector[ $return ]++;
				$return .= '-' . $this->collision_collector[ $return ];
			} else {
				$this->collision_collector[ $return ] = 1;
			}

			return apply_filters( 'toc_url_anchor_target', $return );
		}


		private function build_hierarchy( &$matches ) {
			$current_depth      = 100;  // headings can't be larger than h6 but 100 as a default to be sure
			$html               = '';
			$numbered_items     = [];
			$numbered_items_min = null;
			$count_matches      = count( $matches );

			// reset the internal collision collection
			$this->collision_collector = [];

			// find the minimum heading to establish our baseline
			for ( $i = 0; $i < $count_matches; $i++ ) {
				if ( $current_depth > $matches[ $i ][2] ) {
					$current_depth = (int) $matches[ $i ][2];
				}
			}

			$numbered_items[ $current_depth ] = 0;
			$numbered_items_min               = $current_depth;

			for ( $i = 0; $i < $count_matches; $i++ ) {

				if ( $current_depth === (int) $matches[ $i ][2] ) {
					$html .= '<li>';
				}

				// start lists
				if ( $current_depth !== (int) $matches[ $i ][2] ) {
					for ( $current_depth; $current_depth < (int) $matches[ $i ][2]; $current_depth++ ) {
						$numbered_items[ $current_depth + 1 ] = 0;
						$html                                .= '<ul><li>';
					}
				}

				// list item
				if ( in_array( (int) $matches[ $i ][2], $this->options['heading_levels'], true ) ) {
					$html .= '<a href="#' . $this->url_anchor_target( $matches[ $i ][0] ) . '">';
					if ( $this->options['ordered_list'] ) {
						// attach leading numbers when lower in hierarchy
						$html .= '<span class="toc_number toc_depth_' . ( $current_depth - $numbered_items_min + 1 ) . '">';
						for ( $j = $numbered_items_min; $j < $current_depth; $j++ ) {
							$number = ( $numbered_items[ $j ] ) ? $numbered_items[ $j ] : 0;
							$html  .= $number . '.';
						}

						$html .= ( $numbered_items[ $current_depth ] + 1 ) . '</span> ';
						$numbered_items[ $current_depth ]++;
					}
					$html .= wp_strip_all_tags( $matches[ $i ][0] ) . '</a>';
				}

				// end lists
				if ( count( $matches ) - 1 !== $i ) {
					if ( $current_depth > (int) $matches[ $i + 1 ][2] ) {
						for ( $current_depth; $current_depth > (int) $matches[ $i + 1 ][2]; $current_depth-- ) {
							$html                            .= '</li></ul>';
							$numbered_items[ $current_depth ] = 0;
						}
					}

					if ( (int) @$matches[ $i + 1 ][2] === $current_depth ) {
						$html .= '</li>';
					}
				} else {
					// this is the last item, make sure we close off all tags
					for ( $current_depth; $current_depth >= $numbered_items_min; $current_depth-- ) {
						$html .= '</li>';
						if ( $current_depth !== $numbered_items_min ) {
							$html .= '</ul>';
						}
					}
				}
			}

			return $html;
		}


		/**
		 * Returns a string with all items from the $find array replaced with their matching
		 * items in the $replace array.  This does a one to one replacement (rather than
		 * globally).
		 *
		 * This function is multibyte safe.
		 *
		 * $find and $replace are arrays, $string is the haystack.  All variables are
		 * passed by reference.
		 */
		private function mb_find_replace( &$find = false, &$replace = false, &$string = '' ) {
			if ( is_array( $find ) && is_array( $replace ) && $string ) {
				$count_find = count( $find );
				// check if multibyte strings are supported
				if ( function_exists( 'mb_strpos' ) ) {
					for ( $i = 0; $i < $count_find; $i++ ) {
						$string =
							mb_substr( $string, 0, mb_strpos( $string, $find[ $i ] ) ) . // everything before $find
							$replace[ $i ] . // its replacement
							mb_substr( $string, mb_strpos( $string, $find[ $i ] ) + mb_strlen( $find[ $i ] ) ); // everything after $find
					}
				} else {
					for ( $i = 0; $i < $count_find; $i++ ) {
						$string = substr_replace(
							$string,
							$replace[ $i ],
							strpos( $string, $find[ $i ] ),
							strlen( $find[ $i ] )
						);
					}
				}
			}

			return $string;
		}


		/**
		 * This function extracts headings from the html formatted $content.  It will pull out
		 * only the required headings as specified in the options.  For all qualifying headings,
		 * this function populates the $find and $replace arrays (both passed by reference)
		 * with what to search and replace with.
		 *
		 * Returns a html formatted string of list items for each qualifying heading.  This
		 * is everything between and NOT including <ul> and </ul>
		 */
		public function extract_headings( &$find, &$replace, $content = '' ) {
			$matches = [];
			$anchor  = '';
			$items   = false;

			// reset the internal collision collection as the_content may have been triggered elsewhere
			// eg by themes or other plugins that need to read in content such as metadata fields in
			// the head html tag, or to provide descriptions to twitter/facebook
			$this->collision_collector = [];

			if ( is_array( $find ) && is_array( $replace ) && $content ) {
				// filter the content
				$content = apply_filters( 'toc_extract_headings', $content );

				// get all headings
				// the html spec allows for a maximum of 6 heading depths
				if ( preg_match_all( '/(<h([1-6]{1})[^>]*>).*<\/h\2>/msuU', $content, $matches, PREG_SET_ORDER ) ) {

					// remove undesired headings (if any) as defined by heading_levels
					if ( count( $this->options['heading_levels'] ) !== 6 ) {
						$new_matches   = [];
						$count_matches = count( $matches );
						for ( $i = 0; $i < $count_matches; $i++ ) {
							if ( in_array( (int) $matches[ $i ][2], $this->options['heading_levels'], true ) ) {
								$new_matches[] = $matches[ $i ];
							}
						}
						$matches = $new_matches;
					}

					// remove specific headings if provided via the 'exclude' property
					if ( $this->options['exclude'] ) {
						$excluded_headings       = explode( '|', $this->options['exclude'] );
						$count_excluded_headings = count( $excluded_headings );
						if ( $count_excluded_headings > 0 ) {
							for ( $j = 0; $j < $count_excluded_headings; $j++ ) {
								// escape some regular expression characters
								// others: http://www.php.net/manual/en/regexp.reference.meta.php
								$excluded_headings[ $j ] = str_replace(
									[ '*' ],
									[ '.*' ],
									trim( $excluded_headings[ $j ] )
								);
							}

							$new_matches   = [];
							$count_matches = count( $matches );
							for ( $i = 0; $i < $count_matches; $i++ ) {
								$found                   = false;
								$count_excluded_headings = count( $excluded_headings );
								for ( $j = 0; $j < $count_excluded_headings; $j++ ) {
									if ( @preg_match( '/^' . $excluded_headings[ $j ] . '$/imU', wp_strip_all_tags( $matches[ $i ][0] ) ) ) {
										$found = true;
										break;
									}
								}
								if ( ! $found ) {
									$new_matches[] = $matches[ $i ];
								}
							}
							if ( count( $matches ) !== count( $new_matches ) ) {
								$matches = $new_matches;
							}
						}
					}

					// remove empty headings
					$new_matches   = [];
					$count_matches = count( $matches );
					for ( $i = 0; $i < $count_matches; $i++ ) {
						if ( trim( wp_strip_all_tags( $matches[ $i ][0] ) ) !== false ) {
							$new_matches[] = $matches[ $i ];
						}
					}
					if ( count( $matches ) !== count( $new_matches ) ) {
						$matches = $new_matches;
					}

					// check minimum number of headings
					if ( count( $matches ) >= $this->options['start'] ) {
						$count_matches = count( $matches );
						for ( $i = 0; $i < $count_matches; $i++ ) {
							// get anchor and add to find and replace arrays
							$anchor    = $this->url_anchor_target( $matches[ $i ][0] );
							$find[]    = $matches[ $i ][0];
							$replace[] = str_replace(
								[
									$matches[ $i ][1], // start of heading
									'</h' . $matches[ $i ][2] . '>', // end of heading
								],
								[
									$matches[ $i ][1] . '<span id="' . $anchor . '">',
									'</span></h' . $matches[ $i ][2] . '>',
								],
								$matches[ $i ][0]
							);

							// assemble flat list
							if ( ! $this->options['show_heirarchy'] ) {
								$items .= '<li><a href="#' . $anchor . '">';
								if ( $this->options['ordered_list'] ) {
									$items .= count( $replace ) . ' ';
								}
								$items .= wp_strip_all_tags( $matches[ $i ][0] ) . '</a></li>';
							}
						}

						// build a hierarchical toc?
						// we could have tested for $items but that var can be quite large in some cases
						if ( $this->options['show_heirarchy'] ) {
							$items = $this->build_hierarchy( $matches );
						}
					}
				}
			}

			return $items;
		}


		/**
		 * Returns true if the table of contents is eligible to be printed, false otherwise.
		 */
		public function is_eligible() {
			global $post;

			$custom_toc_position = isset( $post->post_content ) ? has_shortcode( $post->post_content, 'toc' ) : false;

			// Do not trigger the TOC on REST Requests unless explicitly enabled.
			// This ensures that the TOC is not included in REST API responses by default.
			// If the TOC inclusion in REST API responses is desired,
			// it must be specifically activated via the plugin settings.
			if ( ! $this->options['rest_toc_output'] ) {
				if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
					return false;
				}
			}

			// do not trigger the TOC when displaying an XML/RSS feed
			if ( is_feed() ) {
				return false;
			}

			// if the shortcode was used, this bypasses many of the global options
			if ( false !== $custom_toc_position ) {
				// shortcode is used, make sure it adheres to the exclude from
				// homepage option if we're on the homepage
				if ( ! $this->options['include_homepage'] && is_front_page() ) {
					return false;
				} else {
					return true;
				}
			} else {
				if (
					( in_array( get_post_type( $post ), $this->options['auto_insert_post_types'], true ) && $this->show_toc && ! is_search() && ! is_archive() && ! is_front_page() ) ||
					( $this->options['include_homepage'] && is_front_page() )
				) {
					if ( $this->options['restrict_path'] ) {
						$requestUri = ! empty( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
						if ( strpos( $requestUri, $this->options['restrict_path'] ) === 0 ) {
							return true;
						} else {
							return false;
						}
					} else {
						return true;
					}
				} else {
					return false;
				}
			}
		}


		public function the_content( $content ) {
			global $post;
			$items               = '';
			$css_classes         = '';
			$anchor              = '';
			$find                = [];
			$replace             = [];
			$custom_toc_position = strpos( $content, '<!--TOC-->' );

			if ( $this->is_eligible() ) {

				$items = $this->extract_headings( $find, $replace, $content );

				if ( $items ) {
					// do we display the toc within the content or has the user opted
					// to only show it in the widget?  if so, then we still need to
					// make the find/replace call to insert the anchors
					if ( $this->options['show_toc_in_widget_only'] && ( in_array( get_post_type(), $this->options['show_toc_in_widget_only_post_types'], true ) ) ) {
						$content = $this->mb_find_replace( $find, $replace, $content );
					} else {

						// wrapping css classes
						switch ( $this->options['wrapping'] ) {
							case TOC_WRAPPING_LEFT:
								$css_classes .= ' toc_wrap_left';
								break;

							case TOC_WRAPPING_RIGHT:
								$css_classes .= ' toc_wrap_right';
								break;

							case TOC_WRAPPING_NONE:
							default:
								// do nothing
						}

						// colour themes
						switch ( $this->options['theme'] ) {
							case TOC_THEME_LIGHT_BLUE:
								$css_classes .= ' toc_light_blue';
								break;

							case TOC_THEME_WHITE:
								$css_classes .= ' toc_white';
								break;

							case TOC_THEME_BLACK:
								$css_classes .= ' toc_black';
								break;

							case TOC_THEME_TRANSPARENT:
								$css_classes .= ' toc_transparent';
								break;

							case TOC_THEME_GREY:
							default:
								// do nothing
						}

						// bullets?
						if ( $this->options['bullet_spacing'] ) {
							$css_classes .= ' have_bullets';
						} else {
							$css_classes .= ' no_bullets';
						}

						if ( $this->options['css_container_class'] ) {
							$css_classes .= ' ' . $this->options['css_container_class'];
						}

						$css_classes = trim( $css_classes );

						// an empty class="" is invalid markup!
						if ( ! $css_classes ) {
							$css_classes = ' ';
						}

						// add container, toc title and list items
						$html = '<div id="toc_container" class="' . htmlentities( $css_classes, ENT_COMPAT, 'UTF-8' ) . '">';
						if ( $this->options['show_heading_text'] ) {
							$toc_title = htmlentities( $this->options['heading_text'], ENT_COMPAT, 'UTF-8' );
							if ( false !== strpos( $toc_title, '%PAGE_TITLE%' ) ) {
								$toc_title = str_replace( '%PAGE_TITLE%', get_the_title(), $toc_title );
							}
							if ( false !== strpos( $toc_title, '%PAGE_NAME%' ) ) {
								$toc_title = str_replace( '%PAGE_NAME%', get_the_title(), $toc_title );
							}
							$html .= '<p class="toc_title">' . $toc_title . '</p>';
						}
						$html .= '<ul class="toc_list">' . $items . '</ul></div>' . "\n";

						if ( false !== $custom_toc_position ) {
							$find[]    = '<!--TOC-->';
							$replace[] = $html;
							$content   = $this->mb_find_replace( $find, $replace, $content );
						} else {
							if ( count( $find ) > 0 ) {
								switch ( $this->options['position'] ) {
									case TOC_POSITION_TOP:
										$content = $html . $this->mb_find_replace( $find, $replace, $content );
										break;

									case TOC_POSITION_BOTTOM:
										$content = $this->mb_find_replace( $find, $replace, $content ) . $html;
										break;

									case TOC_POSITION_AFTER_FIRST_HEADING:
										$replace[0] = $replace[0] . $html;
										$content    = $this->mb_find_replace( $find, $replace, $content );
										break;

									case TOC_POSITION_BEFORE_FIRST_HEADING:
									default:
										$replace[0] = $html . $replace[0];
										$content    = $this->mb_find_replace( $find, $replace, $content );
								}
							}
						}
					}
				}
			} else {
				// remove <!--TOC--> (inserted from shortcode) from content
				$content = str_replace( '<!--TOC-->', '', $content );
			}

			return $content;
		}

	} // end class
endif;

