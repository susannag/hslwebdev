<?php
$img = (empty($fields['field_news_image']->content) ? 'http://via.placeholder.com/600x360' : $fields['field_news_image']->content);
?>
<div class="col-md-4 col-sm-12 card">
	<div class="card__thumbnail-wrapper">
	<img src="<?php echo $img; ?>" alt="<?php echo addslashes($fields['title']->content); ?>" class="img-fluid card__thumbnail-image">
	<?php if (!empty($fields['field_news_category']->content)) { ?><span class="card__thumbnail-text"><?php echo $fields['field_news_category']->content; ?></span><?php } ?>
	</div>
	<p class="card__meta"><span><?php echo $fields['field_news_date']->content; ?></span></p>
	<a href="<?php echo $fields['path']->content; ?>"><h3><?php echo $fields['title']->content; ?></h3></a>
	<?php if (!empty($fields['field_intro_text']->content)) { echo $fields['field_intro_text']->content; } ?>
</div>