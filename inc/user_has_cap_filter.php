<?php 

function IPHAN_get_restrictive_roles() // PEGAR O SLUG DOS PERFIS QUE TERÃO OS DADOS RESTRINGIDOS!
{
	return array(
		'tainacan-coletores'
	);
}

function IPHAN_get_restrictive_ids($type = 'items') //ADICIONAR UMA OPTIONS AO METADADO PARA HAIBILITAR ELE COMO UM META RESTRITIVO!
{
	$repositories_metadata = \tainacan_metadata();
	$repositories_items = \tainacan_items();
	$restrictive_items_id = array();

	$metadatas = $repositories_metadata->fetch([
		'meta_query' => [
			[
				'key'   => 'metadata_type',
				'value' => 'Tainacan\Metadata_Types\User'
			]
			,[
				'key' => 'set_user_to_restrict_access',
				'value' => 'yes'
			]
		]
	], 'OBJECT');

	if( empty($metadatas)) {
		return false;
	}

	foreach($metadatas as $metadata)
	{
		if($metadata->get_collection_id() != $repositories_metadata->get_default_metadata_attribute())
		{
			$collection_id = $metadata->get_collection_id();
			if($type == 'items')
			{
				$items = $repositories_items->fetch(
					array(
						'meta_query' => [
							[
								'key'   => $metadata->get_id(),
								'value' => [get_current_user_id()],
								'compare' => 'IN'
							]
						]
					),
					$collection_id,
					'WP_Query'
				);

				while ( $items->have_posts() )
				{
					$items->the_post();
					$restrictive_items_id[] = $items->post->ID;
				}
			}
			elseif( $type == 'collections' )
			{
				$restrictive_items_id[] = $collection_id;
			}
		}
	}
	return $restrictive_items_id;
}

function IPHAN_get_allowed_users_id_cap($item)
{
	$repositories_metadata = \tainacan_metadata();
	$group_manager_collections_id = array();
	$group_manager_metadata_id = array();

	$metadatas = $repositories_metadata->fetch([
		'meta_query' => [
			[
				'key'   => 'metadata_type',
				'value' => 'Tainacan\Metadata_Types\User'
			]
			,[
				'key' => 'set_user_to_restrict_access',
				'value' => 'yes'
			]
		]
	], 'OBJECT');

	if( empty($metadatas)) {
		return false;
	}

	foreach($metadatas as $metadata)
	{
		if($metadata->get_collection_id() != $repositories_metadata->get_default_metadata_attribute())
		{
			$group_manager_collections_id[] = $metadata->get_collection_id();
			$group_manager_metadata_id[] = $metadata->get_id();
		}
	}

	$ids = [];
	$item_metadatas = $item->get_metadata();
	foreach($item_metadatas as $el) {
		$meta = $el->get_metadatum();
		if ($meta->get_metadata_type() == 'Tainacan\\Metadata_Types\\Relationship') 
		{
			$options = $meta->get_metadata_type_options();
			if( isset($options['collection_id']) )
			{
				$idx = array_search($options['collection_id'], $group_manager_collections_id);
				if( $idx !== false )
				{
					$items_id = $el->get_value();
					$items_id = is_array($items_id) ? $items_id: [$items_id];
					foreach($items_id as $id) {
						$_item = new \Tainacan\Entities\Item($id);
						$_meta = new \Tainacan\Entities\Metadatum($group_manager_metadata_id[$idx]);
						$_item_metadata = new Tainacan\Entities\Item_Metadata_Entity($_item, $_meta);
						$_value = $_item_metadata->get_value();
						$_value = is_array($_value)? $_value: [$_value];
						$ids = array_merge($ids, $_value);
					}
				}
			}
		}
	}
	return $ids;
}

function IPHAN_user_has_cap_filter( $allcaps, $caps, $args, $user )
{
	$exist_roles = !empty(array_intersect(IPHAN_get_restrictive_roles(), $user->roles));
	if( $exist_roles && is_array($args) && count($args) >= 3 )
	{
		$entity_id = $args[2];
		$repositories_items = \tainacan_items();

		if ( is_numeric( $entity_id ) )
		{
			$item = $repositories_items->fetch( (int) $entity_id );

			if ( $item instanceof \Tainacan\Entities\Item && $item->get_status() != 'auto-draft')
			{
				$allowed_users_id = IPHAN_get_allowed_users_id_cap($item);
				if($allowed_users_id === false)
				{
					return $allcaps;
				}
				$collection_id = $item->get_collection_id();
				if ( !in_array($user->ID, $allowed_users_id) )
				{
					$allcaps['read'] = false;
					$allcaps["tnc_col_{$collection_id}_edit_items"] = false;
					$allcaps["tnc_col_{$collection_id}_edit_others_items"] = false;
					$allcaps["tnc_col_{$collection_id}_edit_published_items"] = false;
					$allcaps["tnc_col_{$collection_id}_read_private_items"] = false;
					$allcaps["tnc_col_{$collection_id}_publish_items"] = false;
					$allcaps["tnc_col_{$collection_id}_delete_items"] = false;
					$allcaps["tnc_col_{$collection_id}_delete_others_items"] = false;
					$allcaps["tnc_col_{$collection_id}_delete_published_items"] = false;
				}
			}
		}
	}
	
	return $allcaps;
}
add_filter( 'user_has_cap', 'IPHAN_user_has_cap_filter', 20, 4 );

