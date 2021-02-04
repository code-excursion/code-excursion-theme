<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

namespace Required\ThemeName\Theme;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function filter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function the_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with "...".
 *
 * @param string $more_string The string appended if text needs to be trimmed.
 * @return string If not in admin, HTML entity for ellipsis.
 */
function excerpt_more( $more_string ) {
	if ( is_admin() ) {
		return $more_string;
	}

	return __( '&hellip;', 'theme-name' );
}
