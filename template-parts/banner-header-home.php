<?php
// Banner Header
function custom_banner_home()
{
    $template_directory = get_template_directory_uri();
    echo '<h1 class="site-title banner"><img src="' . $template_directory . '/assets/images/banner-home.png"/></h1>';
    echo '<div class="text-banner site-container">';
    echo '<span class="title-banner">inventário </br></span>';
    echo '<span class="title-banner">nacional</span>';
    echo '</div>';
}
