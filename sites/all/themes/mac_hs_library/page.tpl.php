<?php if ($page['mac_header']): ?>
	<?php print render($page['mac_header']); ?>
<?php endif; ?>
<?php if ($page['site_menu']): ?>
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <svg id="chevron" class="svg-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.7 4.1">
   <style>.chevron{fill:none;stroke:#fff;stroke-miterlimit:10;}</style>
   <path class="chevron" fill="#fff" d="M6.4.4l-3 3-3-3"></path>
</svg>
   </button>
   <div class="collapse navbar-collapse" id="navbar-main">
	<?php print render($page['site_menu']); ?>
	<?php if ($page['helper_menu']): ?>
		<?php print render($page['helper_menu']); ?>
	<?php endif; ?>
	</div>
</nav>
<?php endif; ?>

<?php if ($page['page_banner']): ?>
<section class="hero">
<?php print render($page['page_banner']); ?>
</section>
<?php endif; ?>

<content style="display: block; overflow-x: hidden;">
	<?php if ($page['page_header']): ?>
	<section class="technology">
		<div class="container section__header">
			<div class="row align-items-center">
				<?php
				if (!empty($breadcrumb)) {
					echo '<div class="col-sm-12">';
					echo $breadcrumb;
					echo '</div>';
				}
				?>

				<?php print render($page['page_header']); ?>
			</div>
		</div>
		<hr class="full-width">
	</section>
	<?php endif; ?>

	<?php if ($page['pre_content']): ?>
		<?php print render($page['pre_content']); ?>
	<?php endif; ?>

	<section>
	<div class="container">
	<?php if (($page['help']) || $messages): ?>
		<div class="row"><div class="col-md-12">
		<?php print $messages; ?>
		<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
		<?php print render($page['help']); ?>
		<?php /* if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; */ ?>
		</div></div>
	<?php endif; ?>

	<?php if ($page['abovecontent']): ?>
		<div class="row"><div class="col-md-12">
		<?php print render($page['abovecontent']); ?>
		</div></div>
	<?php endif; ?>

	<?php if ($show_title && $title): ?><h1 class="mb-0"><?php print $title; ?></h1><?php else: ?><h1 class="sr-only"><?php print $title; ?></h1><?php endif; ?>
	<?php print render($page['content']); ?>


	<?php if ($page['belowcontent']): ?>
		<div class="row"><div class="col-md-12">
		<?php print render($page['belowcontent']); ?>
		</div></div>
	<?php endif; ?>
	</div>
	</section>

	<?php if ($page['post_content']): ?>
		<?php print render($page['post_content']); ?>
	<?php endif; ?>
</content>

<?php if ($page['site_footer']): ?>
	<?php print render($page['site_footer']); ?>
<?php endif; ?>
