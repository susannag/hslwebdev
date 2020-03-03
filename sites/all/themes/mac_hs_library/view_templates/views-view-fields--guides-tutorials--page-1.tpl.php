<?php
	// figure out the link and label - depends on the type
	$label = '';
	$link = '';
	if ($fields['field_link']->content) {
		$link = $fields['field_link']->content;
	}
	else if ($fields['field_pdf_file']->content) {
		$link = $fields['field_pdf_file']->content;
	}
	else if ($fields['field_video']->content) {
		$link = $fields['field_video']->content;
	}

?>

<div class="col-md-4 col-sm-12 card">
	<a href="<?php print $link; ?>" class="block-link"></a>
		<h3><?php echo $fields['title']->content; ?></h3>
		
		<div class="mb-5 pb-5">
			<?php echo $fields['field_intro_text']->content; ?>
			
		</div>

		<span class="card__meta btn-floater guides">
			
		<?php 
			if( isset($fields['field_program']->content) ) {
				echo '<span class="subjects">Subjects: ' . $fields['field_program']->content . '</span>';
			}
		?>
			<?php print $fields['field_guide_type_1']->content; ?>
				

		</span>

</div>
