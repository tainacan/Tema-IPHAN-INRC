<?php

define('IPHAN_TAINACAN_ADMIN_OPTIONS', [
	'Navegação' => [
		'hideTainacanHeaderSearchInput' => 'Esconder campo de busca no cabeçalho do Tainacan',
		'hideTainacanHeaderAdvancedSearch' => 'Esconder busca avançada no cabeçalho do Tainacan',
		'hideTainacanHeaderProcessesPopup' => 'Esconder popup de processos no cabeçalho do Tainacan',
		'hideRepositorySubheaderExportButton' => 'Esconder cabeçalho do repositório',
		'hideRepositorySubheaderViewCollectionsButton' => 'Esconder botão de ver coleções no cabeçalho do repositório',
    	'hideRepositorySubheaderViewCollectionButton' => 'Esconder botão de ver coleção no cabeçalho do repositório',
    	'hideRepositorySubheaderExportButton' => 'Esconder botão de exportar no cabeçalho do repositório',
		'hideCollectionSubheader' => 'Esconder cabeçalho da coleção',
		'hidePrimaryMenu' => 'Esconder todo o menu lateral',
		'hidePrimaryMenuCompressButton' => 'Esconder o botão de comprimir o menu lateral',
        'hidePrimaryMenuRepositoryButton' => 'Esconder o botão do repositório do menu lateral',
        'hidePrimaryMenuCollectionsButton' => 'Esconder o botão de coleções do menu lateral',
        'hidePrimaryMenuItemsButton' => 'Esconder o botão de itens do menu lateral',
        'hidePrimaryMenuTaxonomiesButton' => 'Esconder o botão de taxonomias do menu lateral',
        'hidePrimaryMenuMetadataButton' => 'Esconder o botão de metadados do menu lateral',
        'hidePrimaryMenuFiltersButton' => 'Esconder o botão de filtros do menu lateral',
        'hidePrimaryMenuImportersButton' => 'Esconder o botão de importadores do menu lateral',
        'hidePrimaryMenuExportersButton' => 'Esconder o botão de exportadores do menu lateral',
        'hidePrimaryMenuActivitiesButton' => 'Esconder o botão de atividades do menu lateral',
        'hidePrimaryMenuCapabilitiesButton' => 'Esconder o botão de permissões do menu lateral'
	],
	'Página inicial' => [
		'hideHomeRepositorySection' => 'Esconder sessão do repositório',
		'hideHomeThemeCollectionsButton' => 'Esconder botão das coleções no tema',
        'hideHomeThemeItemsButton' => 'Esconder botão dos itens no tema',
        'hideHomeTaxonomiesButton' => 'Esconder botão das taxonomias',
        'hideHomeMetadataButton' => 'Esconder botão dos metadados nível repositório',
        'hideHomeFiltersButton' => 'Esconder botão dos filtros nível repositório',
        'hideHomeImportersButton' => 'Esconder botão dos importadores',
        'hideHomeExportersButton' => 'Esconder botão dos exportadores',
        'hideHomeActivitiesButton' => 'Esconder botão de atividades',
		'hideHomeCollectionsButton' => 'Esconder botão de coleções',
		'hideHomeCollectionSettingsButton' => 'Esconder botão de configuração na sessão de coleções',
		'hideHomeCollectionMetadataButton' => 'Esconder botão de metadados na sessão de coleções',
		'hideHomeCollectionFiltersButton' => 'Esconder botão de filtros na sessão de coleções',
		'hideHomeCollectionActivitiesButton' => 'Esconder botão de atividades na sessão de coleções',
		'hideHomeCollectionThemeCollectionButton' => 'Esconder botão de "ver no tema" na sessão de coleções',
		'showHomeCollectionCreateItemButton' => 'Mostrar botão de criar item na sessão de coleções'
	],
	'Lista de itens' => [
		'hideItemsListBulkActionsButton' => 'Esconder botão de ações em massa',
		'hideItemsListMultipleSelection' => 'Esconder multipla seleção de itens',
		'hideItemsListSelection' => 'Esconder seleção individual de itens',
		'hideItemsListExposersButton' => 'Esconder botão de "Ver como..."',
		'hideItemsListStatusTabs' => 'Esconder abas de status',
		'hideItemsListStatusTabsTotalItems' => 'Esconder o total de itens nas abas de status',
		'hideItemsListCreationDropdownBulkAdd' => 'Esconder botão de adicionar em massa no dropdown de criação',
		'hideItemsListCreationDropdownImport' => 'Esconder botão de importar no dropdown de criação',
		'hideItemsListContextMenu' => 'Esconder menu que aparece com o clique direito',
		'hideItemsListFilterCreationButton' => 'Esconder botão de criar filtros'
	],
	'Página de edição do item' => [
		'hideItemEditionCollectionName' => 'Esconder nome da coleção',
		'hideItemEditionStatusOptions' => 'Esconder opções de status',
		'hideItemEditionStatusPublishOption' => 'Esconder a opção de status público',
		'hideItemEditionCommentsToggle' => 'Esconder opção de comentários',
		'hideItemEditionDocumentFileInput' => 'Esconder entrada de documento tipo Arquivo',
		'hideItemEditionDocumentTextInput' => 'Esconder entrada de documento tipo Texto',
		'hideItemEditionDocumentUrlInput' => 'Esconder entrada de documento tipo URL',
		'hideItemEditionThumbnail' => 'Esconder miniatura'
	],
	'Página do item' => [
		'hideItemSingleCollectionName' => 'Esconder nome da coleção',
		'hideItemSingleCurrentStatus' => 'Esconder status',
		'hideItemSingleCurrentVisibility' => 'Esconder visibilidade',
		'hideItemSingleCommentsOpen' => 'Esconder condição dos comentários',
		'hideItemSingleThumbnail' => 'Esconder miniatura',
		'hideItemSingleActivities' => 'Esconder atividades',
		'hideItemSingleExposers' => 'Esconder botão de "Ver como..."'
	]
]);

