<?php
//namespace IPHAN\expanded_filter;

add_action( 'tainacan-register-admin-hooks', 'tainacan_expanded_filter_relationship_register_hook');
function tainacan_expanded_filter_relationship_register_hook() {
	if ( function_exists( 'tainacan_register_admin_hook' ) ) {
		tainacan_register_admin_hook( 'metadatum', 'tainacan_expanded_filter_relationship_form', 'end-left', [ 'attribute' => 'metadata_type', 'value' => 'Tainacan\Metadata_Types\Relationship' ] );
	}
}

function tainacan_expanded_filter_relationship_form() {
	if ( ! function_exists( 'tainacan_get_api_postdata' ) ) {
			return '';
	}

	ob_start();
	?>

		<div class="tainacan-expanded-filter-relationship"> 
			<div class="field tainacan-metadatum--section-header">
				<h4><?php _e( 'Opções do IPHAN-INRC', 'iphan-inrc' ); ?></h4>
				<hr>
			</div>
			<div 
					class="field"
					style="margin: 0.5em 0;">
				<label class="label">
					<?php _e('Expandir filtros', 'iphan-inrc'); ?>
					<span class="help-wrapper">
						<a class="help-button has-text-secondary">
							<span class="icon is-small">
								<i class="tainacan-icon tainacan-icon-help"></i>
							</span>
						</a>
						<div class="help-tooltip">
							<div class="help-tooltip-header">
								<h5 class="has-text-color"><?php _e('Expandir filtros', 'iphan-inrc'); ?></h5>
							</div>
							<div class="help-tooltip-body">
								<p><?php _e('Essa opção adiciona à lista de filtros os metadados selecionados para exibição.', 'iphan-inrc'); ?></p>
							</div>
						</div>
					</span>
				</label>
				<div class="control is-expanded">
					<span class="select is-fullwidth">
						<select name="expanded_filter" id="expanded-filter-select">
							<option value="yes"><?php _e('Sim', 'iphan-inrc'); ?></option>
							<option value="no"><?php _e('Não', 'iphan-inrc'); ?></option>
						</select>
					</span>
				</div>
			</div>
		</div>
	<?php
	return ob_get_clean();
}

\add_filter( 'tainacan-api-response-metadatum-meta', 'tainacan_expanded_filter_relationship_add_meta_to_response', 10, 2 );
function tainacan_expanded_filter_relationship_add_meta_to_response( $extra_meta, $request ) {
	$extra_meta = array_merge($extra_meta, array('expanded_filter'));
	return $extra_meta;
}

