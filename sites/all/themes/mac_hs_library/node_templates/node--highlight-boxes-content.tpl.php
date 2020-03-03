<?php
if ($page) {
	$section_nid = $node->field_section[LANGUAGE_NONE][0]['target_id'];
	if (!empty($section_nid)) {
		drupal_goto('node/' . $section_nid);
	}
}
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<?php if (!empty($node->field_hide_title[LANGUAGE_NONE][0]['value'])) {
	  echo '<h3 class="sr-only">' . $title . '</h3>';
	}
	else { ?>
	<?php print render($title_prefix); ?>
	<h3<?php print $title_attributes; ?>><?php print $title; ?></h3>
	<?php print render($title_suffix); ?>
	<?php } ?>
	<div class="section-content"<?php print $content_attributes; ?>>
    <?php
		hide($content['comments']);
		hide($content['links']);
		print render($content);
		
		// embed the view of boxes
		$HB = array();
		$hboxes_view = views_get_view_result('highlight_boxes','block',$node->nid);
		foreach ($hboxes_view as $x => $v) {
			$HB[$v->nid] = node_load($v->nid);
			if (!$HB[$v->nid]->status) {
				unset($HB[$v->nid]);
			}
		}
		
		
		echo '<div class="row cards-row">';
		// echo views_embed_view('highlight_boxes','block',$node->nid); 
		foreach ($HB as $x => $box) {
			$box_view = node_view($box);
			echo drupal_render($box_view);
		}
		echo '</div>';
		
		// show add/reorders admin links
		if (node_access("update", $node) === TRUE) {
			echo '<a class="btn btn-admin" href="/node/add/highlight-box?field_hightlight_box_content=' . $node->nid . '">Add Highlight Box</a>';
		
			if (count($HB) > 1) {
				echo '<a class="btn btn-admin" href="/admin/sort/highlight-boxes/' . $node->nid . '?destination=node/' . $node->nid . '">Re-order Boxes</a>';
			}
		}
		
	if (node_access("update", $node) === TRUE) {
		echo '<a class="btn btn-admin" id="edit-node-' . $node->nid . '" href="/node/' . $node->nid . '/edit">Edit</a>';
	}
	?>
	</div>
</div>