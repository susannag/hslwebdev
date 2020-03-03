<?php
// go to parent page if viewed
if ($page) {
	$page_nid = $node->field_parent_page[LANGUAGE_NONE][0]['target_id'];
	if (!empty($page_nid)) {
		drupal_goto('node/' . $page_nid);
	}
}

$SC = array(); // section content
$scontent_view = views_get_view_result('section_content','block',$node->nid);
foreach ($scontent_view as $x => $v) {
	$n = node_load($v->nid);
	if (node_access('view', $n)) {
		$SC[$v->nid] = $n;
	}
}

$SB = array(); // sidebar content
$sidebar_view = views_get_view_result('section_content','block_1',$node->nid);
foreach ($sidebar_view as $x => $v) {
	$n = node_load($v->nid);
	if (node_access('view', $n)) {
		$SB[$v->nid] = $n;
	}
}

if (!empty($node->field_has_sidebar_content[LANGUAGE_NONE][0]['value'])) { 
?>
<section class="content-sidebar">
	<div class="row">
		<div class="col-md-8 content">
<?php 
}
else {
?>
<div class="row">
	<div class="col-md-12">
<?php	
}

	if (!empty($node->field_hide_title[LANGUAGE_NONE][0]['value'])) {
		echo '<h2 class="sr-only">' . $title . '</h2>';
	}
	else {
		print render($title_prefix);
		echo '<h2' . $title_attributes . '>' . $title . '</h2>';
		print render($title_suffix);
	}
			
	if (!empty($SC)) {
		foreach ($SC as $x => $sc) {
			$s_content_view = node_view($sc);
			echo drupal_render($s_content_view);
		}
	}
			
	if (node_access("update", $node) === TRUE) {
	?>
	<div class="dropdown">
		<button class="btn btn-admin dropdown-toggle" type="button" id="adminMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
		<div class="dropdown-menu" aria-labelledby="adminMenuButton">
			<a class="dropdown-item" href="/node/<?php echo $node->nid; ?>/edit">Edit this Section</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="/node/add/text-content?field_section=<?php echo $node->nid; ?>">Add Text</a>
			<a class="dropdown-item" href="/node/add/accordion-content?field_section=<?php echo $node->nid; ?>">Add Accordion Items</a>
			<a class="dropdown-item" href="/node/add/highlight-boxes-content?field_section=<?php echo $node->nid; ?>">Add Highlight Boxes</a>
			<div class="dropdown-divider"></div>
			<?php if (count($SC) > 1) { ?>
				<a class="dropdown-item" href="/admin/sort/section-content/<?php echo $node->nid; ?>?destination=node/<?php echo $node->field_parent_page[LANGUAGE_NONE][0]['target_id']; ?>">Re-order Content</a>
				<div class="dropdown-divider"></div>
			<?php } ?>
			<a class="dropdown-item" href="/node/add/page-section?field_parent_page=<?php echo $node->field_parent_page[LANGUAGE_NONE][0]['target_id']; ?>">Add New Section</a>
			<a class="dropdown-item" href="/admin/sort/page-sections/<?php echo $node->field_parent_page[LANGUAGE_NONE][0]['target_id']; ?>?destination=node/<?php echo $node->field_parent_page[LANGUAGE_NONE][0]['target_id']; ?>">Re-order Sections</a>
		</div>
	</div>
	<?php
	}
	
if (!empty($node->field_has_sidebar_content[LANGUAGE_NONE][0]['value'])) {
?>
	</div>
	<div class="col-md-4 sidebar background--gradient">
		<div class="row">
		<?php
		// show social media if the parent has any social media fields set_error_handler
		echo views_embed_view('social_media','block',$node->field_parent_page[LANGUAGE_NONE][0]['target_id']);
		
		if (!empty($SB)) {
			foreach ($SB as $x => $sb) {
				$sb_content_view = node_view($sb);
				echo drupal_render($sb_content_view);
			}
		}
		
		if (isset($_SESSION['sections'][$node->nid]['related_areas_sidebar'])) {
			echo views_embed_view('related_areas','block_1',$node->field_parent_page[LANGUAGE_NONE][0]['target_id']);
			unset($_SESSION['sections'][$node->nid]['related_areas_sidebar']);
		}
		
		if (isset($_SESSION['sections'][$node->nid]['related_services_sidebar'])) {
			echo views_embed_view('services','block_5',$node->field_parent_page[LANGUAGE_NONE][0]['target_id']);
			unset($_SESSION['sections'][$node->nid]['related_services_sidebar']);
		}
		
		if (node_access("update", $node) === TRUE) {
		?>
		<div class="col-sm-12">
			<div class="dropdown">
				<button class="btn btn-admin dropdown-toggle" type="button" id="adminMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sidebar Actions</button>
				<div class="dropdown-menu" aria-labelledby="adminMenuButton">
				<a class="dropdown-item" href="/node/add/sidebar-text-content?field_section=<?php echo $node->nid; ?>">Add Text</a>
				<a class="dropdown-item" href="/node/add/sidebar-links?field_section=<?php echo $node->nid; ?>">Add Links</a>
				<?php if (count($SB) > 1) { ?>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/admin/sort/sidebar-section-content/<?php echo $node->nid; ?>?destination=node/<?php echo $node->field_parent_page[LANGUAGE_NONE][0]['target_id']; ?>">Re-order Sidebar Content</a>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php
		}
		?>		
		</div>
	</div>
	</div>
</section>
			
<?php 
}
else {
?>
	</div>
</div>
<?php	
}
?>