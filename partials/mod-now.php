<?php $module = get_module_by_slug('now') ?>
<?php //$text = get_field("text", $module->ID, OBJECT); ?>
<?php $background = get_field("background_image", $module->ID, OBJECT); ?>
<?php $image = $background['sizes'][ 'full-width' ]; ?>

<?php $future_bils = upcoming_bils(); ?>
<?php if ($future_bils->have_posts() ) { ?>
	<div id="module-now">
		<?php while ( $future_bils->have_posts() ) : $future_bils->the_post(); ?>
			<div class="event-hero" class="hero jumbotron">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 content">
							<h2><?php the_title(); ?></h2>
							<p>
								<?php the_field('general_location'); ?><br>
								<?php if (get_field('start_date')) { 
									$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
									echo $start_date->format('F jS, Y');
								} ?>
							
								<?php if (get_field('end_date')) {
									$end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));

									if ($end_date != $start_date) { // Case for one day event(s)
										echo '&nbsp;-&nbsp;';
										echo $end_date->format('F jS, Y');
									}
								} ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php } ?>