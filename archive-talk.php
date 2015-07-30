<?php get_header(); ?>

<?php $image = get_field('talk_image', 'option'); ?>
<?php if( !empty($image) ): ?>
	<div id="talks-hero" class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part('partials/list-talks'); ?>

<?php get_footer(); ?>