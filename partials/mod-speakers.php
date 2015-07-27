<?php $module = get_module_by_slug('speakers') ?>
<?php $speakers = new WP_Query( array(
	'post_type' => 'speaker',
	'orderby' => 'menu_order',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'group',
			'field'    => 'slug',
			'terms'    => 'featured'
		)
	)
)); ?>

<div id="module-speakers">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Speakers</h2>
			</div>
		</div>
		<div class="row">
			<?php if ( $speakers->have_posts() ) : ?>
				<?php while ( $speakers->have_posts() ) : $speakers->the_post(); ?>
					<div class="speaker col-xs-12 col-sm-3 col-md-2">
						<a href="<?php the_permalink();?>">
							<?php the_post_thumbnail( '200x200' ); ?>
							<h4><?php the_title(); ?></h4>
							<h5><?php the_field('association') ?></h5>
						</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
