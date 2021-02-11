<?php 
	get_header(); 
	get_template_part('template-parts/site-banner');
	custom_breadcrumbs(); 
?>

<main id="primary" class="site-main site-container">
	<div class="entry-content">

	<?php if ( have_posts() ) : ?>

		<?php do_action( 'tainacan-interface-single-item-top' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
				
				<?php
					get_template_part( 'template-parts/single-items-header' );
					do_action( 'tainacan-interface-single-item-after-title' );

					echo '<div class="single-item-data-section">';

					switch (get_theme_mod( 'tainacan_single_item_layout_sections_order', 'document-attachments-metadata')) {
						case 'document-attachments-metadata':
							get_template_part( 'template-parts/single-items-document' );
							do_action( 'tainacan-interface-single-item-after-document' );  
			
							get_template_part( 'template-parts/single-items-attachments' );
							do_action( 'tainacan-interface-single-item-after-attachments' );
							
							get_template_part( 'template-parts/single-items-metadata' );
							do_action( 'tainacan-interface-single-item-after-metadata' );
						break;

						case 'metadata-document-attachments':
							get_template_part( 'template-parts/single-items-metadata' );
							do_action( 'tainacan-interface-single-item-after-metadata' );

							get_template_part( 'template-parts/single-items-document' );
							do_action( 'tainacan-interface-single-item-after-document' );  
			
							get_template_part( 'template-parts/single-items-attachments' );
							do_action( 'tainacan-interface-single-item-after-attachments' );
						break;

						case 'document-metadata-attachments':
							get_template_part( 'template-parts/single-items-document' );
							do_action( 'tainacan-interface-single-item-after-document' );

							get_template_part( 'template-parts/single-items-metadata' );
							do_action( 'tainacan-interface-single-item-after-metadata' );  
			
							get_template_part( 'template-parts/single-items-attachments' );
							do_action( 'tainacan-interface-single-item-after-attachments' );
						break;
							
					}
					echo '</div>';
				?>

				<?php get_template_part( 'template-parts/single-items-navigation' ); ?>

				<?php get_template_part( 'template-parts/single-items-comments' ); ?>

			</article>
		<?php endwhile; ?>

		<?php do_action( 'tainacan-interface-single-item-bottom' ); ?>

	<?php else : ?>
		<?php _e( 'Nada encontrado!', 'iphan_inrc' ); ?>
	<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>