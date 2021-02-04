<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'theme-name' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'theme-name' ); ?></p>

					<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'theme-name' ); ?></h2>
						<ul>
						<?php
							wp_list_categories(
								[
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								]
							);
							?>
						</ul>
					</div>

					<?php
						the_widget(
							'WP_Widget_Archives',
							[ 'dropdown' => 1 ],
							[
								'after_title' => sprintf(
									/* translators: %1$s: smiley */
									'</h2><p>' . __( 'Try looking in the monthly archives. %1$s', 'theme-name' ) . '</p>',
									convert_smilies( ':)' )
								),
							]
						);

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>

				</div>
			</section>

		</main>
	</div>

<?php
get_footer();
