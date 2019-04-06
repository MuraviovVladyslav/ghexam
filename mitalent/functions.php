<?php
/**
 * mitalent functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mitalent
 */

if ( ! function_exists( 'mitalent_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mitalent_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mitalent, use a find and replace
		 * to change 'mitalent' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mitalent', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mitalent' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mitalent_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mitalent_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mitalent_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mitalent_content_width', 640 );
}
add_action( 'after_setup_theme', 'mitalent_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mitalent_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mitalent' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mitalent' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mitalent_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mitalent_scripts() {
	wp_enqueue_style( 'mitalent-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mitalent-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mitalent-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_style('add_google_fonts', '//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', false);

    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.7.2/css/all.css');

    wp_enqueue_script( 'mitalent-slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');

    wp_enqueue_script( 'mitalent-isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.js');

    wp_enqueue_script( 'mitalent-gallery', get_template_directory_uri() . '/js/gallery.js', array(), '20151215', true );



}
add_action( 'wp_enqueue_scripts', 'mitalent_scripts' );

add_action('wp_enqueue_scripts', 'my_scripts_jquery');                                      //connect jQuery
function my_scripts_jquery() {
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
};

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

function create_post_type_banner (){
    register_post_type('banner', array(
        'labels'    =>  array(
            'name'  => __('Banner'),
            'singular_name' =>  __('Banner')
        ),
        'public'    =>  true,
        'has_archive'   =>  true,
        'supports'  =>  array(
            'title',
            'editor',
            'thumbnail',
            'post-formats',
            'excerpt',
            'custom-fields'
        )
    ));
}
add_action('init', 'create_post_type_banner');
function create_post_type_gallery (){
    register_post_type('gallery', array(
        'labels'    =>  array(
            'name'  => __('Gallery'),
            'singular_name' =>  __('Gallery')
        ),
        'public'    =>  true,
        'has_archive'   =>  true,
        'supports'  =>  array(
            'title',
            'editor',
            'thumbnail',
            'post-formats',
            'excerpt',
        )
    ));
}
add_action('init', 'create_post_type_gallery');

function create_post_type_news (){
    register_post_type('news', array(
        'labels'    =>  array(
            'name'  => __('News'),
            'singular_name' =>  __('News')
        ),
        'public'    =>  true,
        'has_archive'   =>  true,
        'supports'  =>  array(
            'title',
            'editor',
            'thumbnail',
            'post-formats',
            'excerpt',
        )
    ));
}
add_action('init', 'create_post_type_news');

