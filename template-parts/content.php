<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPHAN_INRC
 */

?>
<?php
if (!is_singular()) {
?>
	<div class="alignwide">
		<article id="post-<?php the_ID() ?>" <?php post_class(array("border-excerpt", "margin-list-posts", "excerpt")) ?>>
		<?php
	} else {
		?>
			<article id="post-<?php the_ID() ?>" <?php post_class(array("margin-list-posts", "excerpt")) ?>>
			<?php
		}
			?>
			<header class="margin-list-post ">
				<?php
				if (is_singular()) :
					iphan_inrc_post_thumbnail();
					the_title('<span"><a class="mb-3> ', '</a></span>');
				else :
					the_title('<span><a class="font-weight-bold mb-3" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></span>');
				endif;

				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta">
						<?php
						iphan_inrc_posted_on();
						iphan_inrc_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="margin-list-post ">
				<?php
				echo excerpt(28)
				/* 				the_content(
					sprintf(
						wp_kses(
						
							__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'iphan_inrc'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post(get_the_title())
					)
				); */

				/* 				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'iphan_inrc'),
						'after'  => '</div>',
					)
				); */
				?>
			</div><!-- .entry-content -->
			</article>
			<?php
			if (!is_singular()) {
				echo '</div>';
			}
			?>
			<!-- #post-<?php the_ID(); ?> -->