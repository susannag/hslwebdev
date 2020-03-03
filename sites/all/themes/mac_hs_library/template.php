<?php

function mac_hs_library_preprocess_html(&$variables) {
  drupal_add_css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('type' => 'external'));
}

function mac_hs_library_preprocess_page(&$vars, $hook) {
	$vars['show_title'] = TRUE;
	if (drupal_is_front_page()) {
		unset($vars['page']['content']['system_main']['default_message']); //will remove message "no front page content is created"
		// drupal_set_title('');
		$vars['show_title'] = FALSE;
	}

	if (!empty($vars['node']) && (($vars['node']->type == 'page')||($vars['node']->type == 'news')||($vars['node']->type == 'popular_resource_tab'))) {
		$vars['show_title'] = FALSE;
	}

	$viewport = array(
	   '#tag' => 'meta',
	   '#attributes' => array(
	     'name' => 'viewport',
	     'content' => 'width=device-width, initial-scale=1, maximum-scale=1',
	   ),
	  );
	drupal_add_html_head($viewport, 'viewport');
}

function mac_hs_library_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    //$output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';
	$output = '<ol class="breadcrumb">';

	$array_size = count($breadcrumb);
    $i = 0;
    while ( $i < $array_size) {
		$output .= '<li class="breadcrumb-item">' . $breadcrumb[$i] . '</li>';
		$i++;
    }
    $output .= '</ol>';
    return $output;
  }
}


function mac_hs_library_page_header($node) {
	if (empty($node)) {
		return '';
	}
	$sidebar = false;
	if (
		(!empty($node->field_call_to_action_text[LANGUAGE_NONE][0]['value'])) ||
		(!empty($node->field_call_to_action_button[LANGUAGE_NONE][0])) ||
		(!empty($node->field_call_to_action_video[LANGUAGE_NONE][0])) ||
		(!empty($node->field_call_to_action_image[LANGUAGE_NONE][0]))
	) {
		$sidebar = true;
	}
	if ($node->type == 'news') {
		$sidebar = true;
	}

	$page_header = '';
	$col_class = 'col-sm-12';

	if ($sidebar) {
		$col_class = 'col-xl-8 col-lg-7';
	}

	$page_header .= '<div class="' . $col_class .'">';
	$page_header .= '<h1 class="mb-0">' . $node->title . '</h1>';

	$field_view = field_view_field('node', $node, 'field_intro_text',  array('label'=>'hidden'));
	$page_header .= drupal_render($field_view);

	// include an edit button
	if (node_access("update", $node) === TRUE) {
		$page_header .= '<a class="btn btn-admin" href="/node/' . $node->nid . '/edit">Edit</a>';
	}

	$page_header .= '</div>';

	if ($sidebar) {
		$page_header .= '<div class="col-xl-4 col-lg-5 sidebar">';
		if ($node->type == 'news') {
			$field_view = field_view_field('node', $node, 'field_news_date',  array('label'=>'hidden'));
			$page_header .= drupal_render($field_view);
			/*
			$field_view = field_view_field('node', $node, 'field_news_category',  array('label'=>'hidden'));
			drupal_set_message('<pre>' . print_r($field_view,true) . '</pre>');
			$page_header .= drupal_render($field_view);
			*/
		}
		else {
			if (!empty($node->field_call_to_action_video[LANGUAGE_NONE][0])) {
				/*
				$page_header .= '<div class="videoWrapper">';
				$page_header .= '<iframe width="560" height="349" src="http://www.youtube.com/embed/n_dZNLr2cME?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>';
				$page_header .= '</div>';
				*/
				$field_view = field_view_field('node', $node, 'field_call_to_action_video',  array('label'=>'hidden'));
				$field_view['#prefix'] = '<div class="videoWrapper">';
				$field_view['#suffix'] = '</div>';
				$page_header .= drupal_render($field_view);

			} elseif ( $node->field_call_to_action_image[LANGUAGE_NONE][0] ) {
				$field_view = field_view_field('node', $node, 'field_call_to_action_image',  array('label'=>'hidden'));
				$field_view['#prefix'] = '<div class="imageWrapper">';
				$field_view['#suffix'] = '</div>';
				$page_header .= drupal_render($field_view);
			}
			$field_view = field_view_field('node', $node, 'field_call_to_action_text',  array('label'=>'hidden'));
			$page_header .= drupal_render($field_view);
			$field_view = field_view_field('node', $node, 'field_call_to_action_button',  array('label'=>'hidden'));
			$page_header .= drupal_render($field_view);
		}
		$page_header .= '</div>';
	}

	echo $page_header;

}


