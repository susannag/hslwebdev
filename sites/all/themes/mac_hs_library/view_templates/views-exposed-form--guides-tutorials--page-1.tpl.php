<section class="filter">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<form>
			<div class="form-row align-items-center mt-5 mb-5">
				<div class="col-auto">
					<label class="mr-sm-2" for="inlineFormCustomSelect">Filter By:</label>
					<div class="select-wrapper btn-arrow-right">
					<?php if (!empty($widgets['filter-field_guide_type_value'])) { ?>
					<?php print $widgets['filter-field_guide_type_value']->widget; ?>
					<?php } ?>
					</div>
				</div>
				
				<div class="col-auto">
					<div class="select-wrapper btn-arrow-right">
					<?php if (!empty($widgets['filter-field_program_tid'])) { ?>
					<?php print $widgets['filter-field_program_tid']->widget; ?>
					<?php } ?>
					</div>
				</div>
				
				<div class="col-auto">
					<?php if (!empty($widgets['filter-combine'])) { ?>
						<?php print $widgets['filter-combine']->widget; ?>
					<?php } ?>
				</div>
				
				<?php print $button; ?>
				
			</div>
			</form>
			</div>
		</div>
	</div>
</section>