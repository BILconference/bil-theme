<?php get_header(); ?>

	<?php if (get_field('events_hero_background', 'option')) { 
		$hero_bg_obj = get_field('events_hero_background', 'option');
		$hero_bg = $hero_bg_obj['sizes']['full-width'];
	} ?>
	
	<?php $image = get_field('events_hero_foreground', 'option'); ?>
	<?php if( !empty($image) ) { ?>
		<div id="events-hero" class="jumbotron" style="background-image: url('<?php echo $hero_bg; ?>');" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />		
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<div id="events-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<h1>Events</h1>
					<?php the_field('events_content', 'option'); ?>
				</div>
				<div class="col-xs-12 col-sm-8">
					<?php $upcoming_bils = upcoming_bils(); ?>
					<?php if ($upcoming_bils->have_posts() ) { ?>
						<h2>Upcoming BILs</h2>
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
					<?php } ?>

					<?php $past_bils = past_bils(); ?>
					<?php if ($past_bils->have_posts() ) { ?>
						<h2>Past BILs</h2>
						<ul>
							<?php while ( $past_bils->have_posts() ) : $past_bils->the_post(); ?>
								<li class="f16">
									<span class="flag <?php echo strtolower( get_field('country') ); ?>"></span><a href="<?php the_permalink(); ?>"><strong><?php the_title() ?></strong> - <?php the_field('general_location'); ?></a>	
								</li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>