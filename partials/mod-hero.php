<?php $module = get_module_by_slug("hero"); ?>
<?php $background = get_field("background_image", $module->ID, OBJECT); ?>
<?php $image = $background['sizes'][ 'full-width' ]; ?>
<?php $text = get_field("text", $module->ID, OBJECT); ?>

<div id="module-hero" style="background-image: url('<?php echo $image; ?>');" >
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<img class="bil-logo" src="wp-content/uploads/2015/07/bil-white-500.png"/>
				<?php echo $text ?>
			</div>
		</div>
	</div>
</div>