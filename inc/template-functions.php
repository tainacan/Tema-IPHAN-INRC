<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package IPHAN_INRC
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function iphan_inrc_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	$classes[] = 'no-sidebar';

	return $classes;
}
add_filter( 'body_class', 'iphan_inrc_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function iphan_inrc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'iphan_inrc_pingback_header' );



/**
 * Retrieves an item adjacent link, either using WP strategy or Tainacan plugin tainacan_get_adjacent_items()
 * 
 * @param string $thumbnail: accepts 'small' and 'large', defaults to null
 */
function tainacan_get_adjacent_item_links($thumbnail = null) {

	if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
		$adjacent_items = tainacan_get_adjacent_items();

		if (isset($adjacent_items['next'])) {
			$next_link_url = $adjacent_items['next']['url'];
			$next_title = $adjacent_items['next']['title'];
		} else {
			$next_link_url = false;
		}
		if (isset($adjacent_items['previous'])) {
			$previous_link_url = $adjacent_items['previous']['url'];
			$previous_title = $adjacent_items['previous']['title'];
		} else {
			$previous_link_url = false;
		}

	} else {
		//Get the links to the Previous and Next Post
		$previous_link_url = get_permalink( get_previous_post() );
		$next_link_url = get_permalink( get_next_post() );

		//Get the title of the previous post and next post
		$previous_title = get_the_title( get_previous_post() );
		$next_title = get_the_title( get_next_post() );
	}

	$previous = '';
	$next = '';

	switch ($thumbnail) {

		case 'small':
			//Get the thumnail url of the previous and next post
			if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
				if ($adjacent_items['next']) {
					$next_thumb = $adjacent_items['next']['thumbnail']['tainacan-small'][0];
				}
				if ($adjacent_items['previous']) {
					$previous_thumb = $adjacent_items['previous']['thumbnail']['tainacan-small'][0];
				}
			} else {
				$previous_thumb = get_the_post_thumbnail_url( get_previous_post(), 'tainacan-small' );
				$next_thumb = get_the_post_thumbnail_url( get_next_post(), 'tainacan-small' );
			}

			// Creates the links
			$previous = $previous_link_url === false ? '' :
				'<a class="has-small-thumbnail" rel="prev" href="' . $previous_link_url . '">' . 
					'<i class="tainacan-icon tainacan-icon-arrowleft tainacan-icon-30px"></i>&nbsp;<span>' . 
					$previous_title . '</span><img src="' . $previous_thumb . '" alt="">' .
				'</a>';
			$next = $next_link_url === false ? '' :
				'<a class="has-small-thumbnail" rel="next" href="' . $next_link_url . '">' . 
					'<img src="' . $next_thumb . '" alt=""><span>' . $next_title . 
					'</span>&nbsp;<i class="tainacan-icon tainacan-icon-arrowright tainacan-icon-30px"></i>' .
				'</a>';
		break;

		case 'large':

			if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
				if ($adjacent_items['next']) {
					$next_thumb = $adjacent_items['next']['thumbnail']['tainacan-medium'][0];
				}
				if ($adjacent_items['previous']) {
					$previous_thumb = $adjacent_items['previous']['thumbnail']['tainacan-medium'][0];
				}
			} else {
				//Get the thumnail url of the previous and next post
				$previous_thumb = get_the_post_thumbnail_url( get_previous_post(), 'tainacan-medium' );
				$next_thumb = get_the_post_thumbnail_url( get_next_post(), 'tainacan-medium' );
			}
			
			// Creates the links
			$previous = $previous_link_url === false ? '' :
				'<a class="has-large-thumbnail" rel="prev" href="' . $previous_link_url . '">' .
					'<i class="tainacan-icon tainacan-icon-arrowleft tainacan-icon-36px"></i>&nbsp;' .
					'<div><img src="' . $previous_thumb . '" alt=""><span>' . $previous_title . 
				'</span></div></a>';
			$next = $next_link_url === false ? '' :
				'<a class="has-large-thumbnail" rel="next" href="' . $next_link_url . '">' . 
					'<div><img src="' . $next_thumb . '" alt=""><span>' . $next_title . 
					'</span></div>&nbsp;<i class="tainacan-icon tainacan-icon-arrowright tainacan-icon-36px"></i>' .
				'</a>';
		break;
		
		default:
			$previous = $previous_link_url === false ? '' : '<a rel="prev" href="' . $previous_link_url . '"><i class="tainacan-icon tainacan-icon-arrowleft tainacan-icon-30px"></i>&nbsp; <span>' . $previous_title . '</span></a>';
			$next = $next_link_url === false ? '' :'<a rel="next" href="' . $next_link_url . '"><span>' . $next_title . '</span> &nbsp;<i class="tainacan-icon tainacan-icon-arrowright tainacan-icon-30px"></i></a>';
	}

	return ['next' => $next, 'previous' => $previous];
}


/**
 * Retrieves the current items list source link
 */
function tainacan_get_source_item_list_url() {
	$args = $_GET;
	if (isset($args['ref'])) {
		$ref = $_GET['ref'];
		unset($args['pos']);
		unset($args['ref']);
		unset($args['source_list']);
		return $ref . '?' . http_build_query(array_merge($args));
	} else {
		unset($args['pos']);
		unset($args['ref']);
		unset($args['source_list']);
		return tainacan_the_collection_url() . '?' . http_build_query(array_merge($args));
	}
}


/**
 * Display date of item post.
 */
if ( ! function_exists('tainacan_meta_date_author') ) {
	function tainacan_meta_date_author( $echo = true ) {
		$time = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date()
		);

		$string = $time_string;
		$string .= __( '&nbsp;by&nbsp;', 'tainacan-interface' );
		$string .= get_the_author_posts_link();

		$string = apply_filters( 'tainacan-meta-date-author', $string );

		if ( $echo ) {
			echo $string;
		} else {
			return $string;
		}
	}
}