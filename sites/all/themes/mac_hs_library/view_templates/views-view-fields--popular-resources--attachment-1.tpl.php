<?php
$tab_id = mcmaster_hs_library_format_section_name($fields['title']->content);
?>
<div class="tab-pane <?php if ($fields['counter']->content == 1) { echo 'active'; } ?>" id="<?php echo $tab_id; ?>" role="tabpanel" aria-labelledby="<?php echo $tab_id; ?>-tab" aria-expanded="<?php if ($fields['counter']->content == 1) { echo 'true'; } else { echo 'false'; } ?>">
	<?php
	// render the node ...
	$this_node = node_load($fields['nid']->content);
	$node_view = node_view($this_node);
	$rendered = drupal_render($node_view);
	echo $rendered;
	?>
</div>