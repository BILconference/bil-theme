<?php $module = get_module_by_slug("hero"); ?>
<?php $background = get_field("background_image", $module->ID, OBJECT); ?>
<?php $image = $background['sizes'][ 'full-width' ]; ?>

<div class="container-fluid" id="module-hero" style="background-image: url('<?php echo $image');">
	<div class="row">
		<div class="col-xs-12">
			Hero Module
			This should be full width
		</div>
	</div>
</div>