\add_action( 'tainacan-insert-tainacan-metadatum', 'tainacan_expanded_filter_relationship_create', 10, 2 );
function tainacan_expanded_filter_relationship_create($metadatum) {
	if ( !$metadatum instanceof \Tainacan\Entities\Metadatum || $metadatum->get_metadata_type() !== 'Tainacan\Metadata_Types\Relationship' || $metadatum->get_metadata_type() !== 'Tainacan\Metadata_Types\Compound') {
		return;
	}
	if ( !$metadatum->can_edit() ) {
		return;
	}

	$post = tainacan_get_api_postdata();
	$expanded_filter = isset($post->expanded_filter) ? 'yes' == $post->expanded_filter : false;
	update_post_meta( $metadatum->get_id(), 'expanded_filter', $expanded_filter ? 'yes' : 'no');

	if ($expanded_filter) {
		$options = $metadatum->get_metadata_type_options();
		$relationship_name = $metadatum->get_name();
		$colection_id = $metadatum->get_collection_id();
		$collection = \tainacan_collections()->fetch($colection_id);
		$relationship_collection_id = $options['collection_id'];
		$relationship_collection = \tainacan_collections()->fetch($relationship_collection_id);
		$relationship_collection_metadata = \tainacan_metadata()->fetch_by_collection($relationship_collection, ['posts_per_page' => -1]);


		$args = [
			'include_control_metadata_types' => true,
			'meta_query' => [
				[
					'key'     => 'metadata_type',
					'value'   => 'Tainacan\Metadata_Types\Control',
				],
				[
					'key'     => '_option_control_metadatum',
					'value'   => 'expanded_filter',
				],
				[
					'key'     => '_option_meta_relationship_id',
					'value'   => $metadatum->get_id(),
				]
			]
		];
		$data_control_metadata_already_existing = \tainacan_metadata()->fetch_by_collection( $collection, $args );
		$data_control_metadata_already_existing = array_map(function($mtd) {
			$opts = $mtd->get_metadata_type_options();
			return $opts['meta_id'];
		}, $data_control_metadata_already_existing);

		$data_control_metadata = array();
		foreach ($relationship_collection_metadata as $relationship_meta) {
			$id = $relationship_meta->get_id();
			if ( in_array($id, $data_control_metadata_already_existing) ) {
				continue;
			}
			$name = $relationship_meta->get_name();
			$type = $relationship_meta->get_metadata_type_object();
			$relationship_options = $relationship_meta->get_metadata_type_options();
			$data_control_metadata["relationship_metadata_$id"] = [
				'name'            => "$relationship_name/$name",
				'description'     => "$relationship_name/$name",
				'collection_id'   => $colection_id,
				'metadata_type'   => 'Tainacan\Metadata_Types\Control',
				'status'          => 'publish',
				'display'         => 'never',
				'multiple'        => 'yes',
				'metadata_type_options' => [
					'control_metadatum' => 'expanded_filter',
					'meta_relationship_id' => $metadatum->get_id(),
					'meta_id' => $id,
				]
			];
			if($type->get_primitive_type() == 'term') {
				$data_control_metadata["relationship_metadata_$id"]['metadata_type_options']['type'] = 'term';
				$data_control_metadata["relationship_metadata_$id"]['metadata_type_options']['taxonomy_id'] = $relationship_options['taxonomy_id'];
			}
		}

		foreach ( $data_control_metadata as $index => $data_control_metadatum ) {
			$metadatum = new \Tainacan\Entities\Metadatum();
			foreach ( $data_control_metadatum as $attribute => $value ) {
				$set_ = 'set_' . $attribute;
				$metadatum->$set_( $value );
			}
			if ( $metadatum->validate() ) {
				$metadatum = \tainacan_metadata()->insert( $metadatum );
				if ( isset($data_control_metadatum['metadata_type_options']['type']) && $data_control_metadatum['metadata_type_options']['type'] == 'term') {
					$taxonomy_id = $data_control_metadatum['metadata_type_options']['taxonomy_id'];
					do_action( 'tainacan-taxonomy-added-to-collection', $taxonomy_id, $colection_id );
				}
			} else {
				throw new \ErrorException( 'The entity wasn\'t validated.' . print_r( $metadatum->get_errors(), true ) );
			}
		}
	} else {
		tainacan_expanded_filter_relationship_remove($metadatum);
	}
}

\add_action( 'tainacan-deleted-tainacan-metadatum', 'tainacan_expanded_filter_relationship_create', 10, 2 );
function tainacan_expanded_filter_relationship_remove($metadatum) {
	if ( !$metadatum instanceof \Tainacan\Entities\Metadatum || $metadatum->get_metadata_type() !== 'Tainacan\Metadata_Types\Relationship') { 
		return;
	}
	if ( !$metadatum->can_edit() ) {
		return;
	}

	$args = [
		'include_control_metadata_types' => true,
		'meta_query' => [
			[
				'key'     => 'metadata_type',
				'value'   => 'Tainacan\Metadata_Types\Control',
			],
			[
				'key'     => '_option_control_metadatum',
				'value'   => 'expanded_filter',
			],
			[
				'key'     => '_option_meta_relationship_id',
				'value'   => $metadatum->get_id(),
			]
		]
	];

	$colection_id = $metadatum->get_collection_id();
	$collection = \tainacan_collections()->fetch($colection_id);
	$metadatum_list = \tainacan_metadata()->fetch_by_collection( $collection, $args );
	foreach ($metadatum_list as $metadata) {
		\tainacan_metadata()->delete( $metadata );
	}
}

