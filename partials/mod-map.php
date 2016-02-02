<?php $module = get_module_by_slug('map') ?>

<div id="module-map">
	<div class="container">
		<div class="row">
			<div id="bil-global-statistics" class="col-xs-12 col-md-8 bigtext">
				<div><?php the_field('line_1', $module->ID); ?></div> 
				<div><?php the_field('line_2', $module->ID); ?></div> 
				<div><?php the_field('line_3', $module->ID); ?></div> 
				<div><?php the_field('line_4', $module->ID); ?></div> 
				<div><?php the_field('line_5', $module->ID); ?></div> 
				<div id="map-cta">
					<button class="pink">Organize BIL in your City</button>
				</div>
			</div>

			<div id="full-event-list" class="col-xs-12 col-md-4">				
				<?php $all_bils = all_bils(); ?>
				<?php if ($all_bils->have_posts() ) : ?>
					<ul>
						<?php while ( $all_bils->have_posts() ) : $all_bils->the_post(); ?>
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