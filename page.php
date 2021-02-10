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
?>

	<div class="container-banner site-title" style="background-image: url(' <?php header_image() ?> )">
		<div class="container-banner__overlay"></div>
		<div class="text-banner site-container">
			<span class="title-banner"><span class="title-banner__text">inventário</span></span>
			<br>
			<span class="title-banner"><span class="title-banner__text">nacional</span></span>
		</div>
	</div>
	<?php custom_breadcrumbs(); ?>

	<main id="primary" class="site-main ">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
?>