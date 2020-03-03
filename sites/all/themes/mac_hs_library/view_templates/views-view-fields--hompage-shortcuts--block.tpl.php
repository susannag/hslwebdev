<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-6 col-6 mx-auto text-center p-0">
	<a href="<?php echo urldecode($fields['field_link']->content); ?>">
	<img class="round-icon img-fluid" src="<?php echo $fields['field_icon']->content; ?>" alt="<?php echo addslashes($fields['title']->content); ?>">
	<h2><?php echo $fields['title']->content; ?></h2>
	</a>
	<?php if (!empty($fields['edit_node']->content)) { echo $fields['edit_node']->content; } ?>
</div>

