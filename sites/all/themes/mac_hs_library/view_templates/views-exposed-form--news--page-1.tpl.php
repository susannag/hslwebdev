<section class="filter">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<form>
			<div class="form-row align-items-center">
				<div class="col-auto">
					<label class="mr-sm-2" for="inlineFormCustomSelect">Filter By:</label>
					<div class="select-wrapper btn-arrow-right">
					<?php if (!empty($widgets['filter-field_news_category_tid'])) { ?>
					<?php print $widgets['filter-field_news_category_tid']->widget; ?>
					<?php } ?>
					</div>
				</div>
				
				<?php print $button; ?>
				
			</div>
			</form>
			</div>
		</div>
	</div>
</section>