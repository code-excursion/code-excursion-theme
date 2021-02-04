<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theme-name' ); ?></a>

	<header class="site-header">
		<div class="wrap">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title">
						<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						<?php endif; ?>
					</h1>
				<?php else : ?>
					<p class="site-title">
						<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						<?php endif; ?>
					</p>
					<?php
				endif;
				?>
			</div>

			<nav id="site-navigation" class="site-navigation">
				<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'theme-name' ); ?></button>
				<?php
					wp_nav_menu(
						[
							'theme_location'  => 'menu-1',
							'menu_id'         => 'nav-main',
							'container'       => 'div',
							'container_class' => 'nav-main',
							'items_wrap'      => '<ul class="menu">%3$s</ul>',
						]
					);
					?>
			</nav>
		</div>
	</header>

	<div id="content" class="site-content">
		<div class="wrap">
