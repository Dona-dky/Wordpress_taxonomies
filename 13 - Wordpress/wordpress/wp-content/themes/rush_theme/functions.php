<?php
/**
 * Rush Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rush_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'rush_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rush_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Rush Theme, use a find and replace
		 * to change 'rush_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rush_theme', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'rush_theme' ),
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
				'rush_theme_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'rush_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rush_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rush_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'rush_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rush_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rush_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rush_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rush_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rush_theme_scripts() {
	wp_enqueue_style( 'rush_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rush_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rush_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rush_theme_scripts' );


/**
 * Taxonomy for ingredient
 */
function rush_theme_init() {

	//j'aurais du mettre "ingrédients" au lieu de "projet" pour récupérer toutes les informations, pour que ce soit plus logique et mieux respecter les consignes 
	register_post_type(
		'projet',
		array(
		'label' => 'Les ingrédients',
		'menu_position' => 3,
		'menu_icon' => 'dashicons-coffee',
		'labels' => array(
		'name' => 'Les ingrédients',
		'singular_name' => 'Ingrédient',
		'all_items' => 'Tous les ingrédients',
		'add_new_item' => 'Ajouter un ingrédient',
		'edit_item' => 'Éditer l ingrédient',
		'new_item' => 'Nouvel ingrédient',
		'view_item' => 'Voir l ingrédient',
		'search_items' => 'Rechercher parmi les ingrédients',
		'not_found' => 'Pas d ingrédient trouvé',
		'not_found_in_trash'=> 'Pas d ingrédient dans la corbeille'
		),
		'public' => true,
		'capability_type' => 'post',
		'supports' => array(
		'title',
		'editor',
		'thumbnail'
		),
		'show_in_rest' => true,
		'has_archive' => true
		)
		);

	register_taxonomy('ingrédient','projet',[
		'labels' => [
			'name' 			=> 'Ingrédient',
            'singular_name' => 'Ingrédient',
            'plural_name'   => 'Ingrédients',
            'search_items'  => 'Rerchercher des ingrédients',
            'all_items'     => 'Tous les ingrédients',
            'edit_item'     => 'Editer l ingrédient',
            'update_item'   => 'Mettre à jour l ingrédient',
            'add_new_item'  => 'Ajouter un nouvel ingrédient',
            'new_item_name' => 'Ajouter un nouvel ingrédient',
            'menu_name'     => 'Ingrédient',
		],
		'show_in_rest' => true,
		'query_var' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
	]);
	register_taxonomy_for_object_type( 'ingrédient', 'projet' );
}

add_action( 'init', 'rush_theme_init' );



function rush_theme_register_assets()
{
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', []);
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'rush_theme_register_assets');


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

