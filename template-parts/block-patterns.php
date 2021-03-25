<?php

/**
 * Block Pattern
 */
function iphan_block_pattern()
{
    register_block_pattern_category(
        'iphan',
        array('label' => __('IPHAN', 'iphan-inrc'))
    );

    $template_images_directory = get_template_directory_uri() . '/assets/images/';

    register_block_pattern(
        'iphan/download',
        array(
            'title'       => __('IPHAN bloco de download', 'iphan-inrc'),
            'description' => _x('Bloco de download.', 'Descrição do padrão de bloco', 'iphan-inrc'),
            'categories' => array('core', 'iphan', 'buttons'),
            'content'     => '<div class="wp-block-file"><a href="http://localhost/wp-content/uploads/2020/12/imagem_2021-01-28_155953.png">
                    imagem de exemplo</a>
                    <a href="http://localhost/wp-content/uploads/2020/12/imagem_2021-01-28_155953.png" class="wp-block-file__button" download>
                    <i size="50px" class="tainacan-icon tainacan-icon-1-25em tainacan-icon-download">
                    </i></a></div>'
        )
    );

    register_block_pattern(
        'iphan/column-highlight',
        array(
            'title'       => __('IPHAN duas colunas de destaque', 'iphan-inrc'),
            'description' => _x('Blocos em colunas com borda e botões.', 'Descrição do padrão de bloco', 'iphan-inrc'),
            'categories' => array('columns', 'iphan', 'buttons'),
            'content'     => '
                <!-- wp:group {"align":"wide","className":"is-style-default"} -->
                <div class="wp-block-group alignwide is-style-default"><div class="wp-block-group__inner-container"><!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
                <h2 class="is-style-title-iphan-underscore">Título Secundário</h2>
                <!-- /wp:heading -->

                <!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column {"className":"is-style-column-iphan-secundary is-style-column-iphan-secondary"} -->
                <div class="wp-block-column is-style-column-iphan-secundary is-style-column-iphan-secondary"><!-- wp:heading {"level":4,"className":"is-style-default","textColor":"vermelho"} -->
                <h4 class="is-style-default has-vermelho-color has-text-color"><strong>Título do bloco 1</strong></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation. Ut wisi enim ad minim veniam, quis nostrud exerci tation wisi enim ad minim veniam, quis nostrud exerci</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"align":"right"} -->
                <div class="wp-block-buttons alignright"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link">LER MAIS &gt;</a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
                <!-- /wp:column -->

                <!-- wp:column {"className":"is-style-column-iphan-secundary is-style-column-iphan-secondary"} -->
                <div class="wp-block-column is-style-column-iphan-secundary is-style-column-iphan-secondary"><!-- wp:heading {"level":4,"className":"is-style-default","textColor":"vermelho"} -->
                <h4 class="is-style-default has-vermelho-color has-text-color"><strong>Título do bloco 2</strong></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation. Ut wisi enim ad minim veniam, quis nostrud exerci tation wisi enim ad minim veniam, quis nostrud exerci</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"align":"right"} -->
                <div class="wp-block-buttons alignright"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link">LER MAIS +</a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></div></div>
                <!-- /wp:group -->'
        )
    );

    register_block_pattern(
        'iphan/column-highlight-alternative',
        array(
            'title'       => __('IPHAN uma coluna de destaque', 'iphan-inrc'),
            'description' => _x('Blocos com uma coluna com borda.', 'Descrição do padrão de bloco', 'iphan-inrc'),
            'categories' => array('columns', 'iphan', 'buttons'),
            'content'     => '
                <!-- wp:group -->
                <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
                <h2 class="is-style-title-iphan-underscore">Título Secundário</h2>
                <!-- /wp:heading -->

                <!-- wp:columns {"verticalAlignment":"top"} -->
                <div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top"} -->
                <div class="wp-block-column is-vertically-aligned-top"><!-- wp:paragraph -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula, lorem id mattis cursus, est ipsum malesuada metus, id auctor libero justo ac augue. Aliquam a interdum turpis. </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>Nullam a justo tortor. Donec sit amet sagittis libero, eu suscipit dui. Suspendisse tristique mi eu diam viverra, non pellentesque sem scelerisque. Ut non purus mollis, hendrerit ligula a, fermentum lorem. Mauris feugiat elit eget iaculis aliquet. Nunc efficitur risus ut purus bibendum, a posuere lorem vulputate. Integer tempus consequat semper. Quisque eget vulputate lectus, facilisis pulvinar enim. Fusce lacinia justo at interdum interdum.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link">Link para algum lugar</a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"top","className":"is-style-column-iphan-secondary"} -->
                <div class="wp-block-column is-vertically-aligned-top is-style-column-iphan-secondary"><!-- wp:heading {"level":4,"textColor":"vermelho","className":"is-style-default"} -->
                <h4 class="is-style-default has-vermelho-color has-text-color">Título de Sessão 1</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Por conseguinte, a estrutura atual da organização representa uma abertura para a melhoria dos índices pretendidos.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>E assim encerramos esta sessão.</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"textColor":"vermelho","className":"is-style-default"} -->
                <h4 class="is-style-default has-vermelho-color has-text-color">Título de Sessão 2</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>A prática cotidiana prova que a estrutura atual da organização pode nos levar a considerar a reestruturação das posturas dos órgãos dirigentes com relação às suas atribuições.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>E assim encerramos esta sessão.</p>
                <!-- /wp:paragraph --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></div></div>
                <!-- /wp:group -->
                '
        )
    );

    register_block_pattern(
        'iphan/column-highlight-with-image',
        array(
            'title'       => __('IPHAN colunas de destaque com imagem', 'iphan-inrc'),
            'description' => _x('Blocos em colunas com borda, botões e uma imagem ao fundo', 'Descrição do padrão de bloco', 'iphan-inrc'),
            'categories' => array('columns', 'iphan', 'buttons', 'gallery'),
            'content'     => '
                <!-- wp:cover {"url":"' . $template_images_directory . 'iphan_bg_example.png","dimRatio":10,"align":"full"} -->
                <div class="wp-block-cover alignfull has-background-dim-10 has-background-dim"><img class="wp-block-cover__image-background" alt="" src="' . $template_images_directory . 'iphan_bg_example.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column {"className":"is-style-column-iphan-secundary is-style-column-iphan-secondary"} -->
                <div class="wp-block-column is-style-column-iphan-secundary is-style-column-iphan-secondary"><!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
                <h2 class="is-style-title-iphan-underscore">Título do bloco 1</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"cinza6"} -->
                <p class="has-cinza-6-color has-text-color">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"contentJustification":"right"} -->
                <div class="wp-block-buttons is-content-justification-right"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link">LINK DO BLOCO 1</a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
                <!-- /wp:column -->

                <!-- wp:column {"className":"is-style-column-iphan-secundary is-style-column-iphan-secondary"} -->
                <div class="wp-block-column is-style-column-iphan-secundary is-style-column-iphan-secondary"><!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
                <h2 class="is-style-title-iphan-underscore">Título do bloco 2</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"cinza6"} -->
                <p class="has-cinza-6-color has-text-color">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"contentJustification":"right"} -->
                <div class="wp-block-buttons is-content-justification-right"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link">LINK DO BLOCO 2</a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></div></div>
                <!-- /wp:cover -->
                '
        )
    );

    register_block_pattern(
        'iphan/group-highlight',
        array(
            'title'       => __('IPHAN grupo de destaque', 'iphan-inrc'),
            'description' => _x('Grupo com borda vermelha', 'Descrição do padrão de bloco', 'iphan-inrc'),
            'categories' => array('columns', 'iphan'),
            'content'     => '
            <!-- wp:group {"className":"is-style-column-iphan"} -->
            <div class="wp-block-group is-style-column-iphan"><div class="wp-block-group__inner-container"><!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
            <h2 class="is-style-title-iphan-underscore">Título do Bloco</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>Paragrafo do Grupo</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p>Paragrafo 2</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p>Paragrafo 3</p>
            <!-- /wp:paragraph --></div></div>
            <!-- /wp:group -->'
        )
    );

    register_block_pattern(
        'iphan/wide-section',
        array(
            'title' => __('IPHAN sessão ampla'),
            'description' => _x('Sessão com duas colunas e alinhamento amplo.', 'Descrição do padrão de blocos', 'iphan-inrc'),
            'categories' => array('columns', 'iphan'),
            'content' => '
                <!-- wp:cover {"overlayColor":"branco","align":"full"} -->
                <div class="wp-block-cover alignfull has-branco-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide"} -->
                <div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":1,"className":"is-style-title-iphan-underscore"} -->
                <h1 class="is-style-title-iphan-underscore">Título Primário</h1>
                <!-- /wp:heading --></div></div>
                <!-- /wp:group -->

                <!-- wp:group {"align":"wide","className":"is-style-two-columns"} -->
                <div class="wp-block-group alignwide is-style-two-columns"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"textColor":"preto"} -->
                <p class="has-preto-color has-text-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula, lorem id mattis cursus, est ipsum malesuada metus, id auctor libero justo ac augue. Aliquam a interdum turpis. Aenean posuere aliquet finibus. Vivamus eros metus, scelerisque nec diam et, egestas accumsan libero. Curabitur pellentesque, orci at faucibus condimentum, nisi augue ullamcorper tortor, at sodales metus sapien sed mi. Nulla eleifend nibh eget est auctor, non feugiat nisl luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis tempus non sapien a malesuada. Fusce ipsum sem, blandit sed ante vel, aliquet maximus est. </p>
                <!-- /wp:paragraph -->

                <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large"><img src="' . $template_images_directory . 'iphan_column_example_1.png" alt="Detalhe de uma pintura delixada em uma pedra." /><figcaption>Legenda da Fotografia</figcaption></figure>
                <!-- /wp:image -->

                <!-- wp:paragraph {"textColor":"preto"} -->
                <p class="has-preto-color has-text-color">Nullam a justo tortor. Donec sit amet sagittis libero, eu suscipit dui. Suspendisse tristique mi eu diam viverra, non pellentesque sem scelerisque. Ut non purus mollis, hendrerit ligula a, fermentum lorem. Mauris feugiat elit eget iaculis aliquet. Nunc efficitur risus ut purus bibendum, a posuere lorem vulputate. Integer tempus consequat semper. Quisque eget vulputate lectus, facilisis pulvinar enim. Fusce lacinia justo at interdum interdum. </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"preto"} -->
                <p class="has-preto-color has-text-color">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus id accumsan eros, sed tincidunt mauris. Nunc sit amet interdum eros. Ut sed magna efficitur, eleifend sem feugiat, suscipit erat. Curabitur non fermentum lorem. Vestibulum vel lectus vel metus consequat efficitur ut a massa. Donec placerat maximus tincidunt. Aliquam sapien lacus, pretium a eros sed, scelerisque rhoncus sem. Proin lacinia at augue sit amet varius. Proin id mauris et quam molestie venenatis quis sit amet sapien. Ut dictum erat in quam feugiat porta.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"preto"} -->
                <p class="has-preto-color has-text-color">Mauris rutrum nibh nisi, a scelerisque nibh porttitor sed. Integer non felis accumsan dolor sagittis fringilla vitae ut tortor. Sed dictum sit amet erat vel condimentum. Integer sit amet nibh a arcu mattis tincidunt sed in dui. Etiam auctor felis leo, at suscipit quam placerat commodo. Aliquam erat volutpat. Aliquam at pellentesque tellus.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"preto"} -->
                <p class="has-preto-color has-text-color">Aliquam ac rhoncus turpis. Ut accumsan vulputate facilisis. Curabitur pharetra quam at tortor varius, sed elementum lectus fermentum. Donec maximus neque sed felis viverra, ut mollis lorem tristique. Vivamus ullamcorper tincidunt est, a mollis turpis malesuada quis. Nulla et odio in neque iaculis dignissim et in ante. Phasellus nunc sapien, elementum ac nisl sollicitudin, egestas hendrerit sapien. Aliquam lectus sapien, vulputate quis dolor ac, cursus efficitur dolor.</p>
                <!-- /wp:paragraph --></div></div>
                <!-- /wp:group -->

                <!-- wp:paragraph {"align":"center","placeholder":"Escreva o título...","fontSize":"large"} -->
                <p class="has-text-align-center has-large-font-size"></p>
                <!-- /wp:paragraph --></div></div>
                <!-- /wp:cover -->
            '
        )
    );

    register_block_pattern(
        'iphan/full-section',
        array(
            'title' => __('IPHAN sessão completa'),
            'description' => _x('Sessão com duas colunas e alinhamento completo.', 'Descrição do padrão de blocos', 'iphan-inrc'),
            'categories' => array('columns', 'iphan'),
            'content' => '
                <!-- wp:heading {"align":"wide","className":"is-style-title-iphan-underscore"} -->
                <h2 class="alignwide is-style-title-iphan-underscore">Título secundário</h2>
                <!-- /wp:heading -->

                <!-- wp:group {"align":"wide","className":"is-style-two-columns"} -->
                <div class="wp-block-group alignwide is-style-two-columns"><div class="wp-block-group__inner-container"><!-- wp:paragraph -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula, lorem id mattis cursus, est ipsum malesuada metus, id auctor libero justo ac augue. Aliquam a interdum turpis. Aenean posuere aliquet finibus. Vivamus eros metus, scelerisque nec diam et, egestas accumsan libero. Curabitur pellentesque, orci at faucibus condimentum, nisi augue ullamcorper tortor, at sodales metus sapien sed mi. Nulla eleifend nibh eget est auctor, non feugiat nisl luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis tempus non sapien a malesuada. Fusce ipsum sem, blandit sed ante vel, aliquet maximus est. Etiam convallis orci vel lacus condimentum dignissim. Aliquam condimentum neque ac orci vehicula, ut mollis nulla placerat. Sed consectetur ornare egestas. Fusce lobortis dictum placerat. Proin et varius odio. Nam elementum et lorem sit amet auctor. Vestibulum laoreet odio in nisl vestibulum cursus.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>Nullam a justo tortor. Donec sit amet sagittis libero, eu suscipit dui. Suspendisse tristique mi eu diam viverra, non pellentesque sem scelerisque. Ut non purus mollis, hendrerit ligula a, fermentum lorem. Mauris feugiat elit eget iaculis aliquet. Nunc efficitur risus ut purus bibendum, a posuere lorem vulputate. Integer tempus consequat semper. Quisque eget vulputate lectus, facilisis pulvinar enim. Fusce lacinia justo at interdum interdum.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus id accumsan eros, sed tincidunt mauris. Nunc sit amet interdum eros. Ut sed magna efficitur, eleifend sem feugiat, suscipit erat. Curabitur non fermentum lorem. Vestibulum vel lectus vel metus consequat efficitur ut a massa. Donec placerat maximus tincidunt. Aliquam sapien lacus, pretium a eros sed, scelerisque rhoncus sem. Proin lacinia at augue sit amet varius. Proin id mauris et quam molestie venenatis quis sit amet sapien. Ut dictum erat in quam feugiat porta.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>Mauris rutrum nibh nisi, a scelerisque nibh porttitor sed. Integer non felis accumsan dolor sagittis fringilla vitae ut tortor. Sed dictum sit amet erat vel condimentum. Integer sit amet nibh a arcu mattis tincidunt sed in dui. Etiam auctor felis leo, at suscipit quam placerat commodo. Aliquam erat volutpat. Aliquam at pellentesque tellus.</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"className":"is-style-title-iphan-underscore"} -->
                <h4 class="is-style-title-iphan-underscore">TÍTULO TERCEÁRIO</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Aliquam ac rhoncus turpis. Ut accumsan vulputate facilisis. Curabitur pharetra quam at tortor varius, sed elementum lectus fermentum. Donec maximus neque sed felis viverra, ut mollis lorem tristique. Vivamus ullamcorper tincidunt est, a mollis turpis malesuada quis. Nulla et odio in neque iaculis dignissim et in ante. Phasellus nunc sapien, elementum ac nisl sollicitudin, egestas hendrerit sapien. Aliquam lectus sapien, vulputate quis dolor ac, cursus efficitur dolor.</p>
                <!-- /wp:paragraph -->

                <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large"><img src="' . $template_images_directory . 'iphan_column_example_2.png" alt="Homem idoso trabalhando com pintura" /><figcaption>Legenda fotografia</figcaption></figure>
                <!-- /wp:image --></div></div>
                <!-- /wp:group -->
            '
        )
    );
}
add_action('init', 'iphan_block_pattern');
