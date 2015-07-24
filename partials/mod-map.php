<?php $module = get_module_by_slug('map') ?>

<div id="module-map">
	<div class="container">
		<div class="row">
			<div id="bil-global-statistics" class="col-xs-12 col-md-8 bigtext">
				<div>9 Years Running</div> 
				<div>7 Countries</div>		
				<div>33 Cities</div>
				<div>thousands and thousands of</div>
				<div>BILders</div>
			</div>
			<div id="full-event-list" class="col-xs-12 col-md-4">
				<?php $upcoming_bils = upcoming_bils(); ?>
				<?php if ($upcoming_bils->have_posts() ) : ?>
					<ul>
						<?php while ( $upcoming_bils->have_posts() ) : $upcoming_bils->the_post(); ?>
							<li><?php the_title() ?> - <?php echo $post->ID; ?></li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

				<hr>
				
				<?php $past_bils = past_bils(); ?>
				<?php if ($past_bils->have_posts() ) : ?>
					<ul>
						<?php while ( $past_bils->have_posts() ) : $past_bils->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>"><strong><?php the_title() ?></strong> - <?php the_field('general_location'); ?></a>
							</li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>