<?php $module = get_module_by_slug("hero"); ?>
<?php $background = get_field("background_image", $module->ID, OBJECT); ?>
<?php $image = $background['sizes'][ 'full-width' ]; ?>
<?php $text = get_field("text", $module->ID, OBJECT); ?>

<div class="container-fluid" id="module-hero" style="background-image: url('<?php echo $image; ?>');">
	<div class="row">
		<div class="col-xs-12">
			<?php echo $text ?>
		</div>
	</div>
</div>