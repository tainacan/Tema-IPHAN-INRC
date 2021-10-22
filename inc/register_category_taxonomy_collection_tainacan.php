<?php
namespace IPHAN_INRC;

class IPHANCategoryCollection {
	use Singleton;

	public $taxonomy_category = 'tainacan_collection_iphan_taxonomy_category';

	protected function init() {
		add_action( 'tainacan-register-admin-hooks', array( $this, 'register_hook' ) );
		add_action( 'tainacan-insert-tainacan-collection', array( $this, 'save_data' ) );
		add_filter( 'tainacan-api-response-collection-meta', array( $this, 'add_meta_to_response' ), 10, 2 );
		add_action( 'init', array( &$this, "register_taxonomy_category" ), 15);
	}

	function register_hook() {
		if ( function_exists( 'tainacan_register_admin_hook' ) ) {
			tainacan_register_admin_hook( 'collection', array( $this, 'form' ) );
		}
	}

	function save_data( $object ) {
		if ( ! function_exists( 'tainacan_get_api_postdata' ) ) {
			return;
		}
		$post = tainacan_get_api_postdata();
		if ( $object->can_edit() ) {
			if ( isset( $post->{$this->taxonomy_category} ) ) {
				update_post_meta( $object->get_id(), $this->taxonomy_category, $post->{$this->taxonomy_category});
				
				$terms = wp_get_object_terms( $object->get_id(), 'category');
				$terms_ID  = [];
				foreach ($terms as $term) {
					$terms_ID[] = $term->term_id;
				}
				wp_remove_object_terms( $object->get_id(), $terms_ID, 'category' );
				wp_set_object_terms( $object->get_id(), $post->{$this->taxonomy_category}, 'category');
			}
		}
	}

	function add_meta_to_response( $extra_meta, $request ) {
		$extra_meta = array(
			$this->taxonomy_category,
		);
		return $extra_meta;
	}

	function register_taxonomy_category() {
		register_taxonomy_for_object_type( 'category', 'tainacan-collection' );
	}

	function form() {
		if ( ! function_exists( 'tainacan_get_api_postdata' ) ) {
				return '';
		}
		$args = array(
			"hide_empty" => 0,
			"orderby"   => "name",
			"order"     => "ASC"
		);
		$categories = get_categories($args);
		ob_start();
		?>
			<div class="field tainacan-collection--section-header">
				<label class="label">Tipo:</label>
				<div class="control is-clearfix">
					<?php foreach ($categories as $category): ?>
						<input type="checkbox" name="<?php echo $this->taxonomy_category; ?>" value="<?php echo $category->slug;?>">
						<?php echo $category->name; ?><br>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	function get_iphan_control_collections() {
		$collections_repository = \Tainacan\Repositories\Collections::get_instance();
		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => 'control'
				)
			)
		);
		$collections = $collections_repository->fetch($args, 'OBJECT');
		return $collections;
	}

}

IPHANCategoryCollection::get_instance();

