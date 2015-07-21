<?php $module = get_module_by_slug('intro') ?>
<?php $text = get_field("text", $module->ID, OBJECT); ?>

<div id="module-intro">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 borders">
				<?php echo $text ?>
			</div>
		</div>
	</div>
</div>