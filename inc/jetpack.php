<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 */

namespace Required\ThemeName\Theme\Jetpack;

/**
 * Bootstrap the Jetpack integration.
 */
function bootstrap() {
	add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );
}

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support(
		'infinite-scroll',
		[
			'container' => 'main',
			'render'    => __NAMESPACE__ . '\infinite_scroll_render',
			'footer'    => 'page',
		]
	);

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}

/**
 * Custom render function for Infinite Scroll.
 */
function infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
