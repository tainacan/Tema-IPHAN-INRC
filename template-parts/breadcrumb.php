<?php
// Breadcrumbs
function custom_breadcrumbs()
{
    $showOnFrontPage = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '<span class="separator">/</span>'; // delimiter between crumbs
    $home = __('Início', 'iphan_inrc'); // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current text-black">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = esc_url(home_url());

    if (is_front_page()) {

        if ($showOnFrontPage == 1) echo '<nav aria-label="breadcrumb" class="breadcrumb d-none d-md-flex border-bottom-0 max-large margin-one-column"><div class="site-container"><i class="tainacan-icon tainacan-icon-home">&nbsp;</i><a href="' . $homeLink . '">' . $home . '</a></div></nav>';
    } else {

        echo '<nav aria-label="breadcrumb" class="breadcrumb d-md-flex border-bottom-0 max-large margin-one-column"><div class="site-container"><i class="tainacan-icon tainacan-icon-home"></i><a href="' . $homeLink . '">' . $home . '</a>&nbsp;' . $delimiter . '&nbsp;';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, '&nbsp;' . $delimiter . '&nbsp;');
            echo $before . __('Listagem da categoria  "', 'iphan_inrc') . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . __('Resultados de busca para "', 'iphan_inrc') . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a>' . $delimiter . '&nbsp;';
            echo '<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_time('F') . '</a>' . $delimiter . '&nbsp;';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a>&nbsp;' . $delimiter . '&nbsp;';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;

                // Check if this is a tainacan item.
				$collections_post_types = defined('TAINACAN_VERSION') ? \Tainacan\Repositories\Repository::get_collections_db_identifiers() : array();
                if (in_array(get_post_type(), $collections_post_types) && !is_page() && get_post_type() != 'tainacan-collection') {
                    echo '<a href="' . esc_url(get_post_type_archive_link('tainacan-collection')) . '">';
                    _e('Coleções', 'iphan_inrc');
                    echo '</a>&nbsp;' . $delimiter . '&nbsp;';
                }
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) echo '&nbsp;' . $delimiter . '&nbsp;' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                if ($cat === null) {
                    $cat = 1;
                }
                $cats = get_category_parents($cat, TRUE, '&nbsp;' . $delimiter . '&nbsp;');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s $delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if (is_tax()) {
                $term = get_queried_object();
                $taxonomy = get_taxonomy($term->taxonomy);
                echo $taxonomy->labels->name;
                // Create a list of all the term's parents
                $parent = $term->parent;
                while ($parent) :
                    $new_parent = get_term_by('id', $parent, get_query_var('taxonomy'));
                    $parents[] = $new_parent;
                    $parent = $new_parent->parent;
                endwhile;
                if (!empty($parents)) :
                    $parents = array_reverse($parents);
                    // For each parent, create a breadcrumb item

                    foreach ($parents as $parent) :
                        //$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
                        $url = get_term_link($parent);
                        echo '&nbsp;' . $delimiter . '&nbsp;';
                        echo '<a href="' . esc_url($url) . '">' . $parent->name . '</a>';
                    endforeach;
                endif;
                // Display the current term in the breadcrumb
                echo '&nbsp;' . $delimiter . '&nbsp;';
                echo $before . $term->name . $after;
            } elseif(!is_tax() && get_post_type() != 'tainacan-collection') {

				// Check if this is a tainacan item.
				$collections_post_types = defined('TAINACAN_VERSION') ? \Tainacan\Repositories\Repository::get_collections_db_identifiers() : array();
				if (in_array(get_post_type(), $collections_post_types)) {
					echo '<a href="'. esc_url(get_post_type_archive_link('tainacan-collection')) .'">';
				        _e( 'Coleções', 'iphan_inrc' );
				    echo '</a>&nbsp;' . $delimiter . '&nbsp;';
				}
				
				if (is_post_type_archive()) {
					$str = $post_type->labels->singular_name;
				} else {
					$str = __('Todos os itens', 'iphan_inrc');
				}
				echo $before . $str . $after;
			} else {
			    if ( is_archive() ) {
			        $str = __( 'Coleções', 'iphan_inrc' );
                } else {
				    $str = $post_type->labels->singular_name;
                }
				echo $before . $str . $after;
            }
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, '&nbsp;' . $delimiter . '&nbsp;');
            echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo '&nbsp;' . $delimiter . '&nbsp;' . $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1) echo '&nbsp;' . $delimiter . '&nbsp;';
            }
            if ($showCurrent == 1) echo '&nbsp;' . $delimiter . '&nbsp;' . $before . get_the_title() . $after;
        } elseif (is_tag()) {
            echo $before . __('Publicações marcadas "', 'iphan_inrc') . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . __('Artigos publicados por ', 'iphan_inrc') . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . __('Erro 404', 'iphan_inrc') . $after;
        } else {
            echo $before . get_the_archive_title() . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo '&nbsp;(';
            echo __('Página', 'iphan_inrc') . '&nbsp;' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }

        if (defined('TAINACAN_VERSION')) {
            $theme_helper = \Tainacan\Theme_Helper::get_instance();

            if (get_post() && $theme_helper->is_post_an_item(get_post()) && is_single() && get_theme_mod('tainacan_single_item_show_navigation_options', false)) {

                $adjacent_links = tainacan_get_adjacent_item_links();
                $previous = $adjacent_links['previous'];
                $next = $adjacent_links['next'];

                if ($previous !== '' || $next !== '') {
?>
                    <div id="breadcrumb-single-item-pagination" class="ml-auto d-flex align-items-center">
                        <div class="pagination">
                            <?php echo $previous; ?>
                        </div>
                        <div class="pagination">
                            <?php echo $next; ?>
                        </div>
                        <div class="pagination">
                            <a href="<?php echo tainacan_get_source_item_list_url(); ?>"><i class="tainacan-icon tainacan-icon-viewtable tainacan-icon-1-25em"></i></a>
                        </div>
                    </div>
<?php
                }
            }
        }

        echo '</div></nav>';
    }
}
