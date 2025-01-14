<?php 
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats',
	array(
		'video',
		'image',
		'comments',
		'gallery',
	)
);
 
register_nav_menu ( 'primary-menu', __('Primary Menu', 'pixelcent') );

add_action( 'after_setup_theme', 'my_adjust_image_sizes' );
function my_adjust_image_sizes() {
    //add an cropped image-size with 600 x 337 Pixels (news home page, parent learning, cafeteria )
   		add_image_size( 'home-page-size-600-350', 600, 350, true );
	//add an cropped image-size with 600 x 600 Pixels (news and events )
   		add_image_size( 'custom-image-size-600-600', 600, 600, true );
	//add an cropped image-size with 350 x 350 Pixels (news and events )
   		add_image_size( 'custom-image-size-350-350', 350, 350, true );
}


function sidebar_widgets_footer() {

	register_sidebar( array(
		'name'          => __( 'Footer Description', 'footer_des' ),
		'id'            => 'footer_des',
		'description'   => ( 'Add widgets here to appear in your Sidebar.'),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );	
	register_sidebar( array(
		'name'          => __( 'Footer Menu 1', 'footer_menu_1' ),
		'id'            => 'footer_menu_1',
		'description'   => ( 'Add widgets here to appear in your Sidebar.'),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Menu 2', 'footer_menu_2' ),
		'id'            => 'footer_menu_2',
		'description'   => ( 'Add widgets here to appear in your Sidebar.'),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Contact', 'footer_contact' ),
		'id'            => 'footer_contact',
		'description'   => ( 'Add widgets here to appear in your Sidebar.'),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );	
	// register_sidebar( array(
	// 	'name'          => __( 'Footer Description (EN)', 'footer_des_en' ),
	// 	'id'            => 'footer_des_en',
	// 	'description'   => ( 'Add widgets here to appear in your Sidebar.'),
	// 	'before_widget' => '<aside class="widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<div class="widget-title">',
	// 	'after_title'   => '</div>',
	// ) );
	// register_sidebar( array(
	// 	'name'          => __( 'Footer Area Menu (EN)', 'footer_area_5' ),
	// 	'id'            => 'footer_area_5',
	// 	'description'   => ( 'Add widgets here to appear in your Sidebar.'),
	// 	'before_widget' => '<aside class="widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<div class="widget-title">',
	// 	'after_title'   => '</div>',
	// ) );
	// register_sidebar( array(
	// 	'name'          => __( 'Footer Area Address (EN)', 'footer_area_6' ),
	// 	'id'            => 'footer_area_6',
	// 	'description'   => ( 'Add widgets here to appear in your Sidebar.'),
	// 	'before_widget' => '<aside class="widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<div class="widget-title">',
	// 	'after_title'   => '</div>',
	// ) );
	register_sidebar( array(
		'name'          => __( 'Footer Bar 1', 'footer_bar_1' ),
		'id'            => 'footer_bar_1',
		'description'   => ( 'Add widgets here to appear in your Sidebar.'),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'sidebar_widgets_footer' );


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme options',
        'menu_title'    => 'Theme options',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
}

add_action( 'wp_ajax_nopriv_loadmore', 'prefix_load_posts' );
add_action( 'wp_ajax_loadmore', 'prefix_load_posts' );

function custom_news_events() {

	$labels = array(
		'name'                  => _x( 'News & Events', 'News & Events General Name', 'text_domain' ),
		'singular_name'         => _x( 'News & Events', 'News & Events Singular Name', 'text_domain' ),
		'menu_name'             => __( 'News & Events', 'text_domain' ),
		'name_admin_bar'        => __( 'News & Events', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'news',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'News & Events', 'text_domain' ),
		'description'           => __( 'News & Events Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category-news_events', 'news_events_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-buddicons-community',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'news_events', $args );

}
add_action( 'init', 'custom_news_events', 0 );

function Category_news_events() {

	$labels = array(
		'name'                       => _x( 'Category News & Events', 'Category News & Events', 'pixelcent' ),
		'singular_name'              => _x( 'Category News & Events', 'Category News & Events', 'pixelcent' ),
		'menu_name'                  => __( 'Category News & Events', 'pixelcent' ),
		'all_items'                  => __( 'All Items', 'pixelcent' ),
		'parent_item'                => __( 'Parent Item', 'pixelcent' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pixelcent' ),
		'new_item_name'              => __( 'New Item Name', 'pixelcent' ),
		'add_new_item'               => __( 'Add New Item', 'pixelcent' ),
		'edit_item'                  => __( 'Edit Item', 'pixelcent' ),
		'update_item'                => __( 'Update Item', 'pixelcent' ),
		'view_item'                  => __( 'View Item', 'pixelcent' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pixelcent' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pixelcent' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pixelcent' ),
		'popular_items'              => __( 'Popular Items', 'pixelcent' ),
		'search_items'               => __( 'Search Items', 'pixelcent' ),
		'not_found'                  => __( 'Not Found', 'pixelcent' ),
		'no_terms'                   => __( 'No items', 'pixelcent' ),
		'items_list'                 => __( 'Items list', 'pixelcent' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pixelcent' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'category-news_events', array( 'news_events' ), $args );

}
add_action( 'init', 'Category_news_events', 0 );
function Tag_news_events() {

	$labels = array(
		'name'                       => _x( 'Tag News & Events', 'Tag News & Events', 'pixelcent' ),
		'singular_name'              => _x( 'Tag News & Events', 'Tag News & Events', 'pixelcent' ),
		'menu_name'                  => __( 'Tag News & Events', 'pixelcent' ),
		'all_items'                  => __( 'All Items', 'pixelcent' ),
		'parent_item'                => __( 'Parent Item', 'pixelcent' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pixelcent' ),
		'new_item_name'              => __( 'New Item Name', 'pixelcent' ),
		'add_new_item'               => __( 'Add New Item', 'pixelcent' ),
		'edit_item'                  => __( 'Edit Item', 'pixelcent' ),
		'update_item'                => __( 'Update Item', 'pixelcent' ),
		'view_item'                  => __( 'View Item', 'pixelcent' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pixelcent' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pixelcent' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pixelcent' ),
		'popular_items'              => __( 'Popular Items', 'pixelcent' ),
		'search_items'               => __( 'Search Items', 'pixelcent' ),
		'not_found'                  => __( 'Not Found', 'pixelcent' ),
		'no_terms'                   => __( 'No items', 'pixelcent' ),
		'items_list'                 => __( 'Items list', 'pixelcent' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pixelcent' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'tag-news_events', array( 'news_events' ), $args );

}
add_action( 'init', 'Tag_news_events', 0 );

function custom_cafeteria() {

	$labels = array(
		'name'                  => _x( 'Cafeteria', 'Cafeteria General Name', 'text_domain' ),
		'singular_name'         => _x( 'Cafeteria', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cafeteria', 'text_domain' ),
		'name_admin_bar'        => __( 'Cafeteria', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Cafeteria', 'text_domain' ),
		'description'           => __( 'Cafeteria Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'tag-cafeteria' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-buddicons-community',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'cafeteria', $args );

}
add_action( 'init', 'custom_cafeteria', 0 );

function Tag_cafeteria() {

	$labels = array(
		'name'                       => _x( 'Tag Cafeteria', 'Tag Cafeteria', 'pixelcent' ),
		'singular_name'              => _x( 'Tag Cafeteria', 'Tag Cafeteria', 'pixelcent' ),
		'menu_name'                  => __( 'Tag Cafeteria', 'pixelcent' ),
		'all_items'                  => __( 'All Items', 'pixelcent' ),
		'parent_item'                => __( 'Parent Item', 'pixelcent' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pixelcent' ),
		'new_item_name'              => __( 'New Item Name', 'pixelcent' ),
		'add_new_item'               => __( 'Add New Item', 'pixelcent' ),
		'edit_item'                  => __( 'Edit Item', 'pixelcent' ),
		'update_item'                => __( 'Update Item', 'pixelcent' ),
		'view_item'                  => __( 'View Item', 'pixelcent' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pixelcent' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pixelcent' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pixelcent' ),
		'popular_items'              => __( 'Popular Items', 'pixelcent' ),
		'search_items'               => __( 'Search Items', 'pixelcent' ),
		'not_found'                  => __( 'Not Found', 'pixelcent' ),
		'no_terms'                   => __( 'No items', 'pixelcent' ),
		'items_list'                 => __( 'Items list', 'pixelcent' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pixelcent' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'tag-cafeteria', array( 'cafeteria' ), $args );

}
add_action( 'init', 'Tag_cafeteria', 0 );

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
	)
);

add_post_type_support( 'news_events', 'comments' );
add_post_type_support( 'cafeteria', 'comments' );

function custom_parent_learning() {

	$labels = array(
		'name'                  => _x( 'Parent Learning', 'Parent Learning General Name', 'text_domain' ),
		'singular_name'         => _x( 'Parent Learning', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Parent Learning', 'text_domain' ),
		'name_admin_bar'        => __( 'Parent Learning', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Parent Learning', 'text_domain' ),
		'description'           => __( 'Parent Learning Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'tag-parent_learning' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'parent_learning', $args );

}
add_action( 'init', 'custom_parent_learning', 0 );

function Tag_parent_learning() {

	$labels = array(
		'name'                       => _x( 'Tag Parent Learning', 'Tag Parent Learning', 'pixelcent' ),
		'singular_name'              => _x( 'Tag Parent Learning', 'Tag Parent Learning', 'pixelcent' ),
		'menu_name'                  => __( 'Tag Parent Learning', 'pixelcent' ),
		'all_items'                  => __( 'All Items', 'pixelcent' ),
		'parent_item'                => __( 'Parent Item', 'pixelcent' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pixelcent' ),
		'new_item_name'              => __( 'New Item Name', 'pixelcent' ),
		'add_new_item'               => __( 'Add New Item', 'pixelcent' ),
		'edit_item'                  => __( 'Edit Item', 'pixelcent' ),
		'update_item'                => __( 'Update Item', 'pixelcent' ),
		'view_item'                  => __( 'View Item', 'pixelcent' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pixelcent' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pixelcent' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pixelcent' ),
		'popular_items'              => __( 'Popular Items', 'pixelcent' ),
		'search_items'               => __( 'Search Items', 'pixelcent' ),
		'not_found'                  => __( 'Not Found', 'pixelcent' ),
		'no_terms'                   => __( 'No items', 'pixelcent' ),
		'items_list'                 => __( 'Items list', 'pixelcent' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pixelcent' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'tag-parent_learning', array( 'parent_learning' ), $args );

}
add_action( 'init', 'Tag_parent_learning', 0 );
/*Tesla Talk*/
function custom_tesla_talk() {

	$labels = array(
		'name'                  => _x( 'Tesla Talk', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Tesla Talk', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tesla Talk', 'text_domain' ),
		'name_admin_bar'        => __( 'Tesla Talk', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Tesla Talk', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category-tesla_talk', 'tesla_talk_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'tesla_talk', $args );

}
add_action( 'init', 'custom_tesla_talk', 0 );

function Category_tesla_talk() {

	$labels = array(
		'name'                       => _x( 'Category Tesla Talk', 'Category Tesla Talk', 'pixelcent' ),
		'singular_name'              => _x( 'Category Tesla Talk', 'Category Tesla Talk', 'pixelcent' ),
		'menu_name'                  => __( 'Category Tesla Talk', 'pixelcent' ),
		'all_items'                  => __( 'All Items', 'pixelcent' ),
		'parent_item'                => __( 'Parent Item', 'pixelcent' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pixelcent' ),
		'new_item_name'              => __( 'New Item Name', 'pixelcent' ),
		'add_new_item'               => __( 'Add New Item', 'pixelcent' ),
		'edit_item'                  => __( 'Edit Item', 'pixelcent' ),
		'update_item'                => __( 'Update Item', 'pixelcent' ),
		'view_item'                  => __( 'View Item', 'pixelcent' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pixelcent' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pixelcent' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pixelcent' ),
		'popular_items'              => __( 'Popular Items', 'pixelcent' ),
		'search_items'               => __( 'Search Items', 'pixelcent' ),
		'not_found'                  => __( 'Not Found', 'pixelcent' ),
		'no_terms'                   => __( 'No items', 'pixelcent' ),
		'items_list'                 => __( 'Items list', 'pixelcent' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pixelcent' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'category-tesla_talk', array( 'tesla_talk' ), $args );

}
add_action( 'init', 'Category_tesla_talk', 0 );

function Tag_tesla_talk() {

	$labels = array(
		'name'                       => _x( 'Tag Tesla Talk', 'Tag Tesla Talk', 'pixelcent' ),
		'singular_name'              => _x( 'Tag Tesla Talk', 'Tag Tesla Talk', 'pixelcent' ),
		'menu_name'                  => __( 'Tag Tesla Talk', 'pixelcent' ),
		'all_items'                  => __( 'All Items', 'pixelcent' ),
		'parent_item'                => __( 'Parent Item', 'pixelcent' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pixelcent' ),
		'new_item_name'              => __( 'New Item Name', 'pixelcent' ),
		'add_new_item'               => __( 'Add New Item', 'pixelcent' ),
		'edit_item'                  => __( 'Edit Item', 'pixelcent' ),
		'update_item'                => __( 'Update Item', 'pixelcent' ),
		'view_item'                  => __( 'View Item', 'pixelcent' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pixelcent' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pixelcent' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pixelcent' ),
		'popular_items'              => __( 'Popular Items', 'pixelcent' ),
		'search_items'               => __( 'Search Items', 'pixelcent' ),
		'not_found'                  => __( 'Not Found', 'pixelcent' ),
		'no_terms'                   => __( 'No items', 'pixelcent' ),
		'items_list'                 => __( 'Items list', 'pixelcent' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pixelcent' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'tag-tesla_talk', array( 'tesla_talk' ), $args );

}
add_action( 'init', 'Tag_tesla_talk', 0 );

add_filter( 'rocket_lazyload_placeholder', function( $placeholder ) {
    $placeholder = site_url().'/wp-content/uploads/2022/01/giphy-2.gif';
    return $placeholder;
} );

//ghi log prev next
function custom_logs($message) { 

    if(is_array($message)) { 
        $message = json_encode($message); 
    } 
    $file = fopen("../custom_logs.log","a"); 
    echo fwrite($file, "\n" . date('Y-m-d h:i:s') . " :: " . getmypid()); 
    fclose($file); 
	
}
//API add and update student
$auth_token = "1b32730612c85b96a0ebfff4c3ebdf3fc522f0e11543c9f178b71ff2f48af8e3";
function rest_data_api($url, $method = 'GET', $input = [])
{
	
	try {
		$curl = curl_init();
		$isPost = $method == 'POST' ? 1 : 0;
		if ($isPost) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, $input);
		}
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL =>$url,
			CURLOPT_POST => (bool)$isPost,
			CURLOPT_SSL_VERIFYPEER => true,
			CURLOPT_HTTPHEADER => array(
				"auth-token: 1b32730612c85b96a0ebfff4c3ebdf3fc522f0e11543c9f178b71ff2f48af8e3",
			)
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		return [
			'status' => 'success',
			'data' => $resp
		];
	} catch (\Exception $e) {
		return [
			'status' => 'failed',
			'error' => $e
		];
	}
}
if(isset($_GET['sync_managebac'])){
	$resp=rest_data_api("https://api.managebac.com/v2/students?per_page=9999");
	$resp = json_decode($resp['data']);
	if (empty($resp)) {
		echo json_encode (array('status' => 'failed'));die;
	}
    $students = $resp->students;
	global  $wpdb;
	$table  = $wpdb->prefix . 'students';
	$studen_id_array=array();
	$data_studen_id_array = $wpdb->get_results("SELECT id_student FROM $table ");
	
	foreach($data_studen_id_array as $value){
		$studen_id_array[$value->id_student]=$value->id_student;
	}
	
	$column=["id","email","first_name","middle_name","last_name","archived","timezone","role","created_at","updated_at","birthday","phone_number","mobile_phone_number","national_id","student_id","homeroom_advisor_id","attendance_start_date","class_grade","class_grade_number","program","program_code","ib_group_id","year_group_id","parent_ids","country","nationalities","languages","graduating_year"];
	$array=array();
	try 
	{	
		foreach($students as $value)
		{
			$data=json_decode(json_encode($value), true);
			if (array_key_exists($value->id,$studen_id_array))
			{
				$id=$data['id'];
				unset($data['id']);
				@$data['parent_ids']=implode(",",@$data['parent_ids']);
				@$data['nationalities']=implode(",",@$data['nationalities']);
				@$data['languages']=implode(",",@$data['languages']);
				foreach($value as $key => $student_detail)
				{
					if(!in_array($key,$column))
					{
						unset($data[$key]);
					}
				}
				$wpdb->update($table , $data, array('id_student' => $id ));
			}
				else
			{
				$array[]=$data['id'];
				$data['id_student']=$data['id'];
				unset($data['id']);
				foreach($value as $key => $student_detail)
				{
					if(!in_array($key,$column))
					{
						unset($data[$key]);
					}
				}
				$create=$wpdb->insert($table, $data);
			}
		}
		echo json_encode( array('status' => 'success'));
		die;
	} catch (\Exception $e) {
		echo json_encode (array('status' => 'failed','error' => $e));die;
	}
}
//API search autocomeplete autocomeplete
if(isset($_GET['searchStudents'])){
	$name=strtolower(@$_REQUEST['term']);
	$name = str_replace(" ","",$name);
	global  $wpdb;
	$table  = $wpdb->prefix . 'students';
	$sql = "SELECT * FROM $table WHERE  LOWER(replace(CONCAT(last_name,' ',middle_name,' ',first_name),' ','')) LIKE n'%$name%' 
									or LOWER(email) LIKE n'%$name%' 
									or student_id LIKE n'%$name%'  LIMIT 10";
	$data_studen_id_array = $wpdb->get_results($sql);
	$data_stydent=array();
	$output = array();
	if(count($data_studen_id_array)>0)
	{
		foreach ($data_studen_id_array as $value)
		{
			$birthday=date_create(@$value->birthday);
			$temp_array = array();
			$temp_array['value'] = trim(preg_replace('/\s+/',' ', (string)($value->last_name.' '.$value->middle_name.' '.$value->first_name)));
			$temp_array['label'] = trim(preg_replace('/\s+/',' ', (string)($value->last_name.' '.$value->middle_name.' '.$value->first_name)))." ( ".date_format(@$birthday,"d/m/Y")." )";
			$temp_array['id_student'] =$value->student_id; 
			$output[] = $temp_array;
		}
		
	}
   
	echo json_encode($output);die;
}

//ajax search get info student 
if(isset($_GET['jaxSearchStudent'])){
	$id_student=$_REQUEST['id_student'];
	$input=$_REQUEST['input_search'];
	global  $wpdb;
	$table  = $wpdb->prefix . 'students';
	$html_info_student='';
	if($id_student)
	{
		$sql = "SELECT * FROM $table WHERE  student_id LIKE n'%$id_student%'  LIMIT 1";
		
		$data_studen_id_array = $wpdb->get_results($sql);
		$info_student =json_decode(json_encode($data_studen_id_array), true);
		/*foreach($info_student[0] as $key => $value)
		{
			$html_info_student.="</br> - ".$key.": ".$value;
		}*/
		$birthday=date_create(@$info_student[0]['birthday']);
		$html_info_student.="</br> - Mã Số Học Sinh: ".$info_student[0]['student_id'];
		$html_info_student.="</br> - Họ Tên: ".trim(preg_replace('/\s+/',' ', (string)($info_student[0]['last_name'].' '.$info_student[0]['middle_name'].' '.$info_student[0]['first_name'])));
		$html_info_student.="</br> - Ngày sinh: ".date_format(@$birthday,"d/m/Y");
		$html_info_student.="</br> - Lớp: ".$info_student[0]['class_grade'];
		$html_info_student.="</br> - Email: ".$info_student[0]['email'];
		$html_info_student.="</br> - Giới tính: ".$info_student[0]['gender'];
		$html_info_student.="</br> - Số điện thoại: ".$info_student[0]['phone_number'];
		$html_info_student.="</br> - Điện thoại di động: ".$info_student[0]['mobile_phone_number'];
		echo $html_info_student;die;
		//echo json_encode($info_student[0]);die;
	}
	$name=strtolower(@$input);
	$name = str_replace(" ","",$name);
	$sql = "SELECT * FROM $table WHERE  LOWER(replace(CONCAT(last_name,' ',middle_name,' ',first_name),' ','')) LIKE n'%$name%' 
									or LOWER(email) LIKE n'%$name%' 
									or student_id LIKE n'%$name%'  LIMIT 1";
	$data_studen_id_array = $wpdb->get_results($sql);
	if(count($data_studen_id_array)>0)
	{
		$info_student =json_decode(json_encode($data_studen_id_array), true);
		/*foreach($info_student[0] as $key => $value)
		{
			$html_info_student.="</br> - ".$key.": ".$value;
		}*/
		$birthday=date_create(@$info_student[0]['birthday']);
		$html_info_student.="</br> - Mã Số Học Sinh: ".$info_student[0]['student_id'];
		$html_info_student.="</br> - Họ Tên: ".trim(preg_replace('/\s+/',' ', (string)($info_student[0]['last_name'].' '.$info_student[0]['middle_name'].' '.$info_student[0]['first_name'])));
		$html_info_student.="</br> - Ngày sinh: ".date_format(@$birthday,"d/m/Y");
		$html_info_student.="</br> - Lớp: ".$info_student[0]['class_grade'];
		$html_info_student.="</br> - Email: ".$info_student[0]['email'];
		$html_info_student.="</br> - Giới tính: ".$info_student[0]['gender'];
		$html_info_student.="</br> - Số điện thoại: ".$info_student[0]['phone_number'];
		$html_info_student.="</br> - Điện thoại di động: ".$info_student[0]['mobile_phone_number'];
		echo $html_info_student;die;
	}
	else
	{
		echo '<div class="alert alert-danger" role="alert">Lỗi! Không tìm thấy thông tin.</div>';die;
	}
	
}
//ajax search info student by email parent of my profile page
if(isset($_GET['searchByEmail'])){
	$email=$_REQUEST['email'];
	global  $wpdb;
	$table  = $wpdb->prefix . 'students';
	$html='';
	if($email && $_SERVER['REQUEST_METHOD']=="POST")
	{
		try 
		{
			$sql = "SELECT id_student,first_name,middle_name,last_name,class_grade
			FROM $table
			WHERE email like '$email'";
			$data_studen_id_array = $wpdb->get_results($sql);
			$tring_title='Số Học Sinh: ';
			$tring_status='Trạng Thái: ';
			$array_status=[
				"-1"=>"Ngoài trường",
				"0"=>"Ngoài trường",
				"1" =>"Trong trường",
				"2" =>"Chưa dùng thẻ",
				"3"=>" Không có mã học sinh"
				
			];
			
			if($_REQUEST['lg'] == 'en')
			{
				$tring_title="The Number Of Student(s): ";
				$tring_status='Status: ';
				$array_status=[
				"-1"=>"Outside the school",
				"0"=>"Outside the school",
				"1" =>"In school",
				"2" =>"Unused card",
				"3"=>"There are no student codes"
			];
			}				
			if(count($data_studen_id_array)==0)
			{
				$html.="<div class='um-field-label'>
						<label for='user_registered-5953'>$tring_title".count($data_studen_id_array)."</label>
						<div class='um-clear'></div>
					</div>";
				echo $html;die;
			}
			$html.="<div class='um-field-label'>
						<label for='user_registered-5953'>$tring_title".count($data_studen_id_array)."</label>
						<div class='um-clear'></div>
					</div>";
			$temp=1;
			foreach($data_studen_id_array as $value){
				$status_student=null;
				if($value->id_student!=null)
				{
					$resp=rest_data_api("http://14.161.7.245:8003/?type=getuid&uid=".$value->id_student);
					$resp = json_decode($resp['data']);
					if (empty($resp)) {
						echo 'Error API get status';die;
					}
					if(count($resp)>1)
					{
						$status_student=$array_status[2];
					}
					$status_student=$array_status[$resp[0]];
				}
				else
				{
					$status_student=$array_status[3];
				}
				$html.="
					<div class='um-field-area'>
						<div class='um-field-value row' id='user_registered-5953'>
							<div class='col-lg-1'>$temp.</div> 
							<div class='col-lg-6'>".
								trim(preg_replace('/\s+/',' ', (string)($value->last_name.' '.$value->middle_name.' '.$value->first_name)))." - " . @$value->class_grade.
							"</div>
							<div class='col-lg-3'>
								$tring_status "."$status_student"."
							</div>
						</div>
					</div>";
				$temp++;
			}
			echo $html;die;
		} catch (\Exception $e) {
			echo json_encode (array('status' => 'failed','error' => $e));die;
		}
	}
	echo json_encode (array('status' => 'failed','error' => $e));die;
}
//add show password plugin ultimate member
add_filter("um_confirm_user_password_form_edit_field","um_user_password_form_edit_field", 10, 2 );
add_filter("um_user_password_form_edit_field","um_user_password_form_edit_field", 10, 2 );
function um_user_password_form_edit_field( $output, $set_mode ){
    
    ob_start();
     ?>
    <div id='um-field-show-passwords-<?php echo $set_mode;?>' style='text-align:right;display:block;'>
    	<i class='um-faicon-eye-slash'></i>
    	<a href='#'><?php _e("Show password","ultimate-member"); ?></a>
    </div>
    <script type='text/javascript'>
	    jQuery('div[id="um-field-show-passwords-<?php echo $set_mode;?>"] a').click(function(){ 
		 
            var $parent = jQuery(this).parent("div"); 
            var $form = jQuery(".um-<?php echo $set_mode;?> .um-form");

		    $parent.find("i").toggleClass(function() {
		    	if ( jQuery( this ).hasClass( "um-faicon-eye-slash" ) ) {
	                $parent.find("a").text('<?php _e("Hide password","ultimate-member"); ?>');
		    		jQuery( this ).removeClass( "um-faicon-eye-slash" )
		    		$form.find(".um-field-password").find("input[type=password]").attr("type","text");
		    	   return "um-faicon-eye";
			    }
				 
				jQuery( this ).removeClass( "um-faicon-eye" );
				$parent.find("a").text('<?php _e("Show password","ultimate-member"); ?>');
			    $form.find(".um-field-password").find("input[type=text]").attr("type","password");
			  
                return "um-faicon-eye-slash";
			});

		    return false; 

		});
	</script>
    <?php 
	return $output.ob_get_clean();

}
//set session
function register_my_session()
{
  if( !session_id() )
  {
    session_start();
  }
}

add_action('init', 'register_my_session');
//open new tab
/**
 * Open. redirect in a new window
 *
 * @link https://wpforms.com/developers/how-to-open-redirect-in-a-new-window/
 */
 /*Virtual Tour EN*/
function wpf_dev_open_redirect_new( ) {
?>
<script type="text/javascript">
    jQuery(function($){
        $( "form#wpforms-form-2870" ).attr( "target", "_blank" );
        $( "#wpforms-form-2870" ).on( 'submit', function(){
            location.reload(true);  
        });
    }); 
    </script>
<?php 
}
add_action( 'wpforms_wp_footer_end', 'wpf_dev_open_redirect_new', 30 );
/*Virtual Tour VN*/
function wpf_dev_open_redirect_new_vn( ) {
?>
<script type="text/javascript">
    jQuery(function($){
        $( "form#wpforms-form-2875" ).attr( "target", "_blank" );
        $( "#wpforms-form-2875" ).on( 'submit', function(){
            location.reload(true);  
        });
    }); 
    </script>
<?php 
}
add_action( 'wpforms_wp_footer_end', 'wpf_dev_open_redirect_new_vn', 30 );
//CODE FOR VIEWING
function getPostViews($postID){ $count_key = 'post_views_count'; $count = get_post_meta($postID, $count_key, true); if($count==''){ delete_post_meta($postID, $count_key); add_post_meta($postID, $count_key, '0'); return "<b>01 </b>"; } return $count.' ';
}
// CODE COUNTER VIEW
function setPostViews($postID) { $count_key = 'post_views_count'; $count = get_post_meta($postID, $count_key, true); if($count==''){ $count = 0; delete_post_meta($postID, $count_key); add_post_meta($postID, $count_key, '0'); }else{ $count++; update_post_meta($postID, $count_key, $count); }
}
//CODE SHOWING THE NUMBER OF VIEWS OF ARTICLES IN DASHBOARDH
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){ $defaults['post_views'] = __('Lượt xem'); return $defaults;
}
function posts_custom_column_views($column_name, $id){ if($column_name === 'post_views'){ echo getPostViews(get_the_ID()); }
}
//CODE FOR VIEWING END

function url_query_string( $url ) {
    if ( ! empty( $_SERVER['QUERY_STRING'] ) ) {
		if(str_contains($_SERVER['QUERY_STRING'], "sid")){
			return $url . '?' . $_SERVER['QUERY_STRING'];
		}else{
			return $url;
		}
        
    }
    return $url;
}
add_filter( 'pll_the_language_link', 'url_query_string' );

add_action('template_redirect','check404');
function check404(){
     if (is_404() ) { 
		
        $url = trim($_SERVER['REQUEST_URI'],"/");
		
        $url = esc_url_raw( $url );
        //FIND IF THERE IS A POST...
        $the_slug = end(explode("/", $url));
		
		$args = array(
		  'name'        => $the_slug,
		  'post_type'   => array('post','news_events','cafeteria','parent_learning','tesla_talk'),
		  'post_status' => 'publish',
		  'numberposts' => 1
		);
		$my_posts = get_posts($args);
		 if( $my_posts ) :
			$link = get_permalink($my_posts[0]->ID);
			  if(!empty($link)){
				wp_redirect( $link, 301 );
				exit;
			}
		endif; 
     }
}
add_filter( 'wpseo_robots', 'rank_seo_robots_modify_search' );

function rank_seo_robots_modify_search( $robots ) {
  if ( is_search() || is_404()) {
    return "noindex, nofollow"; 
  }else{
    return $robots;
  }
}
// add css
function custom_theme_style(){
	wp_register_style( $handle = 'header', $src = get_template_directory_uri().'/assets/css/header.css', $deps = array(), $ver = false, $media = 'all' );
	wp_enqueue_style('header');

	wp_register_style( $handle = 'footer', $src = get_template_directory_uri().'/assets/css/footer.css', $deps = array(), $ver = false, $media = 'all' );
	wp_enqueue_style('footer');

	wp_register_style( $handle = 'home', $src = get_template_directory_uri().'/assets/css/home.css', $deps = array(), $ver = false, $media = 'all' );
	wp_enqueue_style('home');

	wp_register_style( $handle = 'page-aboutus', $src = get_template_directory_uri().'/assets/css/page-aboutus.css', $deps = array(), $ver = false, $media = 'all' );
	wp_enqueue_style('page-aboutus');

    wp_register_style( $handle = 'custom', $src = get_template_directory_uri().'/assets/css/custom.css', $deps = array(), $ver = false, $media = 'all' );
	wp_enqueue_style('custom');

	wp_register_style( $handle = 'fonts', $src = 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', $deps = array(), $ver = false, $media = 'all' );
	wp_enqueue_style('fonts');
}
add_action( 'wp_enqueue_scripts', 'custom_theme_style',PHP_INT_MAX );

// shortcode hien thi danh sach polylang
function pll_language_switcher_shortcode($atts) {
    $atts = shortcode_atts(array(
        'dropdown' => 0,
        'show_flags' => 1,
        'show_names' => 1,
    ), $atts);

    if (function_exists('pll_the_languages')) {
        return pll_the_languages(array(
            'dropdown' => $atts['dropdown'],
            'show_flags' => $atts['show_flags'],
            'show_names' => $atts['show_names'],
            'echo' => 0,
        ));
    }
    return '';
}
add_shortcode('language_switcher', 'pll_language_switcher_shortcode');
