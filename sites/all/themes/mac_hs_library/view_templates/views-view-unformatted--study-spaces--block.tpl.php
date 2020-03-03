<div class="container feed">
	<?php 
		if (user_access('administer nodes')): 
			$path = current_path();
	?>
		<div class="admin-links d-block">
			<a href="/node/add/study-space?destination=<?php echo $path; ?>" class="btn btn-admin">Add New Study Space</a> 
			<a href="/admin/sort/study-areas?destination=<?php echo $path; ?>" class="btn btn-admin">Re-Order Study Spaces</a>
		</div>
	<?php endif; ?>
    <div class="row cards-row">
	<?php foreach ($rows as $id => $row): ?>
		<?php print $row; ?>
	<?php endforeach; ?>
	</div>
</div>