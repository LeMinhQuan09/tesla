<?php

\defined( 'ABSPATH' ) || exit;

/**
 * Addon Helper Class
 *
 * @package tesla-education
 */
final class Helper {

	// -------------------------------------------------------------

	/**
	 * Check if the current page is using a specific page template (based on file name only).
	 *
	 * @param string $template_file_name
	 *
	 * @return bool
	 */
	public static function isPageTemplate( string $template_file_name ): bool {
		if ( ! is_page() ) {
			return false;
		}

		$current_template_slug = get_page_template_slug( get_the_ID() );
		if ( ! $current_template_slug ) {
			return false;
		}

		return $current_template_slug === trim( $template_file_name );
	}

	// -------------------------------------------------------------

	/**
	 * Check if the current page is a category page and belongs to a specific taxonomy.
	 *
	 * @param string $taxonomy
	 *
	 * @return bool
	 */
	public static function isTaxonomy( string $taxonomy ): bool {
		$queried_object = get_queried_object();

		// Validate queried object and its taxonomy.
		return $queried_object && isset( $queried_object->taxonomy ) && $queried_object->taxonomy === $taxonomy;
	}

	// -------------------------------------------------------------

	/**
	 * @return void
	 */
	public static function breadCrumbs(): void {
		global $post, $wp_query;

		// If it's the front page, no need to display breadcrumbs
		if ( is_front_page() ) {
			return;
		}

		$before      = '<li class="current">';
		$after       = '</li>';
		$breadcrumbs = [];

		// Home
		$breadcrumbs[] = '<li><a class="home" href="' . self::home() . '">' . __( 'Home', 'tesla' ) . '</a></li>';

		// WooCommerce Shop Page
		if ( self::isWoocommerceActive() && \is_shop() ) {
			$breadcrumbs[] = $before . get_the_title( self::getOption( 'woocommerce_shop_page_id' ) ) . $after;
		} // Posts Page
		elseif ( $wp_query->is_posts_page ) {
			$breadcrumbs[] = $before . get_the_title( self::getOption( 'page_for_posts', true ) ) . $after;
		} // Post-type Archive
		elseif ( $wp_query->is_post_type_archive ) {
			$breadcrumbs[] = $before . post_type_archive_title( '', false ) . $after;
		} // Page or Attachment
		elseif ( is_page() || is_attachment() ) {

			// Breadcrumb for child pages (Parent page)
			if ( $post->post_parent ) {
				$parent_id          = $post->post_parent;
				$parent_breadcrumbs = [];

				while ( $parent_id ) {
					$page                 = get_post( $parent_id );
					$parent_breadcrumbs[] = '<li><a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>';
					$parent_id            = $page->post_parent;
				}

				$parent_breadcrumbs = array_reverse( $parent_breadcrumbs );
				$breadcrumbs        = array_merge( $breadcrumbs, $parent_breadcrumbs );
			}
			$breadcrumbs[] = $before . get_the_title() . $after;
		} // Single
		elseif ( is_single() && ! is_attachment() ) {
			$post_type  = get_post_type_object( get_post_type() );
			$taxonomies = get_object_taxonomies( $post_type->name, 'names' );

			if ( empty( $taxonomies ) ) {
				$slug = $post_type->rewrite;
				if ( ! is_bool( $slug ) ) {
					$breadcrumbs[] = '<li><a href="' . self::home() . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
				}
			} else {

				// taxonomy (primary term)
				$term = self::primaryTerm( $post );
				if ( $term ) {
					$cat_code      = get_term_parents_list( $term->term_id, $term->taxonomy, [ 'separator' => '' ] );
					$cat_code      = str_replace( '<a', '<li><a', $cat_code );
					$breadcrumbs[] = str_replace( '</a>', '</a></li>', $cat_code );
				}
			}

			$breadcrumbs[] = $before . get_the_title() . $after;
		} // Search page
		elseif ( is_search() ) {
			$breadcrumbs[] = $before . sprintf( __( 'Search Results for: %s', 'tesla' ), get_search_query() ) . $after;
		} // Tag Archive
		elseif ( is_tag() ) {
			$breadcrumbs[] = $before . sprintf( __( 'Tag Archives: %s', 'tesla' ), single_tag_title( '', false ) ) . $after;
		} // Author
		elseif ( is_author() ) {
			global $author;
			$userdata      = get_userdata( $author );
			$breadcrumbs[] = $before . $userdata->display_name . $after;
		} // Day, Month, Year Archives
		elseif ( is_day() || is_month() || is_year() ) {
			if ( is_day() ) {
				$breadcrumbs[] = '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
				$breadcrumbs[] = '<li><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';
				$breadcrumbs[] = $before . get_the_time( 'd' ) . $after;
			} elseif ( is_month() ) {
				$breadcrumbs[] = '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
				$breadcrumbs[] = $before . get_the_time( 'F' ) . $after;
			} elseif ( is_year() ) {
				$breadcrumbs[] = $before . get_the_time( 'Y' ) . $after;
			}
		} // Category, Taxonomy
		elseif ( is_category() || is_tax() ) {
			$cat_obj       = get_queried_object();
			$cat_code      = get_term_parents_list( $cat_obj->term_id, $cat_obj->taxonomy, [ 'separator' => '' ] );
			$cat_code      = str_replace( '<a', '<li><a', $cat_code );
			$breadcrumbs[] = str_replace( '</a>', '</a></li>', $cat_code ) . $before . single_cat_title( '', false ) . $after;
		} // 404 Page
		elseif ( is_404() ) {
			$breadcrumbs[] = $before . __( 'Not Found', 'tesla' ) . $after;
		}

		// If there is pagination
		if ( get_query_var( 'paged' ) ) {
			$breadcrumbs[] = $before . ' (' . __( 'page', 'tesla' ) . ' ' . get_query_var( 'paged' ) . ')' . $after;
		}

		// Display Breadcrumbs.
		echo '<ul id="breadcrumbs" class="breadcrumbs" aria-label="Breadcrumbs">';
		echo implode( '', $breadcrumbs );
		echo '</ul>';

		// Reset query
		wp_reset_query();
	}

