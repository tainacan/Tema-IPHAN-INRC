<?php
// Banner Header
function custom_banner_home()
{
    $template_directory = get_template_directory_uri();
    /*     echo '<h1 class="site-title banner-home"><img src="' . $template_directory . '/assets/images/banner-home.png"/></h1>'; */
    echo '<div class="container-banner"><h1 class="site-title banner-home"></h1></div>';
    echo '<div class="text-banner site-container">';
    echo '<span class="title-banner">inventário </br></span>';
    echo '<span class="title-banner">nacional</span>';
    echo '</div>';
}
