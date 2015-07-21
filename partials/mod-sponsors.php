<?php $module = get_module_by_slug('sponsors') ?>
<?php $sponsors = new WP_Query( array('post_type' => 'sponsor', 'orderby' => 'menu_order', 'posts_per_page' => -1) ); ?>

<div id="module-sponsors">
	<div class="container grid-sponsors">
	    <div class="row">
			<ul class="sponsors">
				<?php if ( $sponsors->have_posts() ) : ?>
					<?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

						<?php $background = get_field('white_image');
						 	  $image = $background['sizes'][ '600x600' ]; 
						 	  $sponsor_url = get_field('url'); ?>

						
							<li class="sponsor-wrap">
								<a href="<?php echo $sponsor_url; ?>" target="_blank"><img src="<?php echo $image; ?>"></a>
								<span><a href="<?php the_permalink();?>" class="hidden"><?php the_title(); ?></a></span>
							</li>

					<?php endwhile; ?>
					
					<?php wp_reset_postdata(); ?>
				
				<?php endif; ?>
			</ul>
		</div>
    </div>
</div>

