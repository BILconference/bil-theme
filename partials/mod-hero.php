<?php $module = get_module_by_slug("hero"); ?>
<?php $background = get_field("background-image", $module->ID, OBJECT); ?>
<?php echo $module->ID; ?>
<?php var_dump($background) ?>

<div class="container-fluid" id="module-hero" style="background-image: url('');">
	<div class="row">
		<div class="col-xs-12">
			Hero Module
			This should be full width
		</div>
	</div>
</div>