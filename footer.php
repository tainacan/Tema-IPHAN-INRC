<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IPHAN_INRC
 */

?>

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div id="secondary" class="site-container widget-area">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
		<div class="site-container"><hr></div>
		<div class="site-container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'iphan_inrc' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'iphan_inrc' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'iphan_inrc' ), 'iphan_inrc', '<a href="http://tainacan.org">Tainacan</a>' );
					?>
			</div><!-- .site-info -->
		</div><!-- .site-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
