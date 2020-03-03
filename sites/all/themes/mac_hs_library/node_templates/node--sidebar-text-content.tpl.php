<?php
if ($page) {
	$section_nid = $node->field_section[LANGUAGE_NONE][0]['target_id'];
	if (!empty($section_nid)) {
		drupal_goto('node/' . $section_nid);
	}
}
?>
<div class="col-sm-12">
<div class="dyk-card">
	<?php if (!empty($node->field_hide_title[LANGUAGE_NONE][0]['value'])) { ?>
	<h4 class="sr-only"><?php echo $title; ?></h4>
	<?php } else { ?>
	<h4><?php echo $title; ?></h4>
	<?php } ?>
	<?php print render($content); ?>
	<?php
	if (node_access("update", $node) === TRUE) {
		echo '<a class="btn btn-admin" id="edit-node-' . $node->nid . '" href="/node/' . $node->nid . '/edit">Edit</a>';
	}
	?>
</div>
</div>