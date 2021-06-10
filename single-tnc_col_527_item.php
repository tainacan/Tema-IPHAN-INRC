<?php
/* Cabeçalho da página */
get_header();
get_template_part('template-parts/site-banner');
custom_breadcrumbs();

/* Fim do cabeçalho */

echo tainacan_get_item();
echo tainacan_get_the_metadata();

echo 'the content';
