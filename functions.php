<?php
/**
 * School Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package School_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function school_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on School Theme, use a find and replace
		* to change 'school-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'school-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'school-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'school_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'school_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'school_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'school_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'school-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'school-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'school_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function school_theme_scripts() {
	wp_enqueue_style( 'school-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'school-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'school-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// AOS Animations!!

function enqueue_aos_scripts() {
    if (is_singular('post') || is_home() || is_archive()) {
        wp_enqueue_style('aos-css', get_template_directory_uri() . '/sass/aos.scss');
        wp_enqueue_script('aos-js', get_template_directory_uri() . '/js/aos.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts');

// AOS Animation End

// wide blocks
function block_align_wide() {
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'block_align_wide');

// Change title placeholder for students
function wpb_change_title_text( $title ){
    $screen = get_current_screen();
  
    if  ( 'student' == $screen->post_type ) {
         $title = 'Add student name';
    }
  
    return $title;
}
  
add_filter( 'enter_title_here', 'wpb_change_title_text' );

// CPT
function fwd_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name' ),
        'singular_name'      => _x( 'Staff Member', 'post type singular name' ),
        'menu_name'          => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'     => _x( 'Staff Member', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'staff member' ),
        'add_new_item'       => __( 'Add New Staff Member' ),
        'new_item'           => __( 'New Staff Member' ),
        'edit_item'          => __( 'Edit Staff Member' ),
        'view_item'          => __( 'View Staff Member' ),
        'all_items'          => __( 'All Staff Members' ),
        'search_items'       => __( 'Search Staff Members' ),
        'parent_item_colon'  => __( 'Parent Staff Members:' ),
        'not_found'          => __( 'No staff members found.' ),
        'not_found_in_trash' => __( 'No staff members found in Trash.' ),
        'archives'           => __( 'Staff Member Archives'),
        'insert_into_item'   => __( 'Insert into staff member'),
        'uploaded_to_this_item' => __( 'Uploaded to this staff member'),
        'filter_item_list'   => __( 'Filter staff members list'),
        'items_list_navigation' => __( 'Staff members list navigation'),
        'items_list'         => __( 'Staff members list'),
        'featured_image'     => __( 'Staff Member featured image'),
        'set_featured_image' => __( 'Set staff member featured image'),
        'remove_featured_image' => __( 'Remove staff member featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title' ),
    );
    register_post_type( 'fwd-staff', $args );
}
add_action( 'init', 'fwd_register_custom_post_types' );

// Taxonomies
function fwd_register_staff_taxonomy() {
    $labels = array(
        'name'              => _x( 'Departments', 'taxonomy general name' ),
        'singular_name'     => _x( 'Department', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Departments' ),
        'all_items'         => __( 'All Departments' ),
        'parent_item'       => __( 'Parent Department' ),
        'parent_item_colon' => __( 'Parent Department:' ),
        'edit_item'         => __( 'Edit Department' ),
        'update_item'       => __( 'Update Department' ),
        'add_new_item'      => __( 'Add New Department' ),
        'new_item_name'     => __( 'New Department Name' ),
        'menu_name'         => __( 'Departments' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'department' ),
    );

    register_taxonomy( 'department', array( 'fwd-staff' ), $args );
}
add_action( 'init', 'fwd_register_staff_taxonomy' );

// Taxonomy Terms
function fwd_create_staff_taxonomy_terms() {
    if ( !term_exists( 'Faculty', 'department' ) ) {
        wp_insert_term(
            'Faculty',
            'department'
        );
    }

    if ( !term_exists( 'Administrative', 'department' ) ) {
        wp_insert_term(
            'Administrative',
            'department'
        );
    }
}
add_action( 'init', 'fwd_create_staff_taxonomy_terms' );




// function fwd_change_staff_title_placeholder($title) {
//     $screen = get_current_screen();
//     if ($screen->post_type == 'staff') {
//         $title = 'Add staff name';
//     }
//     return $title;
// }
// add_filter('enter_title_here', 'fwd_change_staff_title_placeholder');

require get_template_directory() . '/inc/cpt-taxonomy.php';
