<?php
$paragraph = $content['field_accordion_title']['#object'];
$parent_node = $paragraph->hostEntity();
?>
<div class="card">
	<div class="card-header" role="tab" id="heading<?php echo $paragraph->item_id; ?>">
		<h5 class="mb-0">
			<a data-toggle="collapse" class="collapsed card-link" href="#collapse<?php echo $paragraph->item_id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $paragraph->item_id; ?>">
			<?php print render($content['field_accordion_title']); ?>
			</a>
		</h5>
	</div>
	<div id="collapse<?php echo $paragraph->item_id; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $paragraph->item_id; ?>" data-parent="#accordion-<?php echo $parent_node->nid; ?>">
		<div class="card-body">
			<?php print render($content['field_accordion_body']); ?>
		</div>
	</div>
</div>


