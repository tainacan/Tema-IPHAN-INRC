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
 */
function tainacan_get_adjacent_item_links() {

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


	if (function_exists('tainacan_get_adjacent_items') && isset($_GET['pos'])) {
		if ($adjacent_items['next']) {
			$next_thumb = $adjacent_items['next']['thumbnail']['large'][0];
		}
		if ($adjacent_items['previous']) {
			$previous_thumb = $adjacent_items['previous']['thumbnail']['large'][0];
		}
	} else {
		//Get the thumnail url of the previous and next post
		$previous_thumb = get_the_post_thumbnail_url( get_previous_post(), 'large' );
		$next_thumb = get_the_post_thumbnail_url( get_next_post(), 'large' );
	}
	
	// Creates the links
	$previous = $previous_link_url === false ? '' :
		'<a style="background-image: url(' . $previous_thumb . ')" rel="prev" href="' . $previous_link_url . '">' .
		'<div class="post-box"><img src="' . $previous_thumb . '" alt=""' . $previous_title . '">' .
			'<span class="post-type">' . __('Item anterior') . '</span>' . 
			'<span class="post-title">' . $previous_title . '<span>' . 
		'</div></a>';
	$next = $next_link_url === false ? '' :
		'<a style="background-image: url(' . $next_thumb . ')" rel="next" href="' . $next_link_url . '">' . 
			'<div class="post-box"><img src="' . $next_thumb . '" alt=""' . $next_title . '">' .
			'<span class="post-type">' . __('Próximo item') . '</span>' . 
			'<span class="post-title">' . $next_title . '<span>' . 
		'</div></a>';

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
 * Determine active queries on Tainacan collection archive
 */
function tainacan_active( $selected, $current = true, $echo = true ) {
	$return = $selected == $current ? 'active' : '';
	if ( $echo ) {
		echo $return;
	}
	return $return;
}

/**
 * Special Pagination for Tainacan Collections archive
 */
if ( ! function_exists( 'tainacan_pagination' ) ) :
	function tainacan_pagination() {
		global $wp_query;
		$cur_posts = min( (int) $wp_query->get( 'posts_per_page' ), $wp_query->found_posts );
		$to_paged = max( (int) $wp_query->get( 'paged' ), 1 );
		$count_max = ( $to_paged - 1 ) * $cur_posts; ?>
		<div class="d-flex px-0 margin-pagination justify-content-between border-top pt-2">
			<div class="col-sm-5 d-none d-lg-block pl-0 view-items">
				<?php //translators: Example - Viewing results: 1 to 12 of 345 ?>
				<?php printf( __('Exibindo coleções: %1$d a %2$d de %3$d', 'iphan_inrc'), $count_max + 1, $count_max + $wp_query->post_count, $wp_query->found_posts ); ?>
			</div>
			<div class="col-sm-5 pr-md-0 justify-content-md-end">
				<?php the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => sprintf(
							'%s',
							'<i class="tainacan-icon tainacan-icon-previous tainacan-icon-1-125em"></i>'
						),
						'next_text' => sprintf(
							' %s',
							'<i class="tainacan-icon tainacan-icon-next tainacan-icon-1-125em"></i>'
						)
					)
				); ?>
			</div>
		</div>
	<?php }
endif;

/**
 * Adds parameter for enabling Collections list view mode change via query.
 */
function tainacan_collections_viewmode( $public_query_vars ) {
	$public_query_vars[] = 'tainacan_collections_viewmode';
	return $public_query_vars;
}
add_filter( 'query_vars', 'tainacan_collections_viewmode' );

/**
 * Changes Collections archive title.
 */
function tainacan_theme_collection_title( $title ) {
	if ( is_post_type_archive( 'tainacan-collection' ) ) {
		return __( 'Coleções', 'iphan_inrc' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'tainacan_theme_collection_title' );

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
		$string .= '&nbsp;by&nbsp;';
		$string .= get_the_author_posts_link();

		$string = apply_filters( 'tainacan-meta-date-author', $string );

		if ( $echo ) {
			echo $string;
		} else {
			return $string;
		}
	}
}
?>
