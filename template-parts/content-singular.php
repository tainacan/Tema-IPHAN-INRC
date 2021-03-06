<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPHAN_INRC
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="site-container">

		<!-- Componente de destaques -->
		<?php if (is_front_page()) {
			get_template_part('template-parts/destaques-home');
		}
		?>
		<div class="entry-content alinhamento-titulos-post">
			<?php the_title('<h1 class="col-md-10 is-style-title-iphan-underscore">', '</h1>'); ?>
		</div>
		<?php if (is_single()) : ?>
			<div class="entry-content meta-content">
				<div class="share-button-wrapper">
					<?php $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
					<a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>" title="<?php _e('Twittar', 'iphan_inrc'); ?>"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-twitter"></i></a>
					<a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="<?php _e('Compartilhar no Facebook', 'iphan_inrc'); ?>"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-facebook"></i></a>
				</div>
				<div class="meta-data-single-post">
					<span class="meta-post-author">
						<b> <?php _e('Escrito por:', 'iphan_inrc'); ?> </b>
						<?php echo get_the_author() ?>
					</span>
					<span class=""><?php echo get_the_date("j") . " de <span class='meta-data-month'>" . get_the_date("F") . "</span>, " . get_the_date("Y") ?></span>
				</div>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		get_template_part('template-parts/single-inventario');
		the_content();
		if (is_front_page()) : ?>
			<div class="banner-or alignfull">
				<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr1.png')">
				</div>
				<div class="banner-footer-or"><span class="text-banner-footer">ou</span></div>
				<!-- Se tiver vazio, não exibir os botões -->
				<div class="buttons-banner-footer">
					<a href="<?php echo get_theme_mod('setting_link_banner_1', '') ?>" class="button-white-footer-banner"><?php if (get_theme_mod('label_banner_1', '') === '') {
																																echo _e('explore o repositório', 'iphan_inrc');
																															} else {
																																echo get_theme_mod('label_banner_1', '');
																															} ?></a>
					<div class="separator-banner-footer-horizontal">
					</div>
					<a href="<?php echo get_theme_mod('setting_link_banner_2', '') ?>" class="button-white-footer-banner"><?php if (get_theme_mod('label_banner_2', '') === '') {
																																echo  _e('acesse o repositório completo', 'iphan_inrc');
																															} else {
																																echo get_theme_mod('label_banner_2', '');
																															} ?></a>
				</div>
				<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr2.png')">
				</div>
			</div>
		<?php endif;
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'iphan_inrc'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if (!is_front_page()) {
		get_template_part('template-parts/posts-relacionados');
	}
	?>
	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'iphan_inrc'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->