function mac_hs_library_field__field_intro_text($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return '<div class="lead">' . $output . '</div>';
}


function mac_hs_library_field__field_accordion_title($variables) {
	return trim(drupal_render($item));
}

function mac_hs_library_bw_menu($menu) {
	if (!empty($menu)) {
		$menu_tree = menu_tree_all_data($menu, $link = NULL, $max_depth = 2);
		menu_tree_add_active_path($menu_tree); // this function requires menu_block module

		$menu_pre = '<ul class="navbar-nav nav--padding-md nav mr-auto">';

		echo $menu_pre;

		foreach ($menu_tree as $l => $v) {
			$icon = '';
			if ((!$v['link']['hidden'])&&($v['link']['access'])) {
				echo '<li class="nav-item dropdown';
				if ($v['link']['in_active_trail']) { echo ' active'; }
				echo '">';

				if (!empty($v['below'])) {
					$path = '#';
				}
				else if ($v['link']['link_path'] == '<front>') {
					$path = $GLOBALS['base_url'];
					$icon = '<svg id="house" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.7 12.2"><style>.home-icon{fill:none;stroke:#FFFFFF;stroke-miterlimit:10;}</style><path class="home-icon" d="M2.2 5.2v6.5h2.7V7.5h2.9v4.2h2.7V5.2"></path><path class="home-icon" d="M.4 7.1l6-6.4 6 6.4"></path></svg>';
				}
				else {
					// if a fully qualified URL then use it
					if (valid_url($v['link']['link_path'], TRUE)) {
						$path = $v['link']['link_path'];
					}
					else {
						$path = base_path();
						$path .= drupal_get_path_alias($v['link']['link_path']);
					}
				}

				if (!empty($v['below'])) {
					echo '<a href="' . $path . '" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>' . $icon . $v['link']['link_title'] . ' <svg id="chevron" class="svg-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.7 4.1"> <style>.chevron{fill:none;stroke:#fff;stroke-miterlimit:10;}</style> <path class="chevron" fill="#fff" d="M6.4.4l-3 3-3-3"></path> </svg></span></a>';
				}
				else {
					echo '<a href="' . $path . '" class="nav-link"><span>' . $icon . $v['link']['link_title'] . '</span></a>';
				}
				if (!empty($v['below'])) {
					echo '<div class="dropdown-menu">';
					foreach ($v['below'] as $x => $y) {
						if ((!$y['link']['hidden'])&&($y['link']['access'])) {
							$ypath = '';
							if ($y['link']['link_path'] == '<front>') {
								$ypath = $GLOBALS['base_url'];
							}
							else {
								// if a fully qualified URL then use it
								if (valid_url($y['link']['link_path'], TRUE)) {
									$ypath = $y['link']['link_path'];
								}
								else {
									$ypath = base_path();
									$ypath .= drupal_get_path_alias($y['link']['link_path']);
								}
							}

							echo '<a class="dropdown-item" href="' . $ypath . '"';
							if ($y['link']['in_active_trail']) { echo ' class="active"'; }
							echo '>' . $y['link']['link_title'] . '</a>';
						}
					}
					echo '</div>';
				}
				echo '</li>';

			}
		}

		$menu_post = '</ul>';

		echo $menu_post;
	}
}


function mac_hs_library_catalogue_menu() {
	$menu_tree = menu_tree_all_data('menu-search-help-menu', $link = NULL, $max_depth = 1);
	// watchdog('mps','<pre>' . print_r($menu_tree,true) . '</pre>');

	foreach ($menu_tree as $l => $v) {
		if ((!$v['link']['hidden'])&&($v['link']['access'])) {
			if (valid_url($v['link']['link_path'], TRUE)) {
					$path = $v['link']['link_path'];
			}
			else {
				$path = base_path();
				$path .= drupal_get_path_alias($v['link']['link_path']);
			}
			echo '<a href="' . $path . '" class="btn btn-outline-dark btn-arrow-right">' . $v['link']['link_title'] . '</a>';
		}
	}
}
