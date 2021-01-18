<?php
// Banner Header BW
function custom_banner_bw()
{
    $template_directory = get_template_directory_uri();
    echo '<h1 class="site-title banner"><img src="' . $template_directory . '/assets/images/banner-bw.jpg"/></h1>';
    echo '<div class="text-banner text-banner-bw site-container">';
    echo '<span class="title-banner">inventário </br></span>';
    echo '<span class="title-banner">nacional</span>';
    echo '</div>';
}
