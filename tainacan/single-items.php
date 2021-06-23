<?php if (true) {
	get_template_part('single-template-inventarios');
} else {
	get_header();
	get_template_part('template-parts/site-banner');
	custom_breadcrumbs();
?>
	<main id="primary" class="site-main">
		<?php if (have_posts()) : ?>
			<?php
			do_action('iphan-inrc-single-item-top');
			get_template_part('template-parts/single-items-header');
			do_action('iphan-inrc-single-item-after-title');
			?>

			<?php while (have_posts()) : the_post(); ?>
				<div class="entry-content">
					<article role="article" id="post_<?php the_ID() ?>" class="<?php echo esc_attr(implode(' ', get_post_class(array('tainacan-single-post', 'alignwide')))) ?>">

						<?php
						get_template_part('template-parts/single-items-attachments');
						do_action('iphan-inrc-single-item-after-attachments');

						echo '<hr>';

						get_template_part('template-parts/single-items-metadata');
						do_action('iphan-inrc-single-item-after-metadata');
						?>

					</article>
				</div>

				<?php
				get_template_part('template-parts/single-items-navigation');
				get_template_part('template-parts/single-items-comments');
				?>
			<?php endwhile; ?>

			<?php do_action('iphan-inrc-single-item-bottom'); ?>

		<?php else : ?>
			<?php _e('Nada encontrado!', 'iphan_inrc'); ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>
<?php } ?>