function IPHAN_get_restrictive_roles()
{
	$roles = get_option('IPHAN_set_role_to_restrict_access', []);
	return $roles;
}

function IPHAN_get_collections_access_by_user()
{
	$user = \wp_get_current_user();
	$roles_collections = get_option('IPHAN_collections_access_by_role', []);
	$collections_ids = [];
	$roles = $user->roles;
	foreach($roles as $role)
	{
		if( isset($roles_collections[$role]) && is_array($roles_collections[$role]) )
		{
			$collections_ids = array_merge($collections_ids, $roles_collections[$role]);
		}
	}
	return empty($collections_ids) ? false : $collections_ids;
}

function IPHAN_get_restrictive_ids($type = 'items')
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
							],
						'per_page' => 1
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
						// $_item = new \Tainacan\Entities\Item($id);
						// $_meta = new \Tainacan\Entities\Metadatum($group_manager_metadata_id[$idx]);
						// $_item_metadata = new Tainacan\Entities\Item_Metadata_Entity($_item, $_meta);
						// $_value = $_item_metadata->get_value();
						$_value = get_post_meta( $id, $group_manager_metadata_id[$idx] );
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

function IPHAN_tainacan_fetch_items_args($args, $user)
{
	$exist_roles = !empty(array_intersect(IPHAN_get_restrictive_roles(), $user->roles));

	$post_type = $args['post_type'];
	if($exist_roles && isset($post_type) && count($post_type) == 1 && \strpos($post_type[0], 'tnc_col_') === 0 )
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

			if( in_array($col_id, $col_restrictive_ids) )
			{
				$metadatas = $repositories_metadata->fetch_by_collection($collection, [
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
				foreach($metadatas as $metadata)
				{
					if( !isset($args['meta_query'] ) )
					{
						$args['meta_query'] = array();
					}

					$args['meta_query'][] = [
						'key' => $metadata->get_id(),
						'value' => [$user->id],
						'compare' => 'IN'
					];
				}
			}
			else
			{
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

function IPHAN_tainacan_fetch_collections_args($args, $user)
{
	$roles = $user->roles;
	$exist_restrictive_roles = !empty(array_intersect(IPHAN_get_restrictive_roles(), $roles));

	if ($exist_restrictive_roles)
	{
		$repositories_metadata = \tainacan_metadata();
		$col_restrictive_ids = IPHAN_get_restrictive_ids('collections');
		if($col_restrictive_ids === false)
		{
			$args['post__in'] = [-1];

		}
		$metadatas = $repositories_metadata->fetch(
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
			), 'OBJECT'
		);
		if ( empty($metadatas) )
		{
			$args['post__in'] = [-1];
		}
		else
		{
			$collections_ids = array_map( function($el) { return $el->get_collection_id(); }, $metadatas );
			$args['post__in'] = $collections_ids;
		}
	}
	$col_ids = IPHAN_get_collections_access_by_user();
	if ($col_ids !== false )
	{
		if( isset($args['post__in']) ) $col_ids = array_merge($col_ids, $args['post__in']);
		$args['post__in'] = $col_ids;
	}
	return $args;
}

function IPHAN_tainacan_fetch_args($args, $type)
{
	$user = \wp_get_current_user();
	if( $type == 'items')
	{
		$args = IPHAN_tainacan_fetch_items_args($args, $user);
	}
	elseif( $type == 'collections' )
	{
		$args = IPHAN_tainacan_fetch_collections_args($args, $user);
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
		tainacan_register_admin_hook( 'role', 'tainacan_set_role_to_restrict_access_items_form', 'end-right' );
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
				<h4><?php _e( 'Opções do IPHAN-INRC', 'iphan_inrc' ); ?></h4>
				<hr>
			</div>
			<div
				class="field"
				style="margin: 0.5em 0;">
				<label class="label">
					<?php _e('Restringir acesso dos usuários', 'iphan_inrc'); ?>
					<span class="help-wrapper">
						<a class="help-button has-text-secondary">
							<span class="icon is-small">
								<i class="tainacan-icon tainacan-icon-help"></i>
							</span>
						</a>
						<div class="help-tooltip">
							<div class="help-tooltip-header">
								<h5 class="has-text-color"><?php _e('Restringir acesso', 'iphan_inrc'); ?></h5>
							</div>
							<div class="help-tooltip-body">
								<p><?php _e('Ao ativar a restrição de acessos os usuários listados nesse metadado terão seu acesso aos itens restringido.', 'iphan_inrc'); ?></p>
							</div>
						</div>
					</span>
				</label>
				<div class="control is-expanded">
					<span class="select is-fullwidth">
						<select name="set_user_to_restrict_access" id="set-user-to-restrict-access-select">
							<option value="yes"><?php _e('Sim', 'iphan_inrc'); ?></option>
							<option value="no"><?php _e('Não', 'iphan_inrc'); ?></option>
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
	if ( !$metadatum->can_edit() || !function_exists( 'tainacan_get_api_postdata' ) ) {
		return;
	}

	$post = \tainacan_get_api_postdata();
	$set_user_to_restrict_access = isset($post->set_user_to_restrict_access) ? 'yes' == $post->set_user_to_restrict_access : false;
	update_post_meta( $metadatum->get_id(), 'set_user_to_restrict_access', $set_user_to_restrict_access ? 'yes' : 'no');
}

function tainacan_set_role_to_restrict_access_items_form()
{
	$repositories_collections = \tainacan_collections();
	$collections = $repositories_collections->fetch([], 'OBJECT');
	ob_start();
	?>
		<div class="name-edition-box tainacan-set-role-to-restrict-access">
			<label for="set_role_to_restrict_access"><?php _e('Restringir acesso dos itens aos que podem ser editados', 'iphan_inrc'); ?></label>
			<select name="set_role_to_restrict_access" id="set-user-to-restrict-access-select">
				<option value="yes"><?php _e('Sim', 'iphan_inrc'); ?></option>
				<option value="no"><?php _e('Não', 'iphan_inrc'); ?></option>
			</select>
		</div>
		<br>
		<div class="name-edition-box tainacan-collections_access_by_role" >
			<h2 style="margin-bottom: -1em; font-size: 0.875rem;"><?php _e('Restringir acesso apenas ao seguinte conjunto de coleções:', 'iphan_inrc'); ?></h2>
			<ul class="collections-container capabilities-list" style="justify-content: flex-start; 0 0.5em 0.5em;">
				<?php foreach($collections as $col): ?>
					<li style="flex-basis: 400px; margin-right: unset;">
						<span class="check-column">
							<label for="<?php echo $col->get_id(); ?>" class="screen-reader-text">
								<?php echo $col->get_name(); ?>
							</label>
							<input type="checkbox" name="collections_access_by_role" id="<?php echo $col->get_id(); ?>" value="<?php echo $col->get_id(); ?>">
						</span>
						<span class="name column-name">
							<?php echo $col->get_name(); ?>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
			<p><span class="dashicons dashicons-info"></span><?php _e('Se nenhuma coleção for marcada, todas as com direito de acesso serão vistas obedecendo seu status.', 'iphan_inrc'); ?></p>
		</div>
		<br>
		<div class="name-edition-box tainacan-admin-options-by-role" >
			<h2 style="margin-bottom: -1em; font-size: 0.875rem;"><?php _e('Opções de customização da interface administrativa', 'iphan_inrc'); ?></h2>
			<div class="admin-options-container capabilities-list" style="justify-content: flex-start;">
				<?php foreach(IPHAN_TAINACAN_ADMIN_OPTIONS as $tainacan_admin_options_group_name => $tainacan_admin_options_group) : ?>
					<div 
							style="flex-basis: 400px; margin-right: unset;"
							class="capability-group">
						<h3><?php _e($tainacan_admin_options_group_name, 'iphan_inrc'); ?></h3>
						<ul>
							<?php foreach($tainacan_admin_options_group as $tainacan_admin_available_option_value => $tainacan_admin_available_option_label) : ?>
								<li style="width: 100%">
									<span class="check-column">
										<label for="<?php echo $tainacan_admin_available_option_value ?>" class="screen-reader-text">
											<?php _e($tainacan_admin_available_option_label, 'iphan_inrc'); ?>
										</label>
										<input type="checkbox" name="tainacan_admin_options_by_role" id="<?php echo $tainacan_admin_available_option_value ?>" value="<?php echo $tainacan_admin_available_option_value ?>">
									</span>
									<span class="name column-name">
										<?php _e($tainacan_admin_available_option_label, 'iphan_inrc'); ?>
									</span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	<?php
	return ob_get_clean();
}

\add_action( 'tainacan-api-role-prepare-for-response', 'tainacan_set_role_to_restrict_access_items_create', 10, 2 );
function tainacan_set_role_to_restrict_access_items_create($role, $request) {

	$slug = $role['slug'];
	$roles = get_option('IPHAN_set_role_to_restrict_access', []);
	$roles_collections = get_option('IPHAN_collections_access_by_role', []);
	$admin_options_collections = get_option('IPHAN_tainacan_admin_options_by_role', []);
	$roles_collections = is_array($roles_collections) ? $roles_collections : [];
	$admin_options_collections = is_array($admin_options_collections) ? $admin_options_collections : [];

	if( $request->get_method() != 'GET')
	{
		if ( isset($request['collections_access_by_role']) )
		{
			$update_col = $request['collections_access_by_role'];
			update_option('IPHAN_collections_access_by_role', array_merge($roles_collections, [ $slug => $update_col ] ) );
			$role['collections_access_by_role'] = $update_col;
		}
		else
		{
			if( isset($roles_collections[$slug]) ) unset($roles_collections[$slug]);
			update_option('IPHAN_collections_access_by_role', $roles_collections );
		}

		if( isset($request['set_role_to_restrict_access']) )
		{
			if ($request['set_role_to_restrict_access'] == 'yes')
			{
				update_option('IPHAN_set_role_to_restrict_access', array_merge($roles, [ $slug ] ) );
				$role['set_role_to_restrict_access'] = 'yes';
			}
			else
			{
				update_option('IPHAN_set_role_to_restrict_access', array_filter($roles, function($el) use ($slug) { return $el != $slug; } ) );
				$role['set_role_to_restrict_access'] = 'no';
			}
		}

		if( isset($request['tainacan_admin_options_by_role']) )
		{
			$update_options = $request['tainacan_admin_options_by_role'];
			update_option('IPHAN_tainacan_admin_options_by_role', array_merge($admin_options_collections, [ $slug => $update_options ] ) );
			$role['tainacan_admin_options_by_role'] = $update_options;
		}
		else
		{
			if( isset($admin_options_collections[$slug]) ) unset($admin_options_collections[$slug]);
			update_option('IPHAN_tainacan_admin_options_by_role', $admin_options_collections );
		}
	}
	else
	{
		$set_role = in_array($slug, $roles);
		$collections_role =  isset($roles_collections[$slug]) ? $roles_collections[$slug] : [];
		$admin_options_collections = isset($admin_options_collections[$slug]) ? $admin_options_collections[$slug] : [];
		$role['collections_access_by_role'] = $collections_role;
		$role['set_role_to_restrict_access'] = $set_role ? 'yes' : 'no';
		$role['tainacan_admin_options_by_role'] = $admin_options_collections;
	}
	return $role;
}

?>