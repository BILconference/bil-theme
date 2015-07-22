<?php $module = get_module_by_slug('speakers') ?>
<?php $speakers = new WP_Query( array('post_type' => 'speaker', 'orderby' => 'menu_order', 'posts_per_page' => -1, 'tag' => 4) ); ?>

<div id="module-speakers">
	<div class="container">
		<div class="row row-eq-height">
			<?php if ( $speakers->have_posts() ) : ?>
				<?php while ( $speakers->have_posts() ) : $speakers->the_post(); ?>
					<div class="col-xs-12 col-sm-6 col-md-2">
						<div class="tile">
							<?php the_post_thumbnail( '200x200', $attr ); ?>
							<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
							<h6><?php the_field('association') ?></h6>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
