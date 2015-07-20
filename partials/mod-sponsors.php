<?php $module = get_module_by_slug('sponsors') ?>
<?php $sponsors = new WP_Query( array('post_type' => 'sponsor', 'orderby' => 'menu_order', 'posts_per_page' => -1) ); ?>


<div id="module-sponsors">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php if ( $sponsors->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<h2><?php the_title(); ?></h2>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>