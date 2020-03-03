<div class="container">
<div class="row row-five ml-md-auto mr-md-auto">
<?php foreach ($rows as $id => $row): ?>
	<?php print $row; ?>
<?php endforeach; ?>
</div>
</div>
<?php
if (user_access('create homepage_shortcuts content')) {
	echo '<a class="btn btn-admin" href="/node/add/homepage-shortcuts?';
	echo "destination=/"; // these only exist on the homepage
	echo '">Add a Shortcut</a>';
}
if ((user_access('access draggableviews')) && (count($rows) > 1)) {
	echo '<a class="btn btn-admin" href="/admin/sort/shortcuts?';
	echo "destination=/"; // these only exist on the homepage
	echo '">Order Shortcuts</a>';
}
?>
