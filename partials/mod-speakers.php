<?php $module = get_module_by_slug('speakers') ?>
<?php $speakers = new WP_Query( array('post_type' => 'speakers', 'orderby' => 'menu_order', 'posts_per_page' => -1) ); ?>

<?php if ( $speakers->have_posts() ) : ?>
<div id="module-speakers">
	<div class="container">
		<div class="row">
				<?php while ( $speakers->have_posts() ) : $speakers->the_post(); ?>
					<div class="col-xs-12 col-sm-6 col-md-2">
						<?php $background = get_field('speaker_photo', $post->ID, OBJECT); ?>
						<?php $image = $background['sizes'][ '300x100' ]; ?>

						<div class="tile">
							<img src="<?php echo $image; ?>">
							<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
						</div>
					
					</div>
				<?php endwhile; ?>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>