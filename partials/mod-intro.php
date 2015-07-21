<?php $module = get_module_by_slug('intro') ?>
<?php $text = get_field("text", $module->ID, OBJECT); ?>


<?php if (has_post_thumbnail( $post->ID ) ): 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width' );
endif; ?>




<div id="module-intro" style="background-image: url('<?php echo $image[0]; ?>')">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 borders">
				<?php echo $text ?>
			</div>
		</div>
	</div>
</div>