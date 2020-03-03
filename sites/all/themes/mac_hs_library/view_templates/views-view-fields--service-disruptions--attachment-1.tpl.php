  <?php $nid = $fields['nid']->content; ?>
  <div class="modal fade" id="<?php print $nid; ?>-modal" tabindex="-1" role="dialog" aria-labelledby="<?php print $nid; ?>-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="<?php print $nid; ?>-modal-title"><?php print $fields['title']->content; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php print $fields['title']->content; ?>
              
      	<?php print $fields['body']->content; ?>
      	<?php print $fields['field_alternative_options']->content; ?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>