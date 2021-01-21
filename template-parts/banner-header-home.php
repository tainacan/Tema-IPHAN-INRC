<?php
// Banner Header
function custom_banner_home()
{
    $template_directory = get_template_directory_uri();
    echo '<div class="container-banner site-title banner-home" style="background-image: url(' . $template_directory . '/assets/images/banner-home.png">';
    echo '<div class="text-banner text-banner-bw site-container">';
    echo '<span class="title-banner">inventário </br></span>';
    echo '<span class="title-banner">nacional</span>';
    echo '</div></div>';
}
?>