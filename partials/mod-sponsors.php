<?php $module = get_module_by_slug('sponsors') ?>
<?php $sponsors = new WP_Query( array('post_type' => 'sponsor', 'orderby' => 'menu_order', 'posts_per_page' => -1) ); ?>

<div id="module-sponsors">
	
			
				<?php if ( $sponsors->have_posts() ) : ?>
					<?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

						<?php $background = get_field('white_image', $post->ID, OBJECT);
						 	  $image = $background['sizes'][ '600x600' ]; ?>

						<div class="col-xs-12 col-sm-6 col-md-2">
							<div class="sponsor-wrap" style="background:url( '<?php echo $image; ?>' )"> 
							

							<div class="tile hidden">
								<img src="<?php echo $image; ?>">
								<h2><a href="<?php the_permalink();?>" ><?php the_title(); ?></a></h2>
							</div>
						</div>

					<?php endwhile; ?>
					
					<?php wp_reset_postdata(); ?>
				
				<?php endif; ?>
			

</div>