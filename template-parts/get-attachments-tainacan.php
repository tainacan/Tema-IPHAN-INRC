<?php
$attachments = tainacan_get_the_attachments();

$media_items_thumbs_image = [];

$media_items_thumbs_audio = [];

$media_items_thumbs_video = [];

$media_items_thumbs_other = [];

foreach ($attachments as $attachment) {
	$mime_type = $attachment->post_mime_type;
	$media_item = tainacan_get_the_media_component_slide(array(
		'media_content' => wp_get_attachment_image($attachment->ID, 'tainacan-medium', false),
		'media_content_full' => wp_attachment_is('image', $attachment->ID) ? wp_get_attachment_image($attachment->ID, 'full', false) : ('<div class="attachment-without-image tainacan-embed-container"><iframe id="tainacan-attachment-iframe" src="' . tainacan_get_attachment_html_url($attachment->ID) . '"></iframe></div>'),
		'media_title' => $attachment->post_title,
		'media_description' => $attachment->post_content,
		'media_caption' => $attachment->post_excerpt,
		'media_type' => $attachment->post_mime_type,
	));

	switch ($mime_type) {
		case 'image':
		case 'image/png':
		case 'image/jpeg':
		case 'image/gif':
		case 'image/bmp':
		case 'image/webp':
		case 'image/svg+xml':
			$media_items_thumbs_image[] = $media_item;
			break;
		case 'audio':
		case 'audio/midi':
		case 'audio/mpeg':
		case 'audio/mp3':
		case 'audio/webm':
		case 'audio/ogg':
		case 'audio/wav':
			$media_items_thumbs_audio[] = $media_item;
			break;
		case 'video':
		case 'video/webm':
		case 'video/ogg':
		case 'video/mpeg':
		case 'video/mp4':
			$media_items_thumbs_video[] = $media_item;
			break;
		default:
			$media_items_thumbs_other[] = $media_item;
	}
}
?>
<?php if (sizeof($media_items_thumbs_image) > 0) { ?>
	<span><?php _e('Imagens', 'iphan_inrc') ?></span>
	<div class="attachments">
		<?php
		foreach ($media_items_thumbs_image as $media_item) {
			echo $media_item;
		}
		?>
	</div>
<?php } ?>

<?php if (sizeof($media_items_thumbs_audio) > 0) { ?>
	<span><?php _e('Audios', 'iphan_inrc') ?></span>
	<div class="attachments">
		<?php
		foreach ($media_items_thumbs_audio as $media_item) {
			echo $media_item;
		}
		?>
	</div>
<?php } ?>

<?php if (sizeof($media_items_thumbs_video) > 0) { ?>
	<span><?php _e('Vídeos', 'iphan_inrc') ?></span>
	<div class="attachments">
		<?php
		foreach ($media_items_thumbs_video as $media_item) {
			echo $media_item;
		}
		?>
	</div>
<?php } ?>

<?php if (sizeof($media_items_thumbs_other) > 0) { ?>
	<span><?php _e('Documentos', 'iphan_inrc') ?></span>
	<div class="attachments">
		<?php
		foreach ($media_items_thumbs_other as $media_item) {
			echo $media_item;
		}
		?>
	</div>
<?php } ?>