	// -------------------------------------------------------------

	/**
	 * @param mixed $post
	 * @param string $taxonomy
	 *
	 * @return mixed
	 */
	public static function primaryTerm( $post, string $taxonomy = '' ) {
		// Ensure $post is a valid post object
		$post = get_post( $post );
		if ( ! $post ) {
			return null;
		}

		$post_id = $post->ID;

		// Determine the taxonomy if not explicitly provided
		if ( ! $taxonomy ) {
			$post_type = get_post_type( $post );

			// The default taxonomy for 'post' is 'category'
			if ( 'post' === $post_type ) {
				$taxonomy = 'category';
			}

			// Use custom filter to retrieve taxonomy mapping for the post-type
			$post_type_terms = [
				'tesla_talk'      => 'category-tesla_talk',
				'parent_learning' => 'tag-parent_learning',
				'cafeteria'       => 'tag-cafeteria',
				'news_events'     => 'category-news_events',
			];

			foreach ( $post_type_terms as $_post_type => $_taxonomy ) {
				if ( $_post_type === $post_type ) {
					$taxonomy = $_taxonomy;
					break;
				}
			}
		}

		// Get all terms associated with the post for the specified taxonomy
		$post_terms = get_the_terms( $post, $taxonomy );
		if ( ! is_array( $post_terms ) || empty( $post_terms ) ) {
			return null;
		}

		// Extract term IDs for further processing
		$term_ids = wp_list_pluck( $post_terms, 'term_id' );

		// Support for Rank Math SEO plugin
		$primary_term_id = get_post_meta( $post_id, 'rank_math_primary_' . $taxonomy, true );
		if ( $primary_term_id && in_array( $primary_term_id, $term_ids, false ) ) {
			$term = get_term( $primary_term_id, $taxonomy );
			if ( $term ) {
				return $term;
			}
		}

		// Support for Yoast SEO plugin
		if ( class_exists( '\WPSEO_Primary_Term' ) ) {
			$primary_term_id = ( new \WPSEO_Primary_Term( $taxonomy, $post ) )->get_primary_term();
			if ( $primary_term_id && in_array( $primary_term_id, $term_ids, false ) ) {
				$term = get_term( $primary_term_id, $taxonomy );
				if ( $term ) {
					return $term;
				}
			}
		}

		// Support for All in One SEO plugin
		if ( function_exists( 'aioseo' ) ) {
			$aioseo_primary_term_id = get_post_meta( $post_id, '_aioseo_primary_' . $taxonomy, true );
			if ( $aioseo_primary_term_id && in_array( $aioseo_primary_term_id, $term_ids, false ) ) {
				$term = get_term( $aioseo_primary_term_id, $taxonomy );
				if ( $term ) {
					return $term;
				}
			}
		}

		// Default: return the first term if no primary term is found
		return $post_terms[0] ?? null;
	}

	// -------------------------------------------------------------

