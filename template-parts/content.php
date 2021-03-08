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
			<div class="posicionamento-excerpt">
				<header class="margin-list-post ">
					<?php
					if (is_singular()) :
						iphan_inrc_post_thumbnail();
						the_title('<div"><a class="mb-3> ', '</a></div>');
					else :
						the_title('<div><a class="font-weight-bold mb-3" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></div>');
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

				<p class="margin-list-post">
					<?php
					echo excerpt(35)
					?>
				</p><!-- .entry-content -->
				<div class="info-footer-resume margin-list-post">
					<div class="date-excerpt-position">
						<?php echo get_the_date("j") . " de " . get_the_date("F, Y") ?>
					</div>
					<div class="wp-block-button">
						<a href="<?php the_permalink(); ?>" class="wp-block-button__link"><?php _e('Ler Mais <i size="50px" class="tainacan-icon tainacan-icon-next"></i>', 'ler-mais'); ?></a>
					</div>
				</div>
			</div>
			</article>
			<?php
			if (!is_singular()) {
				echo '</div>';
			}
			?>
			<!-- #post-<?php the_ID(); ?> -->