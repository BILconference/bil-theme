<?php get_header(); ?>

	<?php if (get_field('events_hero_background', 'option')) $hero_bg = get_field('events_hero_background', 'option'); ?>
	<div id="event-hero" class="jumbotron" style="background-image: url('<?php echo $hero_bg; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php $image = get_field('events_hero_foreground', 'option'); ?>
					<?php if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="event-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<h2>Events</h2>
					<?php the_field('event_content', 'option'); ?>
				</div>
				<div class="col-xs-12 col-sm-8">
					<?php $upcoming_bils = upcoming_bils(); ?>
					<?php if ($upcoming_bils->have_posts() ) : ?>
						<h1>Upcoming BILs</h1>
						<ul>
							<?php while ( $upcoming_bils->have_posts() ) : $upcoming_bils->the_post(); ?>
								<li>
									<img src="<?php the_field('flag'); ?>"/>
									<a href="<?php the_permalink(); ?>"><strong><?php the_title() ?></strong> - <?php the_field('general_location'); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
						<hr>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>

					<?php $past_bils = past_bils(); ?>
					<?php if ($past_bils->have_posts() ) : ?>
						<h1>Past BILs</h1>
						<ul>
							<?php while ( $past_bils->have_posts() ) : $past_bils->the_post(); ?>
								<li class="f16">
									<span class="flag <?php echo strtolower( get_field('country') ); ?>"></span><a href="<?php the_permalink(); ?>"><strong><?php the_title() ?></strong> - <?php the_field('general_location'); ?></a>	
								</li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>