\add_action( 'tainacan-insert-Item_Metadata_Entity', 'tainacan_expanded_filter_relationship_update_filter_values', 10, 2);
function tainacan_expanded_filter_relationship_update_filter_values($item_metadata) {
	if (! $item_metadata instanceof \Tainacan\Entities\Item_Metadata_Entity) {
		return false;
	}

	$item = $item_metadata->get_item();
	$metadatum = $item_metadata->get_metadatum();
	if (!$item instanceof \Tainacan\Entities\Item || !$metadatum instanceof \Tainacan\Entities\Metadatum || $metadatum->get_metadata_type() !== 'Tainacan\Metadata_Types\Relationship') { 
		return;
	}

	$colection_id = $metadatum->get_collection_id();
	$collection = \tainacan_collections()->fetch($colection_id);
	$options = $metadatum->get_metadata_type_options();

	$args = [
		'include_control_metadata_types' => true,
		'meta_query' => [
			[
				'key'     => 'metadata_type',
				'value'   => 'Tainacan\Metadata_Types\Control',
			],
			[
				'key'     => '_option_control_metadatum',
				'value'   => 'expanded_filter',
			],
			[
				'key'     => '_option_meta_relationship_id',
				'value'   => $metadatum->get_id(),
			]

		]
	];
	$metadata = \tainacan_metadata()->fetch_by_collection( $collection, $args );

	$values = array();
	$relationship_items = $item_metadata->get_value();
	$relationship_items = is_array($relationship_items) ? $relationship_items : [$relationship_items];

	foreach ($relationship_items as $relationship_item_id) {
		if ( empty($relationship_item_id) ) {
			continue;
		}
		$relationship_item = \tainacan_items()->fetch($relationship_item_id);
		foreach ($metadata as $item_metadatum) {
			$options = $item_metadatum->get_metadata_type_options();
			$meta_id = $options['meta_id'];
			$relationship_metadata = \tainacan_metadata()->fetch($meta_id);
			if ($relationship_metadata->get_metadata_type() != 'Tainacan\Metadata_Types\Compound') {
				$item_metadata = new \Tainacan\Entities\Item_Metadata_Entity( $relationship_item, $relationship_metadata );
				$value = $relationship_metadata->is_multiple() ? $item_metadata->get_value() : [$item_metadata->get_value()];
				if(!isset($values[$meta_id])) {
					$values[$meta_id] = [];
				}
				$values[$meta_id] = array_merge($values[$meta_id], $value);
			}
		}
	}

	foreach ($metadata as $item_metadatum) {
		if ( $item_metadatum->get_metadata_type_object() instanceof \Tainacan\Metadata_Types\Control) {
			$options = $item_metadatum->get_metadata_type_options();
			$meta_id = $options['meta_id'];
			$type = isset($options['type']) ? $options['type'] : false;
			$value = !isset( $values[$meta_id] ) ? [] : $values[$meta_id];
			if($type && $type == 'term') {
				$taxonomy_id = $options['taxonomy_id'];
				$taxonomy  = new \Tainacan\Entities\Taxonomy( $taxonomy_id );
				if ( $taxonomy ) {
					\wp_set_object_terms( $item->get_id(), $value, $taxonomy->get_db_identifier() );
				}
			} else {
				$update_item_metadatum = new \Tainacan\Entities\Item_Metadata_Entity( $item, $item_metadatum );
				$update_item_metadatum->set_value( $value );
				if ( $update_item_metadatum->validate() ) {
					\tainacan_item_metadata()->insert( $update_item_metadatum );
				} else {
					error_log( json_encode($update_item_metadatum->get_errors()) );
				}
			}
		}
	}
}

