<?php
// Alterar ordem dos campos dos comentários
add_filter( 'comment_form_fields', 'comment_fields_custom_order' );
function comment_fields_custom_order( $fields ) {
	$comment_field = $fields['comment'];
	$author_field = $fields['author'];
	unset( $fields['comment'] );
	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );
	// the order of fields is the order below, change it as needed:
	$fields['author'] = $author_field;
	$fields['comment'] = $comment_field;
	// done ordering, now return the fields:
	return $fields;
}
