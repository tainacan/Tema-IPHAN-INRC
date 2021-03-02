<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPHAN_INRC
 */

get_header();
get_template_part('template-parts/site-banner');
custom_breadcrumbs();
?>

<main id="primary" class="site-main ">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
if (is_front_page()) {
?>
	<div class="banner-or">
		<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr1.png')">
		</div>
		<div class="banner-footer-or"><span class="text-banner-footer">ou</span></div>
		<!-- Se tiver vazio, não exibir os botões -->
		<div class="buttons-banner-footer">
			<a href="<?php echo get_theme_mod('setting_link_banner_1', '') ?>" class="button-white-footer-banner"><?php echo get_theme_mod('label_banner_1', '') ?></a>
			<div class="separator-banner-footer-horizontal">
			</div>
			<a href="<?php echo get_theme_mod('setting_link_banner_2', '') ?>" class="button-white-footer-banner"><?php echo get_theme_mod('label_banner_2', 'acesse o repositório completo') ?></a>
		</div>
		<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr2.png')">
		</div>
	</div>
<?php
}
get_footer();
?>