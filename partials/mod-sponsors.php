<?php $module = get_module_by_slug('sponsors') ?>
<?php $sponsors = new WP_Query( array('post_type' => 'sponsor', 'orderby' => 'menu_order', 'posts_per_page' => -1) ); ?>

<div id="module-sponsors">
	<div class="container">
	    <div class="row">
			<ul class="sponsors">
				<?php if ( $sponsors->have_posts() ) : ?>
					<?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
						<?php $imgObj = get_field('white_image');
						 	  $image = $imgObj['sizes'][ '1000x200' ]; 
						 	  $sponsor_url = get_field('url'); ?>

						<li class="sponsor-wrap">
							<a href="<?php echo $sponsor_url; ?>" target="_blank"><img alt="<?php the_title(); ?>" src="<?php echo $image; ?>"></a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</ul>
		</div>
    </div>
</div>

