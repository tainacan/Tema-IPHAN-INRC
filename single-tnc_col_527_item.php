<div class="inventario-header">
    <?php
    /* Cabeçalho da página */
    get_header();
    get_template_part('template-parts/site-banner');
    custom_breadcrumbs();
    /* Fim do cabeçalho */
    ?>
</div>

<div class="col-md-12 inventario">
    <div class="alinhamento-template-inventarios">
        <div class="barra-lateral">
            <?php echo tainacan_get_the_metadata(); ?>
        </div>
        <div class="post-inventario">
            <?php echo tainacan_get_item(); ?>
        </div>
    </div>
</div>