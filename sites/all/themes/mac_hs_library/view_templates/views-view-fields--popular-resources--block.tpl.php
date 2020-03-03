<?php
$tab_id = mcmaster_hs_library_format_section_name($fields['title']->content);
?>
<li class="nav-item d-sm-none d-none d-md-block">
	<a id="<?php echo $tab_id; ?>-tab" class="nav-link <?php if ($fields['counter']->content == 1) { echo 'active'; } ?>"  data-toggle="tab" href="#<?php echo $tab_id; ?>" role="tab" aria-controls="<?php echo $tab_id; ?>" aria-expanded="<?php if ($fields['counter']->content == 1) { echo 'true'; } else { echo 'false'; } ?>"><?php echo $fields['title']->content; ?></a>
</li>

<option value="<?php echo $tab_id; ?>" data-toggle="tab" href="#<?php echo $tab_id; ?>" role="tab" aria-controls="<?php echo $tab_id; ?>"  class="d-md-none">
	<?php echo $fields['title']->content; ?>
</option>