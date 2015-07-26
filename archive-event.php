<?php get_header(); ?>

	<div id="talk-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Events</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<?php $upcoming_bils = upcoming_bils(); ?>
					<?php if ($upcoming_bils->have_posts() ) : ?>
						<h1>Upcoming BILs</h1>
						<ul>
							<?php while ( $upcoming_bils->have_posts() ) : $upcoming_bils->the_post(); ?>
								<li>

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
								<li>
									<a href="<?php the_permalink(); ?>"><strong><?php the_title() ?></strong> - <?php the_field('general_location'); ?></a>
									<?php $flag = get_field('flag'); ?>
									<img src="<?php echo $flag; ?>"/>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>

				</div>

				<div class="sidebar col-xs-12 col-sm-4">
					<?php //this is a place we could put this content in as a widget ?>
					<div class="sidebar-cta host-a-bil">
						Don't see your country or city represented?
						<button class="btn button btn-large">Host your own</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>