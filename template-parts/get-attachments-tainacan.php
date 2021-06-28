<?php
$attachments = tainacan_get_the_attachments();
foreach ($attachments as $attachment) {
    $media_items_thumbs[] =
        tainacan_get_the_media_component_slide(array(
            'media_content' => wp_get_attachment_image($attachment->ID, 'tainacan-medium', false),
            'media_content_full' => wp_attachment_is('image', $attachment->ID) ? wp_get_attachment_image($attachment->ID, 'full', false) : ('<div class="attachment-without-image tainacan-embed-container"><iframe id="tainacan-attachment-iframe" src="' . tainacan_get_attachment_html_url($attachment->ID) . '"></iframe></div>'),
            'media_title' => $attachment->post_title,
            'media_description' => $attachment->post_content,
            'media_caption' => $attachment->post_excerpt,
            'media_type' => $attachment->post_mime_type,
        ));
}
?>
<span><?php _e('Imagens', 'iphan_inrc') ?></span>
<div class="attachments">
    <?php
    for ($i = 0; $i < sizeof($attachments); $i++) {
        if ($attachments[$i]->post_mime_type == 'image/png') {
            echo $media_items_thumbs[$i];
        }
    }
    ?>
</div>

<span><?php _e('Documentos', 'iphan_inrc') ?></span>
<div class="attachments">
    <?php
    for ($i = 0; $i < sizeof($attachments); $i++) {
        if ($attachments[$i]->post_mime_type == 'text/plain') {
            echo $media_items_thumbs[$i];
        }
    }
    ?>
</div>