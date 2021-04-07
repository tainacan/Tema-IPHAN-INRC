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
	<header class="entry-header">
		<?php iphan_inrc_post_thumbnail(); ?>

		<!-- Componente de destaques -->
		<?php if (is_front_page()) {
		?>
			<section class="destaques">
				<?php
				$defaults = array(
					'numberposts'      => 6,
					'offset'           => 0,
					'category'         => 0,
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'post',
					'post_status'      => 'draft, publish, future',
					'suppress_filters' => true,
				);
				$results = get_posts($defaults);
				?>
				<div class="titulo-destaques">
					<h1 class="is-style-title-iphan-underscore">
						<?php _e('Destaques', 'iphan_inrc') ?>
					</h1>
				</div>
				<div class="linha-1-destaques col-md-12">
					<div class="col-md-8  fundo-vermelho" <?php echo 'style="background-image: url("' . get_the_post_thumbnail(the_id($results[0])) . ' ");"' ?>>
						<div class="destaques-content">
							<?php
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_category($results[0]->ID)[0]->cat_name . '</h2>';
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_title($results[0]) . '</h2>';
							?>
						</div>
					</div>
					<div class="col-md-4 fundo-amarelo">
						<div class="destaques-content">
							<?php
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_category($results[1]->ID)[0]->cat_name . '</h2>';
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_title($results[1]) . '</h2>';
							?>
						</div>
					</div>
				</div>
				<div class="linha-2-destaques destaque-bottom">
					<div class="col-md-4 fundo-verde">
						<div class="destaques-content">
							<?php
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_category($results[2]->ID)[0]->cat_name . '</h2>';
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_title($results[2]) . '</h2>';
							?>
						</div>
					</div>
					<div class="col-md-4 fundo-preto">
						<div class="destaques-content">
							<?php
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_category($results[3]->ID)[0]->cat_name . '</h2>';
							echo '<h2 class="is-style-title-iphan-underscore">' . get_the_title($results[3]) . '</h2>';
							?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-6 destaque-bottom-right fundo-azul">
							<div class="destaques-content">
								<?php
								echo '<h2 class="is-style-title-iphan-underscore">' . get_the_category($results[4]->ID)[0]->cat_name . '</h2>';
								echo '<h2 class="is-style-title-iphan-underscore">' . get_the_title($results[4]) . '</h2>';
								?>
							</div>
						</div>
						<div class="col-md-6 destaque-bottom-right fundo-roxo">
							<div class="destaques-content">
								<?php
								echo '<h2 class="is-style-title-iphan-underscore">' . get_the_category($results[5]->ID)[0]->cat_name . '</h2>';
								echo '<h2 class="is-style-title-iphan-underscore">' . get_the_title($results[5]) . '</h2>';
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		?>
		<?php the_title('<h1 class="entry-title is-style-title-iphan-underscore">', '</h1>'); ?>
		<?php if (is_single()) : ?>
			<div>
				<div class="share-button-wrapper">
					<?php $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
					<a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>" title="Tweet this"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-twitter"></i></a>
					<a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-facebook"></i></a>
				</div>
				<div class="meta-data-single-post">
					<span class=""><?php _e('Escrito por:', 'iphan_inrc');
									echo get_the_author() ?></span>
					<span class=""><?php echo get_the_date("j") . " de <span class='meta-data-month'>" . get_the_date("F") . "</span>, " . get_the_date("Y") ?></span>
				</div>
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content();
		if (is_front_page()) : ?>
			<div class="banner-or alignfull">
				<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr1.png')">
				</div>
				<div class="banner-footer-or"><span class="text-banner-footer">ou</span></div>
				<!-- Se tiver vazio, não exibir os botões -->
				<div class="buttons-banner-footer">
					<a href="<?php echo get_theme_mod('setting_link_banner_1', '') ?>" class="button-white-footer-banner"><?php if (get_theme_mod('label_banner_1', '') === '') {
																																echo 'explore o repositório';
																															} else {
																																echo get_theme_mod('label_banner_1', '');
																															} ?></a>
					<div class="separator-banner-footer-horizontal">
					</div>
					<a href="<?php echo get_theme_mod('setting_link_banner_2', '') ?>" class="button-white-footer-banner"><?php if (get_theme_mod('label_banner_2', '') === '') {
																																echo  'acesse o repositório completo';
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