<?php $module = get_module_by_slug('sponsors') ?>
<?php $sponsors = new WP_Query( array('post_type' => 'sponsor', 'orderby' => 'menu_order', 'posts_per_page' => -1) ); ?>

<div id="module-sponsors">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php if ( $sponsors->have_posts() ) : ?>
					<?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
						<div class="col-xs-12 col-sm-6 col-md-2">
							<?php $background = get_field('white_image', $post->ID, OBJECT); ?>
							<?php $image = $background['sizes'][ '300x100' ]; ?>

							<div class="tile">
								<img src="<?php echo $image; ?>">
								<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>