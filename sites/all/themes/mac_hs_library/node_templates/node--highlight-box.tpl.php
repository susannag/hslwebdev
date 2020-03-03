<?php
if ($page) {
	$page_nid = $node->field_hightlight_box_content[LANGUAGE_NONE][0]['target_id'];
	if (!empty($page_nid)) {
		drupal_goto('node/' . $page_nid);
	}
}
?>
<div class="col-md-4 col-sm-12 card text-center">
	<div class="card__thumbnail-wrapper">
	<?php


	if (!empty($node->field_highlight_box_image[LANGUAGE_NONE][0]['uri'])) {
		$alt_txt = (!empty($node->field_highlight_box_image[LANGUAGE_NONE][0]['field_file_image_alt_text'][LANGUAGE_NONE][0]['safe_value']) ? $node->field_highlight_box_image[LANGUAGE_NONE][0]['field_file_image_alt_text'][LANGUAGE_NONE][0]['safe_value'] : $node->title);
		$title_txt = (!empty($node->field_highlight_box_image[LANGUAGE_NONE][0]['field_file_image_title_text'][LANGUAGE_NONE][0]['safe_value']) ? $node->field_highlight_box_image[LANGUAGE_NONE][0]['field_file_image_title_text'][LANGUAGE_NONE][0]['safe_value'] : $node->title);

		if (!empty($node->field_rounded_image[LANGUAGE_NONE][0]['value'])) {
			// use img scaled and cropped to 120 x 120

		if (!empty($node->body[LANGUAGE_NONE])) {
			echo '<a href="" data-toggle="modal" data-target="#modal-' . $node->nid . '">';
		}
		else if (!empty($node->field_link[LANGUAGE_NONE][0]['url'])) {
			echo '<a href="' . $node->field_link[LANGUAGE_NONE][0]['url'] . '"';
			if (!empty($node->field_link[LANGUAGE_NONE][0]['attributes']['target'])) {
				echo ' target="' . $node->field_link[LANGUAGE_NONE][0]['attributes']['target'] . '"';
			}
			echo '>';
		}
			$img = image_style_url('square_120', $node->field_highlight_box_image[LANGUAGE_NONE][0]['uri']);
			echo '<img src="' . $img . '" alt="' . addslashes($alt_txt) . '" title="' . addslashes($title_txt) . '" class="rounded-circle img-fluid card__thumbnail-image">';


		}
		else {
				if (!empty($node->body[LANGUAGE_NONE])) {
					echo '<a href="" data-toggle="modal" data-target="#modal-' . $node->nid . '">';
				}
				else if (!empty($node->field_link[LANGUAGE_NONE][0]['url'])) {
					echo '<a href="' . $node->field_link[LANGUAGE_NONE][0]['url'] . '"';
					if (!empty($node->field_link[LANGUAGE_NONE][0]['attributes']['target'])) {
						echo ' target="' . $node->field_link[LANGUAGE_NONE][0]['attributes']['target'] . '"';
					}
					echo '>';
				}
			$img = image_style_url('rect_600x240', $node->field_highlight_box_image[LANGUAGE_NONE][0]['uri']);
			echo '<img src="' . $img . '" alt="' . addslashes($alt_txt) . '" title="' . addslashes($title_txt) . '" class="img-fluid card__thumbnail-image" style="height:120px;">';
		}
	}
	else if (!empty($node->field_highlight_box_icon[LANGUAGE_NONE][0]['icon'])) {
		echo '<i class="fa fa-' . trim($node->field_highlight_box_icon[LANGUAGE_NONE][0]['icon']) . '" aria-hidden="true"></i>';
	}
	?></a>
	</div>


	<h2><?php echo $title; ?></h2>

	<?php echo render($content); ?>

	<?php
		if (!empty($node->body[LANGUAGE_NONE])) {
			echo '<div class="btn-floater"><a href="#" data-toggle="modal" data-target="#modal-' . $node->nid . '" class="btn btn-outline-dark btn-arrow-right">Read More</a></div>';
		}
		else if (!empty($node->field_link[LANGUAGE_NONE][0]['url'])) {
			if( !empty( $node->field_link[LANGUAGE_NONE][0]['title'] ) && ( $node->field_link[LANGUAGE_NONE][0]['title'] != $node->field_link[LANGUAGE_NONE][0]['url']) ) {
				$link_title = $node->field_link[LANGUAGE_NONE][0]['title'];
			} else {
				$link_title = 'Read More';
			}
			echo '<div class="btn-floater"><a href="' . urldecode($node->field_link[LANGUAGE_NONE][0]['url']) . '"';
			if (!empty($node->field_link[LANGUAGE_NONE][0]['attributes']['target'])) {
				echo ' target="' . $node->field_link[LANGUAGE_NONE][0]['attributes']['target'] . '"';
			}
			echo 'class="btn btn-outline-dark btn-arrow-right">' . $link_title . '</a></div>';
		}
	?>
<?php
	// include an edit button?
	if (node_access("update", $node) === TRUE) {
		echo '<div class="position-absolute"><a class="btn btn-admin" href="/node/' . $node->nid . '/edit">Edit</a></div>';
	}
	?>
</div>


