<?php

/**
 * Registra o post type inventários.
 */
function iphan_inrc_inventario_post_type_init() {
    $labels = array(
        'name'                  => _x( 'Inventários', 'Post type general name', 'iphan-inrc' ),
        'singular_name'         => _x( 'Inventário', 'Post type singular name', 'iphan-inrc' ),
        'menu_name'             => _x( 'Inventários', 'Admin Menu text', 'iphan-inrc' ),
        'name_admin_bar'        => _x( 'Inventário', 'Add New on Toolbar', 'iphan-inrc' ),
        'add_new'               => __( 'Adicionar Novo', 'iphan-inrc' ),
        'add_new_item'          => __( 'Adicionar Novo Inventário', 'iphan-inrc' ),
        'new_item'              => __( 'Novo Inventário', 'iphan-inrc' ),
        'edit_item'             => __( 'Editar Inventário', 'iphan-inrc' ),
        'view_item'             => __( 'Ver Inventário', 'iphan-inrc' ),
        'all_items'             => __( 'Todos os Inventários', 'iphan-inrc' ),
        'search_items'          => __( 'Pesquisar Inventários', 'iphan-inrc' ),
        'parent_item_colon'     => __( 'Inventários pais:', 'iphan-inrc' ),
        'not_found'             => __( 'Nenhum Inventário encontrado.', 'iphan-inrc' ),
        'not_found_in_trash'    => __( 'Nenhum Inventário encontrado na lixeira.', 'iphan-inrc' ),
        'featured_image'        => _x( 'Imagem de capa do Inventário', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'iphan-inrc' ),
        'set_featured_image'    => _x( 'Configurar imagem de capa', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'iphan-inrc' ),
        'remove_featured_image' => _x( 'Remover imagem de capa', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'iphan-inrc' ),
        'use_featured_image'    => _x( 'Usar como imagem de capa', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'iphan-inrc' ),
        'archives'              => _x( 'Lista de Inventários', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'iphan-inrc' ),
        'insert_into_item'      => _x( 'Inserir no Inventário', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'iphan-inrc' ),
        'uploaded_to_this_item' => _x( 'Enviado para este Inventário', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'iphan-inrc' ),
        'filter_items_list'     => _x( 'Filtrar lista de Inventários', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'iphan-inrc' ),
        'items_list_navigation' => _x( 'Navegação da lista de inventários', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'iphan-inrc' ),
        'items_list'            => _x( 'Lista de Inventários', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'iphan-inrc' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'inventarios' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'show_in_rest'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'inventarios', $args );
}
 
add_action( 'init', 'iphan_inrc_inventario_post_type_init' );