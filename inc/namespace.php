<?php
/**
 * Namespaced functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

namespace Required\ThemeName\Theme;

/**
 * Bootstrap the theme.
 */
function bootstrap() {
	add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );
	add_action( 'after_setup_theme', __NAMESPACE__ . '\set_content_width', 0 );

	add_action( 'widgets_init', __NAMESPACE__ . '\widgets_init' );

	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );

	add_filter( 'body_class', __NAMESPACE__ . '\filter_body_classes' );

	add_action( 'wp_head', __NAMESPACE__ . '\the_pingback_header' );

	add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_more' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function setup() {
	if ( function_exists( 'Required\Traduttore_Registry\add_project' ) ) {
		\Required\Traduttore_Registry\add_project(
			'theme',
			'theme-name',
			'https://translate.required.com/api/translations/project-slug/theme-name/'
		);
	}

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add Support for Wide + Full Alignment.
	add_theme_support( 'align-wide' );

	// Add Support for a Custom Logo.
	add_theme_support( 'custom-logo' );

	// Enable support for Responsive Embeds.
	add_theme_support( 'responsive-embeds' );

	// Disable Custom Font Sizes.
	add_theme_support( 'disable-custom-font-sizes' );

	// Disable Custom Colors.
	add_theme_support( 'disable-custom-colors' );

	// Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		[
			[
				'name' => __( 'Small', 'theme-name' ),
				'size' => 14,
				'slug' => 'small',
			],
			[
				'name' => __( 'Normal', 'theme-name' ),
				'size' => 16,
				'slug' => 'normal',
			],
			[
				'name' => __( 'Large', 'theme-name' ),
				'size' => 24,
				'slug' => 'large',
			],
			[
				'name' => __( 'Huge', 'theme-name' ),
				'size' => 36,
				'slug' => 'huge',
			],
		]
	);

	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => __( 'Brand Main', 'theme-name' ),
				'slug'  => 'brand-main',
				'color' => '#E41B13',
			],
			[
				'name'  => __( 'Black', 'theme-name' ),
				'slug'  => 'black',
				'color' => '#111',
			],
			[
				'name'  => __( 'White', 'theme-name' ),
				'slug'  => 'white',
				'color' => '#FFF',
			],
		]
	);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		[
			'menu-1' => __( 'Primary', 'theme-name' ),
		]
	);

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'project_slug_theme.custom_background_args',
			[
				'default-color' => 'ffffff',
				'default-image' => '',
			]
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function set_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'project_slug_theme.content_width', 760 );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {
	register_sidebar(
		[
			'name'          => __( 'Sidebar', 'theme-name' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here.', 'theme-name' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}

/**
 * Enqueue scripts and styles.
 */
function enqueue_scripts() {
	wp_enqueue_style(
		'theme-name-style',
		get_template_directory_uri() . '/assets/css/style.css',
		[],
		filemtime( get_template_directory() . '/assets/css/style.css' )
	);

	wp_register_script(
		'theme-name-runtime',
		get_template_directory_uri() . '/assets/js/runtime.js',
		[],
		filemtime( get_template_directory() . '/assets/js/runtime.js' ),
		true
	);

	wp_enqueue_script(
		'theme-name-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		[
			'theme-name-runtime',
		],
		filemtime( get_template_directory() . '/assets/js/navigation.js' ),
		true
	);

	wp_enqueue_script(
		'theme-name-skip-link-focus-fix',
		get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
		[
			'theme-name-runtime',
		],
		filemtime( get_template_directory() . '/assets/js/skip-link-focus-fix.js' ),
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
