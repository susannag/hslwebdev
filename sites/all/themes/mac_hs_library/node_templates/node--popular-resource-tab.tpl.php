<?php
$col1_links = array();
$col2_links = array();

if (!empty($node->field_resource_link[LANGUAGE_NONE])) {
	$half = ceil(count($node->field_resource_link[LANGUAGE_NONE])/2);

	foreach ($node->field_resource_link[LANGUAGE_NONE] as $x => $v) {
		if ($x < $half) {
			$col1_links[] = $v;
		}
		else {
			$col2_links[] = $v;
		}
	}
}
?>
<div class="row" style="padding-right: 24px; padding-left: 24px; margin-bottom: 0;">
	<div class="col-lg-9">
		
			<?php 
				if( isset( $node->field_search_embed[LANGUAGE_NONE][0] ) ){ 
					print render( $content['field_search_embed'] );
				} else { ?>
				<div class="row no-gutters" style="box-shadow: 0 3px 24px rgba(0,0,0,0.3); color: black;">
					<div class="col-md-6">
						<?php if (count($col1_links) > 0) { ?>
						<div class="btn-group-vertical background--white" role="group" aria-label="Popular Resources"
						style="border-right: 2px solid #f5f5f5;">
							<?php
							foreach ($col1_links as $x => $v) {
								echo '<a class="btn" style="font-size: 18px; line-height: 24px;" href="' . urldecode($v['url']) . '"';
								if (!empty($v['attributes']['target'])) { echo ' target="' . $v['attributes']['target'] . '"'; }
								echo '><span>' . $v['title'] . '</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
							}
							?>
						</div>
						<?php } ?>
					</div>
					<div class="col-md-6">
						<?php if (count($col2_links) > 0) { ?>
						<div class="btn-group-vertical background--white" role="group" aria-label="Popular Resources">
							<?php
							foreach ($col2_links as $x => $v) {
								echo '<a class="btn" style="font-size: 18px; line-height: 24px;" href="' . urldecode($v['url']) . '"';
								if (!empty($v['attributes']['target'])) { echo ' target="' . $v['attributes']['target'] . '"'; }
								echo '><span>' . $v['title'] . '</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
							}
							?>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		
	</div>
	<div class="mt-lg-0 mt-xl-0 mt-5 col-lg-3 mt-sm-5 mt-xs-5">
		<?php
		if (!empty($node->field_call_to_action_text[LANGUAGE_NONE][0]['value'])) {
			/* $field_view = field_view_field('node', $node, 'field_call_to_action_text',  array('label'=>'hidden'));
			echo drupal_render($field_view); */
			echo '<p>' . $node->field_call_to_action_text[LANGUAGE_NONE][0]['value'] . '</p>';
		}
		if (!empty($node->field_call_to_action_button[LANGUAGE_NONE][0]['url'])) {
			echo '<a href="' . urldecode($node->field_call_to_action_button[LANGUAGE_NONE][0]['url']) . '" class="btn btn-outline-dark btn-arrow-right btn-block"';
			if (!empty($node->field_call_to_action_button[LANGUAGE_NONE][0]['attributes']['target'])) { echo ' target="' . $node->field_call_to_action_button[LANGUAGE_NONE][0]['attributes']['target'] . '"'; }
			echo '>' . $node->field_call_to_action_button[LANGUAGE_NONE][0]['title'] . '</a>';
		}
		?>
	</div>

	<?php
	if (node_access("update", $node) === TRUE) {
		echo '<a class="btn btn-admin" id="edit-node-' . $node->nid . '" href="/node/' . $node->nid . '/edit">Edit</a>';
	}
	?>
</div>



