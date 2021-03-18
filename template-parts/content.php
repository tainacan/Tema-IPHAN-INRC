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
		<article id="post-<?php the_ID() ?>" <?php post_class(array("border-excerpt", "excerpt")) ?>>
		<?php
	} else {
		?>
			<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
			<?php
		}
			?>
			<div class="posicionamento-excerpt">
				<header class="margin-list-post ">
					<?php
					if (is_singular()) :
						iphan_inrc_post_thumbnail();
						the_title('<div class="col-md-8 alignwide"><h3 class="mb-3 is-style-title-iphan-underscore"> ', '</h3></div>');
					else :
						the_title('<div class="mb-3"><a class="font-weight-bold mb-3 is-style-title-iphan" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></div>');
					endif;
					?>
				</header><!-- .entry-header -->
				<p class="margin-list-post">
					<?php
					if (is_singular()) {
						echo '<div class="col-md-8 alignwide">';
						the_content();
						echo '</div>';
					} else {
						echo excerpt(35);
					}
					?>
				</p><!-- .entry-content -->
				<?php if (!is_singular()) {
				?>
					<div class="info-footer-resume margin-list-post">
						<div class="date-excerpt-position">
							<span class="date-excerpt"><?php echo get_the_date("j") . " de " . get_the_date("F, Y") ?></span>
						</div>
						<div class="wp-block-button">
							<a href="<?php the_permalink(); ?>" class="wp-block-button__link"><?php _e('Ler Mais <i size="50px" class="tainacan-icon tainacan-icon-next"></i>', 'ler-mais'); ?></a>
						</div>
					</div>
				<?php } ?>

			</div>
			</article>
			<?php
			if (!is_singular()) {
				echo '</div>';
			}
			?>
			<hr id="hrResume" class="correcao-hr-categoria">
			<!-- #post-<?php the_ID(); ?> -->