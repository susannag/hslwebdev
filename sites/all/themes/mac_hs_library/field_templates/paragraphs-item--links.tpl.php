<div class="btn-group-vertical background--white" role="group" aria-label="<?php echo $content['field_link'][0]['#element']['title']; ?>">
<a class="btn" href="<?php echo urldecode($content['field_link'][0]['#element']['url']); ?>" <?php if (!empty($content['field_link'][0]['#element']['attributes']['target'])) { echo ' target="' . $content['field_link'][0]['#element']['attributes']['target'] . '"'; } ?>>
<span><?php echo $content['field_link'][0]['#element']['title']; ?>
<?php if (!empty($content['field_link_type'][0]['#markup'])) { ?><br><span class="light"><?php echo $content['field_link_type'][0]['#markup']; ?></span><?php } ?>
</span>
<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
</div>