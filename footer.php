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
			<div>
				<img src="<?php echo $template_directory; ?>/assets/images/iphan_logo.png" />
			</div>
			<div class="icons-footer">
				<?php
				if (get_theme_mod('setting_link_1', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_1', '') . '?>">';
					echo '<i class="tainacan-icon tainacan-icon-1-15em tainacan-icon-twitter"></i>';
					echo '</a>';
				}
				?>
				<?php
				if (get_theme_mod('setting_link_2', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_2', '') . '?>">';
					echo '<i class="tainacan-icon tainacan-icon-facebook"></i>';
					echo '</a>';
				}
				?>
				<?php
				if (get_theme_mod('setting_link_3', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_3', '') . '?>">';
					echo '<i class="tainacan-icon tainacan-icon-instagram"></i>';
					echo '</a>';
				} ?>
				<?php
				if (get_theme_mod('setting_link_4', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_4', '') . '">';
					echo '<img class="imgFooter" alt="' . get_theme_mod('setting_alt_4', '') . '" src="' . get_theme_mod('iphan_logo_4', '') . '" />';
					echo '</a>';
				} ?>
				<?php
				if (get_theme_mod('setting_link_5', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_5', '') . '">';
					echo '<img class="imgFooter" alt="' . get_theme_mod('setting_alt_5', '') . '" src="' . get_theme_mod('iphan_logo_5', '') . '" />';
					echo '</a>';
				} ?>
				<?php
				if (get_theme_mod('setting_link_6', '') !== '') {
					echo '<a href="' . get_theme_mod('setting_link_6', '') . '">';
					echo '<img class="imgFooter" alt="' . get_theme_mod('setting_alt_6', '') . '" src="' . get_theme_mod('iphan_logo_6') . '" />';
					echo '</a>';
				} ?>
			</div>
		</div><!-- .site-info -->
	</div><!-- .site-container -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>