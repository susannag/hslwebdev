  <?php $nid = $fields['nid']->content; ?>
  <div class="carousel-cell">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-10 mx-5 px-5"><div class="page-intro">
          	<?php print $fields['field_intro_text']->content; ?>
          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php print $nid; ?>-modal">
      			  More Info
      			</button>
        </div></div>
        <?php print $fields['edit_node']->content; ?>
      </div>
    </div>
  </div>