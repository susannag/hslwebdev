<?php
// figure out the link and label - depends on the type
$label = '';
$link = $fields['field_link']->content;
if ($fields['field_guide_type']->content == 'libguide') {
	$link = $fields['field_link']->content;
}
else if ($fields['field_guide_type']->content == 'pdf') {
	$link = $fields['field_pdf_file']->content;
}
else if ($fields['field_guide_type']->content == 'video') {
	$link = $fields['field_video']->content;
}
else if ($fields['field_guide_type']->content == 'website') {
	$link = $fields['field_link']->content;
}

?>
<a href="<?php print $link; ?>">
	<div class="col-md-4 col-sm-12 card">
		<h3><?php echo $fields['title']->content; ?></h3>
		<?php if (!empty($fields['field_intro_text']->content)) { ?><p><?php echo $fields['field_intro_text']->content; ?></p><?php } ?>
		
		<span class="card__meta btn-floater guides">
			<?php echo $fields['field_program']->content; ?>
			<a href="<?php echo $link; ?>" target="_blank"><?php echo $label; ?></a></span>
	</div>
</a>