	/**
	 * @param mixed $post_id
	 * @param bool $force_object
	 * @param bool $format_value
	 * @param bool $escape_html
	 *
	 * @return object|bool|array
	 */
	public static function getFields( $post_id = false, bool $force_object = false, bool $format_value = true, bool $escape_html = false ) {
		if ( ! self::isAcfActive() ) {
			return [];
		}

		$fields = \function_exists( 'get_fields' ) ? \get_fields( $post_id, $format_value, $escape_html ) : [];

		return ( true === $force_object ) ? (object) $fields : $fields;
	}

	// -------------------------------------------------------------

	/**
	 * @param string|null $selector
	 * @param mixed $post_id
	 * @param bool $format_value
	 * @param bool $escape_html
	 *
	 * @return mixed
	 */
	public static function getField( ?string $selector, $post_id = false, bool $format_value = true, bool $escape_html = false ) {
		if ( ! $selector || ! self::isAcfActive() ) {
			return false;
		}

		return \function_exists( 'get_field' ) ? \get_field( $selector, $post_id, $format_value, $escape_html ) : false;
	}

	// -------------------------------------------------------------

	/**
	 * @param string $plugin_slug
	 *
	 * @return bool
	 */
	public static function checkPluginActive( string $plugin_slug ): bool {
		return self::checkPluginInstalled( $plugin_slug ) && is_plugin_active( $plugin_slug );
	}

	// -------------------------------------------------------------

	/**
	 * @param string $plugin_slug
	 *
	 * @return bool
	 */
	public static function checkPluginInstalled( string $plugin_slug ): bool {

		// Ensure required functions are available
		if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Get the list of installed plugins
		$installed_plugins = get_plugins();

		// Check if the plugin slug exists in the installed plugins array
		return array_key_exists( $plugin_slug, $installed_plugins );
	}

	// -------------------------------------------------------------

	public static function isAcfActive(): bool {
		return self::checkPluginActive( 'secure-custom-fields/secure-custom-fields.php' ) ||
		       self::checkPluginActive( 'advanced-custom-fields/acf.php' ) ||
		       self::checkPluginActive( 'advanced-custom-fields-pro/acf.php' );
	}

	// -------------------------------------------------------------

	public static function isAcfProActive(): bool {
		return self::checkPluginActive( 'advanced-custom-fields-pro/acf.php' );
	}

	// -------------------------------------------------------------

	/**
	 * @return bool
	 */
	public static function isWoocommerceActive(): bool {
		return self::checkPluginActive( 'woocommerce/woocommerce.php' );
	}

	// --------------------------------------------------

	/**
	 * @param string $path
	 *
	 * @return string
	 */
	public static function home( string $path = '' ): string {
		return apply_filters( 'tesla_home_url_filter', esc_url( home_url( $path ) ), $path );
	}

	// -------------------------------------------------------------

	/**
	 * @param string $option
	 * @param mixed $default
	 * @param int $expire_cache
	 *
	 * @return mixed
	 */
	public static function getOption( string $option, $default = false, int $expire_cache = 21600 ) {
		// Validate the option key
		$option = strtolower( trim( $option ) );
		if ( empty( $option ) ) {
			return $default;
		}

		$site_id      = is_multisite() ? get_current_blog_id() : null;
		$cache_key    = $site_id ? "site_option_{$site_id}_{$option}" : "option_{$option}";
		$cached_value = wp_cache_get( $cache_key, 'options' );
		if ( $cached_value !== false ) {
			return $cached_value;
		}

		$option_value = is_multisite() ? get_site_option( $option, $default ) : get_option( $option, $default );
		wp_cache_set( $cache_key, $option_value, 'options', $expire_cache );

		// Retrieve the option value
		return $option_value;
	}

	// -------------------------------------------------------------

	/**
	 * @param mixed $link
	 * @param string|null $class
	 * @param string|null $label
	 * @param string|null $extra_title
	 *
	 * @return string
	 */
	public static function ACFLink( $link, ?string $class = '', ?string $label = '', ?string $extra_title = '' ): string {
		// string
		if ( ! empty( $link ) && is_string( $link ) ) {
			$link_return = sprintf(
				'<a class="%3$s" href="%1$s" title="%2$s">',
				esc_url( trim( $link ) ),
				self::escAttr( $label ),
				self::escAttr( $class )
			);

			$link_return .= $label . $extra_title;
			$link_return .= '</a>';

			return $link_return;
		}

		// array
		if ( ! empty( $link ) && is_array( $link ) ) {
			$_link_title  = $link['title'] ?? '';
			$_link_url    = $link['url'] ?? '';
			$_link_target = $link['target'] ?? '';

			// force label
			if ( ! empty( $label ) ) {
				$_link_title = $label;
			}

			if ( ! empty( $_link_url ) ) {
				$link_return = sprintf(
					'<a class="%3$s" href="%1$s" title="%2$s"',
					esc_url( $_link_url ),
					self::escAttr( $_link_title ),
					self::escAttr( $class )
				);

				if ( ! empty( $_link_target ) ) {
					$link_return .= ' target="_blank" rel="noopener noreferrer nofollow"';
				}

				$link_return .= '>';
				$link_return .= $_link_title . $extra_title;
				$link_return .= '</a>';

				return $link_return;
			}
		}

		return '';
	}