function IPHAN_tainacan_fetch_args($args, $type)
{
	$user = \wp_get_current_user();
	$exist_roles = !empty(array_intersect(IPHAN_get_restrictive_roles(), $user->roles));
	if( $type == 'items' && $exist_roles )
	{
		$post_type = $args['post_type'];
		if( isset($post_type) && count($post_type) == 1 && \strpos($post_type[0], 'tnc_col_') === 0 )
		{
			$col_id = preg_replace('/[a-z_]+(\d+)[a-z_]+?$/', '$1', $post_type[0] );
			if ( is_numeric($col_id) )
			{
				$repositories_metadata = \tainacan_metadata();
				$repositories_collections = \tainacan_collections();
				$collection = $repositories_collections->fetch($col_id);

				$col_restrictive_ids = IPHAN_get_restrictive_ids('collections');
				if($col_restrictive_ids === false)
				{
					return $args;
				}
				$metadatas = $repositories_metadata->fetch_by_collection($collection,
					array(
						'meta_query' => [
							[
								'key'   => 'metadata_type',
								'value' => 'Tainacan\Metadata_Types\Relationship'
							],
							[
								'key' => '_option_collection_id',
								'value' => $col_restrictive_ids,
								'compare' => 'IN'
							]
						]
					)
				);

				foreach($metadatas as $metadata)
				{
					if( !isset($args['meta_query'] ) )
					{
						$args['meta_query'] = array();
					}

					$items_id = IPHAN_get_restrictive_ids('items');
					if($items_id === false)
					{
						continue;
					}
					$args['meta_query'][] = [
						'key' => $metadata->get_id(),
						'value' => empty($items_id)? ['NOT_ITEM_ID'] : $items_id,
						'compare' => 'IN'
					];
				}
			}
		}
	}

	return $args;
}
add_filter( 'tainacan_fetch_args' , 'IPHAN_tainacan_fetch_args', 10, 2 );



/*
 * FORM HOOK
**/

add_action( 'tainacan-register-admin-hooks', 'tainacan_set_user_to_restrict_access_items_register_hook');
function tainacan_set_user_to_restrict_access_items_register_hook()
{
	if ( function_exists( 'tainacan_register_admin_hook' ) )
	{
		tainacan_register_admin_hook( 'metadatum', 'tainacan_set_user_to_restrict_access_items_form', 'end-left', [ 'attribute' => 'metadata_type', 'value' => 'Tainacan\Metadata_Types\User' ] );
	}
}

function tainacan_set_user_to_restrict_access_items_form()
{
	if ( ! function_exists( 'tainacan_get_api_postdata' ) ) {
			return '';
	}

	ob_start();
	?>

		<div class="tainacan-set-user-to-restrict-access"> 
			<div class="field tainacan-metadatum--section-header">
				<h4><?php _e( 'Opções do IPHAN-INRC', 'iphan-inrc' ); ?></h4>
				<hr>
			</div>
			<div
				class="field"
				style="margin: 0.5em 0;">
				<label class="label">
					<?php _e('Restringir acesso dos usuários', 'iphan-inrc'); ?>
					<span class="help-wrapper">
						<a class="help-button has-text-secondary">
							<span class="icon is-small">
								<i class="tainacan-icon tainacan-icon-help"></i>
							</span>
						</a>
						<div class="help-tooltip">
							<div class="help-tooltip-header">
								<h5 class="has-text-color"><?php _e('Restringir acesso', 'iphan-inrc'); ?></h5>
							</div>
							<div class="help-tooltip-body">
								<p><?php _e('Ao ativar a restrição de acessos os usuários listados nesse metadado terão seu acesso aos itens restringido.', 'iphan-inrc'); ?></p>
							</div>
						</div>
					</span>
				</label>
				<div class="control is-expanded">
					<span class="select is-fullwidth">
						<select name="set_user_to_restrict_access" id="set-user-to-restrict-access-select">
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

\add_filter( 'tainacan-api-response-metadatum-meta', 'tainacan_set_user_to_restrict_access_items_add_meta_to_response', 10, 2 );
function tainacan_set_user_to_restrict_access_items_add_meta_to_response( $extra_meta, $request )
{
	$extra_meta = array_merge($extra_meta, array('set_user_to_restrict_access'));
	return $extra_meta;
}

\add_action( 'tainacan-insert-tainacan-metadatum', 'tainacan_set_user_to_restrict_access_items_create', 10, 2 );
function tainacan_set_user_to_restrict_access_items_create($metadatum) {
	if ( !$metadatum instanceof \Tainacan\Entities\Metadatum || $metadatum->get_metadata_type() !== 'Tainacan\Metadata_Types\User') { 
		return;
	}
	if ( !$metadatum->can_edit() ) {
		return;
	}

	$post = \tainacan_get_api_postdata();
	$set_user_to_restrict_access = isset($post->set_user_to_restrict_access) ? 'yes' == $post->set_user_to_restrict_access : false;
	update_post_meta( $metadatum->get_id(), 'set_user_to_restrict_access', $set_user_to_restrict_access ? 'yes' : 'no');
}

?>