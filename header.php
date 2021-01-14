<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IPHAN_INRC
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'iphan_inrc'); ?></a>
		<!-- teste de scroll to top -->
		<a href="#" id="ScrolltoTop"><i class="tainacan-icon tainacan-icon-showmore"></i></a>


		<header id="masthead" class="site-header">
			<div class="site-container">
				<div class="site-branding">
					<?php
					if (has_custom_logo()) {
						the_custom_logo();
					} else {
						if (is_front_page() && is_home()) :
					?>
							<h1 class="site-title"> <?php $template_directory = get_template_directory_uri(); ?>
								<img src="<?php echo $template_directory; ?>/assets/images/iphan_logo.png" /></h1>
						<?php
						else :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"> <?php $template_directory = get_template_directory_uri(); ?>
									<img src="<?php echo $template_directory; ?>/assets/images/iphan_logo.png" /></a></h1>
					<?php
						endif;
					} ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_html_e('Primary Menu', 'iphan_inrc'); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.745 5.841" height="22.075" width="33.05">
							<path d="M.002 4.855l8.731.02-.002.966L0 5.82zm.006-2.433l8.731.02-.002.977L.006 3.4zM8.745.02l-.002.966L.01.966.013 0z" fill="#fff" /></svg>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->
		<?php custom_breadcrumbs(); ?>