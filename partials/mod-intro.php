<?php $module = get_module_by_slug('intro') ?>
<?php $text = get_field("text", $module->ID, OBJECT); ?>
<?php $background = get_field("background_image", $module->ID, OBJECT); ?>
<?php $image = $background['sizes'][ 'full-width' ]; ?>

<div id="module-intro" style="background-image: url('<?php echo $image; ?>')">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 content">
				<?php echo $text ?>
			</div>
		</div>
	</div>
</div>