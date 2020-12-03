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
	<div class="ScrolltoTop">
	<a href="#" class="iconScrollTop"><i class="tainacan-icon tainacan-icon-showmore"></i></a>
	</div>
	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div id="secondary" class="site-container widget-area row">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
		<div class="site-container"><hr></div>
		<div class="site-container">
			<div class="site-info">
					<span class="fonte-iphan">IPHAN</span>
					<div class="icons-footer row">
						<a href="https://twitter.com/">
					<i size="50px" class="tainacan-icon tainacan-icon-twitter"></i>
					</a>
						<a href="https://www.facebook.com/">
					<i class="tainacan-icon tainacan-icon-facebook"></i>
					</a>
<!-- 						<a href="https://www.instagram.com/">
					<i class="tainacan-icon tainacan-icon-instagram"></i>
					</a> -->
					</div>
			</div><!-- .site-info -->
		</div><!-- .site-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
