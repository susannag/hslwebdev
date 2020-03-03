<div class="resources-rows">
	<div class="container">
		<div class="row cards-row services-row medium-padding-top-bottom">
		<?php foreach ($rows as $id => $row): ?>
			<?php print $row; ?>
		<?php endforeach; ?>
		</div>
		
<?php
$node = menu_get_object();
if (user_access('create find_resource content')) {
	echo '<a class="btn btn-admin" href="/node/add/find-resource?';
	if (!empty($node->nid)) { echo "destination=node/" . $node->nid; }
	echo '">Add a Resource</a>';
}
if ((user_access('access draggableviews')) && (count($rows) > 1)) {
	echo '<a class="btn btn-admin" href="/admin/sort/find?';
	if (!empty($node->nid)) { echo "destination=node/" . $node->nid; }
	echo '">Order Resources</a>';
}

?>
		
	</div>
</div>