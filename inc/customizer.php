<?php
/**
 * Functions which enhance the customizer
 */

namespace Required\ThemeName\Theme\Customizer;

/**
 * Bootstrap the customizer integration.
 */
function bootstrap() {
	add_action( 'customize_register', __NAMESPACE__ . '\customize_register' );
	add_action( 'customize_preview_init', __NAMESPACE__ . '\customize_preview_js' );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param \Required\ThemeName\Theme\Customizer\WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customize_preview_js() {
	wp_enqueue_script(
		'theme-name-customizer',
		get_template_directory_uri() . '/assets/js/customizer.js',
		[
			'customize-preview',
			'theme-name-runtime',
		],
		filemtime( get_template_directory() . '/assets/js/customizer.js' ),
		true
	);
}
