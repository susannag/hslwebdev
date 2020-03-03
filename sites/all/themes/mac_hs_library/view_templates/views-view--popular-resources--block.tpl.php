<section class="search--hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3>Popular Resources</h3>
				<?php if ($rows): ?>
					<?php print $rows; ?>
				<?php endif; ?>
				<?php if ($attachment_after): ?>
					<?php print $attachment_after; ?>
				<?php endif; ?>
				
<?php
$node = menu_get_object();
$destination = '/';
if (!empty($node->nid)) {
	$destination = 'node/' . $node->nid;
}
if (user_access('create find_resource content')) {
	echo '<a class="btn btn-admin" href="/node/add/popular-resource-tab?';
	echo "destination=" . $destination;
	echo '">Add a Popular Resource Tab</a>';
}
if ((user_access('access draggableviews')) && (count($view->result) > 1)) {
	echo '<a class="btn btn-admin" href="/admin/sort/popular-resources?';
	echo "destination=" . $destination;
	echo '">Order Popular Resource Tabs</a>';
}

?>				
				
			</div>
		</div>
	</div>
</section>