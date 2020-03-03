<section class="feed medium-padding-top-bottom">
	<?php if ($rows): ?>
		<?php print $rows; ?>
	<?php endif; ?>

	<?php if ($more): ?>
		<div class="container text-center">
			<a href="/news" class="btn btn-outline-dark btn-arrow-right">More News</a>
		</div>
	<?php endif; ?>
</section>