<?php $module = get_module_by_slug('map') ?>

<div id="module-map">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="bil-global-statistics" class="bigtext">
					<div><?php the_field('line_1', $module->ID); ?></div> 
					<div><?php the_field('line_2', $module->ID); ?></div> 
					<div><?php the_field('line_3', $module->ID); ?></div> 
					<div><?php the_field('line_4', $module->ID); ?></div> 
					<div><?php the_field('line_5', $module->ID); ?></div> 
				</div>
				<div id="map-cta">
					<a href="http://bilconference.com/resources/" class="button pink">Organize a BIL in your City</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="full-event-list" class="col-xs-12">
				<?php $all_bils = all_bils(); ?>
				<?php if ($all_bils->have_posts() ) : ?>
					<p>
						<?php while ( $all_bils->have_posts() ) : $all_bils->the_post(); ?>
							<a href="<?php the_permalink(); ?>"><strong><?php the_title() ?></strong> - <?php the_field('general_location'); ?></a>
						<?php endwhile; ?>
					</p>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>