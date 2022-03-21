<?php

/**
 * The template for displaying Tainacan collections archive
 *
 * @package IPHAN_INRC
 */

get_header();
get_template_part('template-parts/site-banner');
custom_breadcrumbs();
?>

<main id="primary" class="site-main site-container">
	
    <header class="page-header">
        <?php
        the_archive_title('<h1 class="is-style-title-iphan-underscore">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header><!-- .page-header -->

    <div class="entry-content">
        <div class="alignwide form-inline tainacan-collection-list--simple-search justify-content-end">
            
            <div class="dropdown dropdown-sorting">
                <button class="btn btn-link dropdown-toggle text-black" type="button" id="dropdownMenuSorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php _e( 'Ordenar', 'iphan_inrc' ); ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSorting">
                    <a class="dropdown-item <?php tainacan_active( get_query_var( 'orderby' ), 'date' ); ?>" href="<?php echo add_query_arg( 'orderby', 'date' ); ?>"><?php _e( 'Data de criação', 'iphan_inrc' ); ?></a>
                    <a class="dropdown-item <?php tainacan_active( get_query_var( 'orderby' ), 'title' ); ?>" href="<?php echo add_query_arg( 'orderby', 'title' ); ?>"><?php _e( 'Nome', 'iphan_inrc' ); ?></a>
                </div>
            </div>
                
            <a class="btn btn-link <?php tainacan_active( get_query_var( 'order' ), 'DESC' ); ?>" style="width: 2rem;" href="<?php echo add_query_arg( 'order', 'ASC' ); ?>">
                <i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-sortascending"></i>
            </a>
            <a class="btn btn-link <?php tainacan_active( get_query_var( 'order' ), 'ASC' ); ?>" style="width: 2rem;" href="<?php echo add_query_arg( 'order', 'DESC' ); ?>">
                <i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-sortdescending"></i>
            </a>
            
            <div class="dropdown margin-one-column-left dropdown-viewMode">
                <button class="btn btn-link dropdown-toggle text-black" type="button" id="dropdownMenuViewMode" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-viewtable text-oslo-gray"></i>
                    <span class="d-none d-md-inline"><?php _e( 'Visualização', 'iphan_inrc' ); ?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuViewMode">
                    <a class="dropdown-item <?php tainacan_active( get_query_var( 'tainacan_collections_viewmode' ), 'cards' ); ?>" href="<?php echo add_query_arg( 'tainacan_collections_viewmode', 'cards' ); ?>"><i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-viewcards text-oslo-gray"></i>&nbsp;<?php _e( 'Cartões', 'iphan_inrc' ); ?></a>
                    <a class="dropdown-item <?php tainacan_active( get_query_var( 'tainacan_collections_viewmode' ), 'table' ); ?>" href="<?php echo add_query_arg( 'tainacan_collections_viewmode', 'table' ); ?>"><i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-viewtable text-oslo-gray"></i>&nbsp;<?php _e( 'Tabela', 'iphan_inrc' ); ?></a>
                </div>
            </div>
            
            <form role="search" method="get" id="tainacan-collection-search">
                <input type="hidden" name="orderby" value="<?php echo get_query_var( 'orderby' ); ?>" />
                <input type="hidden" name="order" value="<?php echo get_query_var( 'order' ); ?>" />
                <input type="hidden" name="tainacan_collections_viewmode" value="<?php echo get_query_var( 'tainacan_collections_viewmode' ); ?>" />
                <div class="input-group search-form">
                    <input class="has-icon-right search-bar col-md-12 my-0" type="search" name="s" value="<?php echo get_query_var( 's' ); ?>" placeholder="<?php esc_attr_e( 'Busque coleções', 'iphan_inrc' ); ?>" />
                    <i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-search"></i>
                </div>
            </form>
        </div>
        <?php get_template_part( 'template-parts/loop-tainacan-collection', get_query_var( 'tainacan_collections_viewmode' ) ); ?>
    </div>
</main>
<?php get_footer(); ?>
