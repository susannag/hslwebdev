<style type="text/css">
	.research-banner {
		background: url( <?php echo $fields['field_research_banner_image']->content; ?> ) no-repeat center;
		    background-size: cover;
	}
</style>

<?php
	if ( !empty( $fields['body']->content ) ) {
		$sizeClass = 'col-lg-4 text-xl-right text-lg-right';
		$hideBody = FALSE;
	} else {
		$sizeClass = 'col-lg-8';
		$hideBody = TRUE;
	}
?>


<div class="research-banner">
	<div class="container">
		<div class="row align-items-center">
			<div class="<?php print $sizeClass; ?>">
					<h2 class="banner-title"><?php echo $fields['title']->content; ?></h2>
			</div>
			<?php if( $hideBody == FALSE ): ?>
				<div class="col-lg-4">
						<p class="banner-description"><?php echo $fields['body']->content; ?></p>
				</div>
			<?php endif; ?>
			<div class="col-lg-4">
				<?php echo $fields['field_button_link']->content; ?>
			</div>
			<?php echo $fields['edit_node']->content; ?>
		</div>
	</div>
</div>