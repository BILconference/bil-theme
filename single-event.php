<?php 
	//************************************************************************
	//
	// Redirect Code - See page option for redirection URL
	//
	//************************************************************************

	$redirect = get_post_meta($post->ID, 'redirect', true);
	if (redirect) wp_redirect(clean_url($field), 301);
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php 
		// add in the custom styling for each individual event
		// users can add their styling into the custom_css custom field on the event edit page

		if ( get_field( "custom_css" ) ) {
			echo "<style>";
			echo get_field( "custom_css" );
			echo "</style>";
		}
	?>

	<?php if (get_field("hero_background")) {
		$background = get_field("hero_background");
		$image = $background['sizes']['full-width'];
	} else if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	} else {
		$background = get_field("event_hero_background", "option");
		$image = $background['sizes']['full-width'];
	} ?>

	<div id="event-hero" class="hero jumbotron" style="background-image: url('<?php echo $image; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 content">
					<h1><?php the_title(); ?></h1>
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

	<?php // Talks ---------------------------------------------------- ?>

	<?php $today = date('U'); ?>
	<?php $event_end_date = DateTime::createFromFormat('Ymd', get_field('end_date'))->format('U'); ?>

	<?php if($today > $event_end_date) { ?>
		<?php get_template_part( 'partials/event-talks', 'after' ); ?>
	<?php } else { ?>
		<?php get_template_part( 'partials/event-talks', 'before-during' ); ?>
	<?php } ?>

	<?php // Event About ---------------------------------------------- ?>

	<div id="event-about">
		<div class="container single-event-nav-container">
			<div class="row">
				<div class="col-xs-12">
					<?php if( have_rows('sections') ) { ?>
						<ul id="single-event-nav-tabs" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a data-target="#general" aria-controls="general" role="tab" data-toggle="tab">General</a>
							</li>
							<?php while ( have_rows('sections') ) : the_row(); ?>
								<?php $tabslug = sanitize_title(get_sub_field('subject')); ?>
								<li role="presentation">
									<a data-target="#<?php echo $tabslug ?>" aria-controls="<?php echo $tabslug ?>" role="tab" data-toggle="tab"><?php the_sub_field('subject'); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<?php if( have_rows('sections') ) { ?>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="general">
								<?php the_content(); ?>	
							</div>
							<?php while ( have_rows('sections') ) : the_row(); ?>
								<div role="tabpanel" class="tab-pane fade" id="<?php echo sanitize_title(get_sub_field('subject')) ?>">
									<?php the_sub_field('info'); ?>	
								</div>
							<?php endwhile; ?>
						</div>
					<?php } else { ?>
						<div class="about">
							<h2>About</h2>
							<?php the_content(); ?>
						</div>
					<?php } ?>
				</div>

				<div id="single-event-sidebar" class="col-xs-12 col-md-4 ">
					<div class="well">
						<h3>Details:</h3>
						<ul class="list-unstyled">
							<?php if (get_field('contact_email')): ?>
								<li><strong>Contact:</strong> <a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></li>
							<?php endif; ?>

							<?php if (get_field('start_date')): ?>
								<?php $start_date = DateTime::createFromFormat('Ymd', get_field('start_date')); ?>
								<li><strong>Start Date:</strong> <?php echo $start_date->format('F jS, Y'); ?></li>
							<?php endif; ?>

							<?php if (get_field('end_date') && (get_field('end_date') != get_field('start_date'))): ?>
								<?php $end_date = DateTime::createFromFormat('Ymd', get_field('end_date')); ?>
								<li><strong>End Date:</strong> <?php echo $end_date->format('F jS, Y'); ?></li>
							<?php endif; ?>

							<hr>

							<?php if (get_field('specific_location')): ?>
								<li><?php the_field('specific_location'); ?></li>
							<?php endif; ?>

							<hr>

							<?php if (get_field('facebook_event')): ?>
								<li><a href="<?php the_field('facebook_event'); ?>">Facebook Event</a></li>
							<?php endif; ?>

							<?php if (get_field('facebook_page')): ?>
								<li><a href="<?php the_field('facebook_page'); ?>">Facebook Page</a></li>
							<?php endif; ?>

							<?php if (get_field('ticketing')): ?>
								<li><a href="<?php the_field('ticketing'); ?>">Event Registration</a></li>
							<?php endif; ?>
						</ul>

						<?php if (get_field('sidebar_button')): ?>
								<?php the_field('sidebar_button'); ?>
						<?php endif; ?>
					</div>

					<div id="single-event-organizers" class="organizers-list">
						<h2>Organizers</h2>
						<?php if( have_rows('organizers') ): ?>
							<dl>
								<?php while ( have_rows('organizers') ) : the_row(); ?>
									<?php $organizer = get_sub_field('organizer'); ?>
									<div class="organizer-photo-container"><?php echo $organizer->organizer_photo; ?></div>
									<dt><?php echo $organizer->post_title; ?></dt>
									<dd><?php the_sub_field('duties'); ?> </dd>
								<?php endwhile; ?>
							</dl>
							
						<?php else: ?>
							<p>Organizers not listed.</p>
						<?php endif; ?>
					</div>
				</div>
			
			</div>

		</div>
	</div>
	
	<?php // Sponsors ------------------------------------------------- ?>

	<?php $sponsors = get_field('sponsors'); ?>

	<?php if ( $sponsors) :?>
		<div id="event-sponsors">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2>Sponsors</h2>
						<ul class="sponsors">
							<?php foreach( $sponsors as $sponsor): ?>
								<?php setup_postdata($sponsor); ?>
								<?php $imgObj = get_field('white_image', $sponsor); ?>
								<?php $image = $imgObj['sizes'][ '1000x400' ]; ?>
							 	<?php $sponsor_url = get_field('url', $sponsor); ?>
								<li class="sponsor-wrap">
									<a href="<?php echo $sponsor_url; ?>" target="_blank"><img alt="<?php the_title(); ?>" src="<?php echo $image; ?>"></a>
								</li>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php // Press ---------------------------------------------------- ?>

	<?php $articles = get_field('press');?>

	<?php if( $articles ) { ?>
		<div id="event-press">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2>Press</h2>
						<ul>
							<?php foreach ( $articles as $article ): ?>
								<?php $speaker = get_field('speaker', $article->ID); ?>
								<li>
									<a href="<?php echo get_permalink( $article->ID ); ?>">
										<?php echo $article->post_title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
