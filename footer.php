<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
		</div>
	</div>

	<footer class="site-footer">
		<div class="wrap">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'theme-name' ) ); ?>">
					<?php
					printf(
						/* translators: %s: WordPress */
						__( 'Proudly powered by %s', 'theme-name' ),
						'WordPress'
					);
					?>
				</a>
				<span class="sep"> | </span>
				<?php
				printf(
					/* translators: 1: theme name, 2: required gmbh */
					__( 'Theme: %1$s by %2$s.', 'theme-name' ),
					'theme-name',
					'<a href="https://required.com/">required gmbh</a>'
				);
				?>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
