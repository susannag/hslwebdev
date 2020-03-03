<ul class="nav nav-tabs d-sm-none d-none d-md-flex" id="myTab" role="tablist">
	<?php foreach ($rows as $id => $row): ?>
		<li class="nav-item">
			<?php print $row; ?>
		</li>
	<?php endforeach; ?>
</ul>

<div class="select-wrapper pop-res mx-auto">
	<select class="custom-select pop-res form-control d-md-none" id="tab_selector">
		<?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
		<?php endforeach; ?>
	</select>
</div>