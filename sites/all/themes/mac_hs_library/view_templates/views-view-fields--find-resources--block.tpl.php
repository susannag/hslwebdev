<div class="col-md-4 card text-center">
	<div class="card__interior">
		<a href="<?php echo urldecode($fields['field_link']->content); ?>" <?php if (!empty($fields['field_open_in_new_window']->content)) { echo 'target="_blank"'; } ?> >
		<img class="round-icon img-fluid" src="<?php echo $fields['field_icon']->content; ?>" alt="<?php echo addslashes($fields['title']->content); ?>"></a>
		<h2><?php echo $fields['title']->content; ?></h2>
		<?php if (!empty($fields['field_intro_text']->content)) { ?><?php echo $fields['field_intro_text']->content; ?><?php } ?>
		<?php if (!empty($fields['field_link']->content)) { ?><p class="btn-floater"><a href="<?php echo urldecode($fields['field_link']->content); ?>" <?php if (!empty($fields['field_open_in_new_window']->content)) { echo 'target="_blank"'; } ?> class="btn btn-outline-dark btn-arrow-right"><?php echo $fields['field_link_1']->content; ?></a></p><?php } ?>
		<?php if (!empty($fields['edit_node']->content)) { echo '<p>' . $fields['edit_node']->content . '</p>'; } ?>
	</div>
</div>
