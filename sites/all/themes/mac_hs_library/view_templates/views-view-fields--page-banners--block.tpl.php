<div class="brand-carousel-cell brand-carousel-cell--white-left">
	<img src="<?php echo $fields['field_banner_image']->content; ?>" alt="" class="brand-carousel__image">
	<div class="row">
		<div class="col-lg-6 col-md-7 col-sm-7 brand-carousel__text brand-carousel__text__left">
			<p class="brand-carousel__title"><?php echo $fields['title']->content; ?></p>
			<?php if (!empty($fields['field_short_overview']->content)) { ?><p class="brand-carousel__subtitle"><?php echo $fields['field_short_overview']->content; ?></p><?php } ?>
			<?php if (!empty($fields['field_link']->content)) { ?><a href="<?php echo urldecode($fields['field_link']->content); ?>" class="brand-carousel__btn"><?php echo $fields['field_link_1']->content; ?></a><?php } ?>
			<?php if (!empty($fields['edit_node']->content)) { echo $fields['edit_node']->content; } ?>
		</div>
	</div>
</div>