\add_filter('tainacan-fetch-all-metadatum-values', 'tainacan_expanded_filter_relationship_fetch_all_metadatum_values', 10, 3);
function tainacan_expanded_filter_relationship_fetch_all_metadatum_values($return, $metadatum, $args) {
	$options = $metadatum->get_metadata_type_options();
	$type = isset($options['type']) ? $options['type'] : false;
	if(!$type || $type != 'term') {
		return null;
	}
	global $wpdb;
	$itemsRepo = \tainacan_items();
	$taxonomy_id = $options['taxonomy_id'];
	$taxonomy_slug = \tainacan_taxonomies()->get_db_identifier_by_id($taxonomy_id);

	if ( false !== $args['items_filter'] && is_array($args['items_filter']) ) {
		add_filter('posts_pre_query', '__return_empty_array');
		$items_query = $itemsRepo->fetch($args['items_filter'], $args['collection_id']);
		$items_query = $items_query->request;
		remove_filter('posts_pre_query', '__return_empty_array');
	}

	$pagination = '';
	if ( $args['offset'] >= 0 && $args['number'] >= 1 ) {
		$pagination = $wpdb->prepare( "LIMIT %d,%d", (int) $args['offset'], (int) $args['number'] );
	}

	$search_q = '';
	$search = trim($args['search']);
	if (!empty($search)) {
		$search_q = $wpdb->prepare("AND meta_value IN ( SELECT ID FROM $wpdb->posts WHERE post_title LIKE %s )", '%' . $search . '%');
	}

	if ($items_query) {
		$check_hierarchy_q = $wpdb->prepare("SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = %s AND parent > 0 LIMIT 1", $taxonomy_slug);
		$has_hierarchy = ! is_null($wpdb->get_var($check_hierarchy_q));

		if ( ! $has_hierarchy ) {
			$base_query = $wpdb->prepare("FROM $wpdb->term_relationships tr
				INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
				INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
				WHERE
				tt.parent = %d AND
				tr.object_id IN ($items_query) AND
				tt.taxonomy = %s
				$search_q
				ORDER BY t.name ASC
				",
				$args['parent_id'],
				$taxonomy_slug
			);

			$query = "SELECT DISTINCT t.name, t.term_id, tt.term_taxonomy_id, tt.parent $base_query $pagination";

			$total_query = "SELECT COUNT(DISTINCT tt.term_taxonomy_id) $base_query";
			$total = $wpdb->get_var($total_query);

			$results = $wpdb->get_results($query);
		} else {
			$base_query = $wpdb->prepare("
				SELECT DISTINCT t.term_id, t.name, tt.parent, coalesce(tr.term_taxonomy_id, 0) as have_items
				FROM
				$wpdb->terms t INNER JOIN $wpdb->term_taxonomy tt ON t.term_id = tt.term_id
				LEFT JOIN (
					SELECT DISTINCT term_taxonomy_id FROM $wpdb->term_relationships
						INNER JOIN ($items_query) as posts ON $wpdb->term_relationships.object_id = posts.ID
				) as tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
				WHERE tt.taxonomy = %s ORDER BY t.name ASC", $taxonomy_slug
			);

			$all_hierarchy = $wpdb->get_results($base_query);

			if (empty($search)) {
				$results = \tainacan_metadata()->_process_terms_tree($all_hierarchy, $args['parent_id'], 'parent');
			} else  {
				$results = \tainacan_metadata()->_process_terms_tree($all_hierarchy, $search, 'name');
			}

			$total = count($results);

			if ( $args['offset'] >= 0 && $args['number'] >= 1 ) {
				$results = array_slice($results, (int) $args['offset'], (int) $args['number']);
			}
		}
	} else {
		$parent_q = $wpdb->prepare("AND tt.parent = %d", $args['parent_id']);
		if ($search_q) {
			$parent_q = '';
		}
		$base_query = $wpdb->prepare("FROM $wpdb->term_taxonomy tt
			INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
			WHERE 1=1
			$parent_q
			AND tt.taxonomy = %s
			$search_q
			ORDER BY t.name ASC
			",
			$taxonomy_slug
		);

		$query = "SELECT DISTINCT t.name, t.term_id, tt.term_taxonomy_id, tt.parent $base_query $pagination";

		$total_query = "SELECT COUNT(DISTINCT tt.term_taxonomy_id) $base_query";
		$total = $wpdb->get_var($total_query);

		$results = $wpdb->get_results($query);
	}

	if ( !empty($args['include']) ) {
		if ( is_array($args['include']) && !empty($args['include']) ) {

			// protect sql
			$args['include'] = array_map(function($t) { return (int) $t; }, $args['include']);

			$include_ids = implode(',', $args['include']);
			$query_to_include = "SELECT DISTINCT t.name, t.term_id, tt.term_taxonomy_id, tt.parent FROM $wpdb->term_taxonomy tt
				INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
				WHERE
				t.term_id IN ($include_ids)";

			$to_include = $wpdb->get_results($query_to_include);

			// remove terms that will be included at the begining
			$results = array_filter($results, function($t) use($args) { return !in_array($t->term_id, $args['include']); });

			$results = array_merge($to_include, $results);

		}
	}

	$number = ctype_digit($args['number']) && $args['number'] >=1 ? $args['number'] : $total;
	if( $number < 1){
		$pages = 1;
	} else {
		$pages = ceil( $total / $number );
	}
	$separator = strip_tags(apply_filters('tainacan-terms-hierarchy-html-separator', '>'));
	$values = [];
	foreach ($results as $r) {

		$count_query = $wpdb->prepare("SELECT COUNT(term_id) FROM $wpdb->term_taxonomy WHERE parent = %d", $r->term_id);
		$total_children = $wpdb->get_var($count_query);

		$label = wp_specialchars_decode($r->name);
		$total_items = null;

		if ( $args['count_items'] ) {
			$count_items_query = $args['items_filter'];
			$count_items_query['posts_per_page'] = 1;
			if ( !isset($count_items_query['tax_query']) ) {
				$count_items_query['tax_query'] = [];
			}
			$count_items_query['tax_query'][] = [
				'taxonomy' => $taxonomy_slug,
				'terms' => $r->term_id
			];
			$count_items_results = $itemsRepo->fetch($count_items_query, $args['collection_id']);
			$total_items = $count_items_results->found_posts;

			//$label .= " ($total_items)";

		}

		$values[] = [
			'value' => $r->term_id,
			'label' => $label,
			'total_children' => $total_children,
			'taxonomy' => $taxonomy_slug,
			'taxonomy_id' => $taxonomy_id,
			'parent' => $r->parent,
			'total_items' => $total_items,
			'type' => 'Taxonomy',
			'hierarchy_path' => get_term_parents_list($r->term_id, $taxonomy_slug, ['format'=>'name', 'separator'=>$separator, 'link'=>false, 'inclusive'=>false])
		];

	}

	return [
		'total' => $total,
		'pages' => $pages,
		'values' => $values,
		'last_term' => $args['last_term']
	];

}

add_filter('tainacan-api-prepare-items-args', 'tainacan_expanded_filter_relationship_replace_prepare_items_args', 10, 2);
function tainacan_expanded_filter_relationship_replace_prepare_items_args($args, $request) {
	if ( isset($args['meta_query']) ) {
		foreach($args['meta_query'] as $key => $meta_query) {
			$meta_id = $meta_query['key'];
			$metadatum = \tainacan_metadata()->fetch($meta_id);
			if(!$metadatum) return $args;
			$options = $metadatum->get_metadata_type_options();
			$type = isset($options['type']) ? $options['type'] : false;
			if(!$type || $type != 'term') {
				continue;
			}
			$taxonomy_id = $options['taxonomy_id'];
			$taxonomy_slug = \tainacan_taxonomies()->get_db_identifier_by_id($taxonomy_id);
			if( !isset($args['tax_query']) ) {
				$args['tax_query'] = [];
			}
			$args['tax_query'][] = ['taxonomy'=>$taxonomy_slug, 'terms' => $meta_query['value']];
			unset($args['meta_query'][$key]);
		}
	}
	return $args;
}