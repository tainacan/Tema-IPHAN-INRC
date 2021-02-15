<?php
// Alterar ordem dos campos dos comentários
function comment_fields_custom_order($fields)
{
	$comment_field = $fields['comment'];
	$author_field = $fields['author'];
	$email_field = $fields['email'];
	$site_field = $fields['url'];
	unset($fields['comment']);
	unset($fields['author']);
	unset($fields['email']);
	unset($fields['url']);
	// the order of fields is the order below, change it as needed:
	$fields['author'] = $author_field;
	$fields['email'] = $email_field;
	$fields['url'] = $site_field;
	$fields['comment'] = $comment_field;
	// done ordering, now return the fields
	return $fields;
}
add_filter('comment_form_fields', 'comment_fields_custom_order');

function remove_comment_time($date, $d, $comment)
{

	if (!is_admin()) {
		return;
	} else {
		return $date;
	}
}
add_filter('get_comment_time', 'remove_comment_time', 10, 3);

