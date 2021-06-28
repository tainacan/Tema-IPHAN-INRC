<?php

/**
 * IPHAN INRC Theme Customizer
 *
 * @package IPHAN_INRC
 */

/**
 * Add postMessage support for site title for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function iphan_inrc_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'iphan_inrc_customize_partial_blogname',
            )
        );
    }

    /* REDES SOCIAIS E RODAPÉ */
    $wp_customize->add_section('social_section', array(
        'title'       => __('Redes Sociais', 'Tema_IPHAN_INRC', 'iphan-inrc'),
    ));

    /* Link Twitter */
    $wp_customize->add_setting('setting_link_1', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_1', array(
        'label' => 'Link do Twitter', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_1',
        'priority' => 1,
    ));

    /* Link Facebook */
    $wp_customize->add_setting('setting_link_2', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_2', array(
        'label' => 'Link do Facebook', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_2',
        'priority' => 2,
    ));

    /* Link Instagram */
    $wp_customize->add_setting('setting_link_3', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_3', array(
        'label' => 'Link do Instagram', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_3',
        'priority' => 3,
    ));

    /* Link Extra 1 */
    $wp_customize->add_setting('setting_link_4', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_4', array(
        'label' => 'Link da nova rede social 1', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_4',
        'priority' => 5,
    ));
    $wp_customize->add_setting('setting_alt_4', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('alt_4', array(
        'label' => 'Nome da nova rede social 1', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_alt_4',
        'priority' => 4,
    ));
    $wp_customize->add_setting('iphan_logo_4', array());
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iphan_logo_control_4', array(
        'label' => 'Upload de imagem da nova rede social 1', 'iphan-inrc',
        'priority' => 1,
        'section' => 'social_section',
        'settings' => 'iphan_logo_4',
        'priority' => 6,
        'button_labels' => array( // All These labels are optional
            'select' => 'Selecione a imagem',
            'remove' => 'Remover Imagem',
            'change' => 'Alterar Imagem',
        )
    )));

    /* Link Extra 2 */
    $wp_customize->add_setting('setting_link_5', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_5', array(
        'label' => 'Link da nova rede social 2', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_5',
        'priority' => 8,
    ));
    $wp_customize->add_setting('setting_alt_5', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('alt_5', array(
        'label' => 'Nome da nova rede social 2', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_alt_5',
        'priority' => 7,
    ));
    $wp_customize->add_setting('iphan_logo_5', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iphan_logo_control_5', array(
        'label' => 'Upload de imagem da nova rede social 2', 'iphan-inrc',
        'priority' => 9,
        'section' => 'social_section',
        'settings' => 'iphan_logo_5',
        'button_labels' => array( // All These labels are optional
            'select' => 'Selecione a imagem',
            'remove' => 'Remover Imagem',
            'change' => 'Alterar Imagem',
        )
    )));

    /* Link Extra 3 */
    $wp_customize->add_setting('setting_link_6', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_6', array(
        'label' => 'Link da nova rede social 3', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_6',
        'priority' => 11,
    ));
    $wp_customize->add_setting('setting_alt_6', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('alt_6', array(
        'label' => 'Nome da nova rede social 3', 'iphan-inrc',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_alt_6',
        'priority' => 10,
    ));
    $wp_customize->add_setting('iphan_logo_6', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iphan_logo_control_6', array(
        'label' => 'Upload de imagem da nova rede social 3', 'iphan-inrc',
        'priority' => 12,
        'section' => 'social_section',
        'settings' => 'iphan_logo_6',
        'button_labels' => array( // All These labels are optional
            'select' => 'Selecione a imagem',
            'remove' => 'Remover Imagem',
            'change' => 'Alterar Imagem',
        )
    )));

    /* LINK DO BANNER */
    $wp_customize->add_section('link_banner', array(
        'title'       => __('Banner', 'Tema_IPHAN_INRC', 'iphan-inrc'),
    ));

    /* Link Banner 1 */
    $wp_customize->add_setting('setting_link_banner_1', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_1', array(
        'label' => 'Link do lado Esquerdo', 'iphan-inrc',
        'type' => 'text',
        'section' => 'link_banner',
        'settings' => 'setting_link_banner_1',
        'priority' => 1,
    ));
    $wp_customize->add_setting('label_banner_1', array(
        'default' => 'explore o repositório', 'iphan-inrc',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('text_banner_1', array(
        'label' => 'Label button 1', 'iphan-inrc',
        'type' => 'text',
        'section' => 'link_banner',
        'settings' => 'label_banner_1',
        'priority' => 2,
    ));

    /* Link Banner 2 */
    $wp_customize->add_setting('setting_link_banner_2', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('link_2', array(
        'label' => 'Link do lado Direito', 'iphan-inrc',
        'type' => 'text',
        'section' => 'link_banner',
        'settings' => 'setting_link_banner_2',
        'priority' => 3,
    ));
    $wp_customize->add_setting('label_banner_2', array(
        'default' => 'acesse o repositório completo', 'iphan-inrc',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('text_banner_2', array(
        'label' => 'Label button 2', 'iphan-inrc',
        'type' => 'text',
        'section' => 'link_banner',
        'settings' => 'label_banner_2',
        'priority' => 4,
    ));

    /* Opções da Lista do Glossário */
    $wp_customize->add_section('iphan_inrc_glossary_archive', array(
        'title'         => __('Página do Glossário', 'iphan-inrc'),
        'description'   => __('Opções relacionadas à página do Glossário', 'iphan-inrc')
    ));

    /* Descrição do Glossário */
    $wp_customize->add_setting('iphan_inrc_glossary_archive_title', array(
        'default'           => 'Glossário INRC',
        'type'              => 'theme_mod',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('iphan_inrc_glossary_archive_title', array(
        'label'     => __('Título da página', 'iphan-inrc'),
        'type'      => 'text',
        'section'   => 'iphan_inrc_glossary_archive',
        'settings'  => 'iphan_inrc_glossary_archive_title',
        'priority'  => 1,
    ));
    $wp_customize->selective_refresh->add_partial('iphan_inrc_glossary_archive_title', array(
        'selector'          => '.archive-title-glossary',
        'render_callback'   => '__return_false',
        'fallback_refresh'  => true
    ));

    /* Descrição do Glossário */
    $wp_customize->add_setting('iphan_inrc_glossary_archive_description', array(
        'default'           => 'Conheça aqui os termos do Glossário desenvolvido pelo IPHAN INRC.',
        'type'              => 'theme_mod',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('iphan_inrc_glossary_archive_description', array(
        'label'     => __('Descrição abaixo do título da página', 'iphan-inrc'),
        'type'      => 'textarea',
        'section'   => 'iphan_inrc_glossary_archive',
        'settings'  => 'iphan_inrc_glossary_archive_description',
        'priority'  => 1,
    ));
    $wp_customize->selective_refresh->add_partial('iphan_inrc_glossary_archive_description', array(
        'selector'          => '.archive-description-glossary',
        'render_callback'   => '__return_false',
        'fallback_refresh'  => true
    ));

    /* Número de colunas na listagem do Glossário */
    $wp_customize->add_setting('iphan_inrc_glossary_archive_columns_count', array(
        'default'           => 2,
        'type'              => 'theme_mod',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('iphan_inrc_glossary_archive_columns_count', array(
        'label'     => __('Quantidade de máxima de colunas', 'iphan-inrc'),
        'description'     => __('O máximo de colunas da lista de termos para telas grandes. Em telas menores, o valor pode pode ser menor que o mostrado.', 'iphan-inrc'),
        'type'      => 'number',
        'section'   => 'iphan_inrc_glossary_archive',
        'settings'  => 'iphan_inrc_glossary_archive_columns_count',
        'priority'  => 1,
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 4,
            'step'  => 1
        ),
    ));
    $wp_customize->selective_refresh->add_partial('iphan_inrc_glossary_archive_columns_count', array(
        'selector'          => '.glossary-list',
        'render_callback'   => '__return_false',
        'fallback_refresh'  => true
    ));

    /* Largura ampla da lista de termos do glossário */
    $wp_customize->add_setting('iphan_inrc_glossary_archive_alignwide', array(
        'default'           => false,
        'type'              => 'theme_mod',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_checkbox'
    ));
    $wp_customize->add_control('iphan_inrc_glossary_archive_alignwide', array(
        'label'     => __('Usar largura ampla para a lista', 'iphan-inrc'),
        'type'      => 'checkbox',
        'section'   => 'iphan_inrc_glossary_archive',
        'settings'  => 'iphan_inrc_glossary_archive_alignwide',
        'priority'  => 1,
    ));

    /* TEMPLATE DO INVENTÁRIO */
    $wp_customize->add_section('template_inventario_iphan', array(
        'title'       => __('Template dos Inventários', 'Tema_IPHAN_INRC', 'iphan-inrc'),
    ));


    /* Escolher qual template usar para o Tema */

    $wp_customize->add_setting('template_inventario', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('escolhas_template_inventario', array(
        'label' => 'Template do Inventário', 'iphan-inrc',
        'type' => 'radio',
        'section' => 'template_inventario_iphan',
        'settings' => 'template_inventario',
        'priority' => 3,
        'choices' => array(
            'default' => __('Padrão'),
            'custom' => __('Personalizado'),
        )
    ));
    $wp_customize->add_setting('tema_escolher', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    /*     function myfunction($repositories)
    {
        var_dump($repositories->ID);
    }
    $repositories = \Tainacan\Repositories\Items::get_instance();
    var_dump($repositories); */
    $repository = \Tainacan\Repositories\Collections::get_instance();
    //separar
    var_dump($repository->fetch()->posts);
    $wp_customize->add_control('escolhas_inventario', array(
        'label' => 'Inventário', 'iphan-inrc',
        'type' => 'select',
        'section' => 'template_inventario_iphan',
        'settings' => 'tema_escolher',
        'priority' => 2,
        /*        'choices' => array_map('myfunction', $repositories) */
    ));
}
add_action('customize_register', 'iphan_inrc_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function iphan_inrc_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function iphan_inrc_customize_preview_js()
{
    wp_enqueue_script('iphan_inrc-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), IPHAN_INRC_VERSION, true);
}
add_action('customize_preview_init', 'iphan_inrc_customize_preview_js');

/**
 * Sanitize Checkbox
 * 
 * Accepts only "true" or "false" as possible values.
 *
 * @param $input
 *
 * @access public
 * @since  1.0
 * @return bool
 */
function sanitize_checkbox($input)
{
    return ($input === true) ? true : false;
}