	// -------------------------------------------------------------

	/**
	 * @param mixed $link
	 * @param string|null $class
	 * @param string|null $label
	 *
	 * @return string
	 */
	public static function ACFLinkOpen( $link, ?string $class = '', ?string $label = '' ): string {
		// string
		if ( ! empty( $link ) && is_string( $link ) ) {
			return sprintf(
				'<a class="%3$s" href="%1$s" title="%2$s">',
				esc_url( trim( $link ) ),
				self::escAttr( $label ),
				self::escAttr( $class )
			);
		}

		// array
		if ( ! empty( $link ) && is_array( $link ) ) {
			$_link_title  = $link['title'] ?? '';
			$_link_url    = $link['url'] ?? '';
			$_link_target = $link['target'] ?? '';

			if ( ! empty( $label ) ) {
				$_link_title = $label;
			}

			if ( ! empty( $_link_url ) ) {
				$link_return = sprintf(
					'<a class="%3$s" href="%1$s" title="%2$s"',
					esc_url( $_link_url ),
					self::escAttr( $_link_title ),
					self::escAttr( $class )
				);

				if ( ! empty( $_link_target ) ) {
					$link_return .= ' target="_blank" rel="noopener noreferrer nofollow"';
				}
				$link_return .= '>';

				return $link_return;
			}
		}

		return '';
	}

	// -------------------------------------------------------------

	/**
	 * @param string|null $content
	 * @param mixed $link
	 * @param string|null $class
	 * @param string|null $label
	 * @param string|bool $empty_link_default_tag
	 *
	 * @return string
	 */
	public static function ACFLinkWrap( ?string $content, $link, ?string $class = '', ?string $label = '', $empty_link_default_tag = 'span' ): string {
		// string
		if ( is_string( $link ) && ! empty( $link ) ) {
			$link_return = sprintf(
				'<a class="%3$s" href="%1$s" title="%2$s">',
				esc_url( trim( $link ) ),
				self::escAttr( $label ),
				self::escAttr( $class )
			);
			$link_return .= $content . '</a>';

			return $link_return;
		}

		// array
		$link = (array) $link;
		if ( $link ) {
			$_link_title  = $link['title'] ?? '';
			$_link_url    = $link['url'] ?? '';
			$_link_target = $link['target'] ?? '';

			if ( ! empty( $label ) ) {
				$_link_title = $label;
			}

			if ( ! empty( $_link_url ) ) {
				$link_return = sprintf(
					'<a class="%3$s" href="%1$s" title="%2$s"',
					esc_url( $_link_url ),
					self::escAttr( $_link_title ),
					self::escAttr( $class )
				);

				if ( ! empty( $_link_target ) ) {
					$link_return .= ' target="_blank" rel="noopener noreferrer nofollow"';
				}

				$link_return .= '>';
				$link_return .= $content;
				$link_return .= '</a>';

				return $link_return;
			}
		}

		// empty link
		$link_return = $content;
		if ( $empty_link_default_tag ) {
			$link_return = '<' . $empty_link_default_tag . ' class="' . self::escAttr( $class ) . '">' . $content . '</' . $empty_link_default_tag . '>';
		}

		return $link_return;
	}

	// --------------------------------------------------

	/**
	 * @param string|null $string
	 *
	 * @return string|null
	 */
	public static function escAttr( ?string $string ): ?string {
		return esc_attr( self::stripAllTags( $string ) );
	}

	// --------------------------------------------------

	/**
	 * @param string|null $string
	 * @param bool $remove_js
	 * @param bool $flatten
	 * @param $allowed_tags
	 *
	 * @return string
	 */
	public static function stripAllTags( ?string $string, bool $remove_js = true, bool $flatten = true, $allowed_tags = null ): string {
		if ( ! is_scalar( $string ) ) {
			return '';
		}

		if ( $remove_js ) {
			$string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', ' ', $string );
		}

		$string = strip_tags( $string, $allowed_tags );

		if ( $flatten ) {
			$string = preg_replace( '/[\r\n\t ]+/', ' ', $string );
		}

		return trim( $string );
	}

	// -------------------------------------------------------------
}
