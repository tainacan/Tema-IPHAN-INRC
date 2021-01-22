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
	<?php if (is_active_sidebar('footer-1')) : ?>
		<div id="secondary" class="site-container widget-area row">
			<?php dynamic_sidebar('footer-1'); ?>
		</div>
	<?php endif; ?>
	<div class="site-container separator">
		<hr>
	</div>
	<div class="site-container">
		<div class="site-info">
			<?php $template_directory = get_template_directory_uri(); ?>
			<img src="<?php echo $template_directory; ?>/assets/images/iphan_logo.png" />

			<div class="icons-footer row">
				<?php
				if (get_theme_mod('setting_link_1', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_1', '') . '?>">';
					echo '<i size="50px" class="tainacan-icon tainacan-icon-twitter"></i>';
					echo '</a>';
				}
				if (get_theme_mod('setting_link_2', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_2', '') . '?>">';
					echo '<i size="50px" class="tainacan-icon tainacan-icon-facebook"></i>';
					echo '</a>';
				}
				if (get_theme_mod('setting_link_3', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_3', '') . '?>">';
					echo '<i size="50px" class="tainacan-icon tainacan-icon-instagram"></i>';
					echo '</a>';
				}
				$imagem4 = get_theme_mod('iphan_logo_control_4', '');
				$link4 = get_theme_mod('setting_link_4', '');
				if ($link !== '') {
					echo '<a href="' . $link4 . '">';
					echo '<img src="' . $imagem4 . '"/>';
					echo '</a>';
				}
				$imagem5 = get_theme_mod('iphan_logo_control_5', '');
				$link5 = get_theme_mod('setting_link_5', '');
				if ($link !== '') {
					echo '<a href="' . $link5 . '">';
					echo '<img src="' . $imagem5 . '"/>';
					echo '</a>';
				}
				$imagem6 = get_theme_mod('iphan_logo_control_6', '');
				$link6 = get_theme_mod('setting_link_6', '');
				if ($link !== '') {
					echo '<a href="' . $link6 . '">';
					echo '<img src="' . $imagem6 . '"/>';
					echo '</a>';
				}
				?>
			</div>
		</div><!-- .site-info -->
	</div><!-- .site-container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>