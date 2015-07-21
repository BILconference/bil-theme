<?php $module = get_module_by_slug('map') ?>

<div id="module-map">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<iframe width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/superphly.mooogbjb/attribution.html?access_token=pk.eyJ1Ijoic3VwZXJwaGx5IiwiYSI6IjVlYzljYzk3NDY4YWMwNDA3Zjc0NjdjYWYxOThkOWMyIn0.T7cd_y4tv_N3DoBofUZZqQ'></iframe>
			</div>
			<div class="col-xs-12 col-md-4">
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
							<li><?php the_title() ?> - <?php the_field('general_location', $post->ID); ?></li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>