<?php
$SECTIONS = array();
$sections_view = views_get_view_result('page_sections','block',$node->nid);
foreach ($sections_view as $x => $v) {
	$n = node_load($v->nid);
	if (node_access('view', $n)) {
		$SECTIONS[$v->nid] = $n;
		$tab_id = mcmaster_hs_library_format_section_name($SECTIONS[$v->nid]->title);
		$SECTIONS[$v->nid]->tab_id = $tab_id;
	}
}

if (empty($SECTIONS)) {
	// create a section - it must have at least 1 even if empty
	mcmaster_hs_library_create_section($node);
}
else {
	if (count($SECTIONS) == 1) {
		$nid = key($SECTIONS);
		echo '<div class="content-sidebar--no-tabs">';
		foreach ($SECTIONS as $x => $section) {
			$section_view = node_view($section);
			echo drupal_render($section_view);
		}
		echo '</div>';
	}
	else {
		echo '<div class="row"><div class="col-sm-12">';
		echo '<ul class="nav nav-tabs d-none d-md-flex" id="singlePageTab" role="tablist">';
		$active = false;
		foreach ($SECTIONS as $x => $section) {
			$tab_title = (!empty($section->field_tab_title[LANGUAGE_NONE][0]['value']) ? $section->field_tab_title[LANGUAGE_NONE][0]['value'] : $section->title);
			echo '<li class="nav-item">';
				echo '<a class="nav-link';
				if (!$active) { echo ' active'; $active = true; }
				echo '" id="' . $section->tab_id . '-tab" data-toggle="tab" href="#' . $section->tab_id . '" role="tab" aria-controls="' . $section->tab_id . '">' . $tab_title . '</a>';
			echo '</li>';
		}
		echo '</ul>';


		echo '<div class="select-wrapper pop-res mx-auto d-md-none">';
		echo '<select class="custom-select pop-res form-control d-md-none" id="tab_selector" role="tablist">';
      echo '<option value="">Section Menu</option>';
		foreach( $SECTIONS as $x => $section ) {
			$tab_title = (!empty($section->field_tab_title[LANGUAGE_NONE][0]['value']) ? $section->field_tab_title[LANGUAGE_NONE][0]['value'] : $section->title);
			echo '<option value="' . $section->tab_id . '">' . $tab_title . '</option>';
		}
		echo '</select></div>'; //closing tags

		echo '<div class="tab-content" id="singlePageTabContent">';
		$active = false;
		foreach ($SECTIONS as $x => $section) {
			echo '<div class="tab-pane fade';
			if (!$active) { echo ' active show'; $active = true; }
			if (!empty($section->field_has_sidebar_content[LANGUAGE_NONE][0]['value'])) {
				echo ' no-padding-bottom no-padding-top';
			}
			echo '" id="' . $section->tab_id . '" role="tabpanel" aria-labelledby="' . $section->tab_id . '-tab">';

			$section_view = node_view($section);
			echo drupal_render($section_view);

			echo '</div>';
		}
		echo '</div>';
		echo '</div></div>';
	}
}

// embed any highlight box modals if needed
$hb_modal_view = views_get_view_result('highlight_boxes','block_1',$node->nid);
// echo '<pre>' . print_r($hb_modal_view,true) . '</pre>';

foreach ($hb_modal_view as $x => $v) {
	$modal_title = mcmaster_hs_library_format_section_name($v->node_title);
	?>

	<div class="modal fade" id="modal-<?php echo $v->nid; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal_title; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="<?php echo $modal_title; ?>"><?php echo $v->node_title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $v->field_body[0]['rendered']['#markup']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<?php

}

?>
