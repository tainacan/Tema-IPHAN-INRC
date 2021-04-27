<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPHAN_INRC
 */

?>
<section class="no-results not-found site-content entry-content">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e('conteúdo não encontrado', 'iphan_inrc'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__('Pronto para publicar seu primeiro post? <a href="%1$s">Clique aqui</a>.', 'iphan_inrc'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);

		elseif (is_search()) : ?>
			<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'iphan_inrc'); ?></p>
		<?php else : ?>
			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'iphan_inrc'); ?></p>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->