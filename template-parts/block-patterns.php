<?php

/**
 * Block Styles
 */
function iphan_block_pattern()
{
    register_block_pattern(
        'core/column',
        array(
            'title'       => __('Two buttons', 'my-plugin'),
            'description' => _x('Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'my-plugin'),
            'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__('Button One', 'my-plugin') . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__('Button Two', 'my-plugin') . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
        )
    );
}
