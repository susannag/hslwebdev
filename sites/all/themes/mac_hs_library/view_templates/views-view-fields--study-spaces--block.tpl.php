<?php
$img = (empty($fields['field_space_image']->content) ? 'http://via.placeholder.com/600x360' : $fields['field_space_image']->content);

?>
<div class="col-md-4 col-sm-12 card">
	<div class="card__thumbnail-wrapper">
		<img src="<?php echo $img; ?>" class="img-fluid card__thumbnail-image" alt="<?php echo addslashes($fields['title']->content); ?>">
	</div>
	<div class="card-body">
		<h3><?php echo $fields['title']->content; ?></h3>
		<?php if (!empty($fields['field_intro_text']->content)) { ?><p><?php echo $fields['field_intro_text']->content; ?></p><?php } ?>
		<div class="study-space-icons btn-floater">

		<?php if (!empty($fields['field_bookable']->content)) { ?>
			<p><a href="https://hslstudyroom.mcmaster.ca/" class="bw-button--solid-maroon bw-button--solid-small" target="_blank">Book a Room</a></p>
		<?php } ?>


			<?php
			if (!empty($fields['field_noise_level']->content)) {

				$space = explode( ',', $fields[ 'field_noise_level' ]->content );
				
				foreach ( $space as $key => $spaceType ) {
					$spaceType = trim( $spaceType );
					
					switch ( $spaceType ) {
						case 'silent':
							print "<img src='/" . drupal_get_path('theme', 'mac_hs_library') . "/assets/img/png/icon-silent.png' title='Silent Study Space' alt='Silent Study Space'><small>Silent</small>";
						break;
						case 'quiet':
							print "<img src='/" . drupal_get_path('theme', 'mac_hs_library') . "/assets/img/png/icon-quiet.png' title='Quiet Study Space' alt='Quiet Study Space'><small>Quiet</small>";
						break;
						case 'group':
							print "<img src='/" . drupal_get_path('theme', 'mac_hs_library') . "/assets/img/png/icon-group.png' title='Group Study Space' alt='Group Study Space'><small>Group</small>";
						break;
						case 'food':
							print "<img src='/" . drupal_get_path('theme', 'mac_hs_library') . "/assets/img/png/icon-food.png' title='Food Permitted' alt='Food Permitted'><small>Food Permitted</small>";
						break;
						case 'no-food':
							print "<img src='/" . drupal_get_path('theme', 'mac_hs_library') . "/assets/img/png/icon-no-food.png' title='Food not permitted' alt='Food not permitted'><small>No Food</small>";
						break;
					}
				}

			}
			?>
		
		</div>
		

		
		<?php if (!empty($fields['edit_node']->content)) {
			echo $fields['edit_node']->content;
		} ?>
	</div>
</div>

