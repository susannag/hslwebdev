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
	?>
	<?php
	if (node_access("update", $node) === TRUE) {
		echo '<a class="btn btn-admin" id="edit-node-' . $node->nid . '" href="/node/' . $node->nid . '/edit">Edit</a>';
	}
	?>
	</div>
</div>