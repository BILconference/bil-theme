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
	<?php if (get_field("hero_background")) {
		$background = get_field("hero_background");
		$image = $background['sizes']['full-width'];
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

	<div id="event-about">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<div class="about">
						<h2>About</h2>
						<?php the_content(); ?>
					</div>
					<div class="row">
						<div class="address col-xs-12 col-md-6">
							<h2>Address</h2>
							<address><?php the_field('specific_location'); ?></address>
						</div>
						
						<div class="social col-xs-12 col-md-6">
							<h2>Social</h2>
							<ul>
								<?php if (get_field('facebook_event')) { ?>
									<li><a href="<?php the_field('facebook_event'); ?>">Facebook Event</a></li>
								<?php } ?>
								<?php if (get_field('facebook_page')) { ?>
									<li><a href="<?php the_field('facebook_page'); ?>">Facebook Page</a></li>
								<?php } ?>
								<?php if (get_field('twitter')) { ?>
									<li><a href="<?php the_field('twitter'); ?>">Twitter</a></li>
								<?php } ?>
								<?php if (get_field('ticketing')) { ?>
									<li><a href="<?php the_field('ticketing'); ?>">Tickets</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>

					<div class="ticketing">
						<?php if (get_field('ticketing_embed_code')) { ?>
							<h2>Ticketing</h2>
							<?php $embed = get_field('ticketing_embed_code'); ?>
							<?php echo sprintf($embed); ?>
						<?php } ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 organizers-list">
					<h2>Organizers</h2>
					<?php if( have_rows('organizers') ): ?>
						<dl>
							<?php while ( have_rows('organizers') ) : the_row(); ?>
								<?php $organizer = get_sub_field('organizer'); ?>
								<dt><?php echo $organizer->post_title; ?></dt>
								<dd><?php the_sub_field('duties'); ?></dd>
							<?php endwhile; ?>
						</dl>
					<?php else: ?>
						<p>Organizers not listed.</p>
					<?php endif; ?>
				</div>
			</div>
			<?php if( have_rows('sections') ) { ?>
				<div class="row">
					<div class="col-xs-12">
						<ul class="nav nav-tabs" role="tablist">
							<?php $tab_i = 0; ?>
							<?php while ( have_rows('sections') ) : the_row(); ?>
    							<li role="presentation" <?php if ($tab_i == 0) { ?>class="active"<?php } ?>>
    								<a href="#<?php sanitize_title(get_sub_field('subject')) ?>" aria-controls="<?php sanitize_title(get_sub_field('subject')) ?>" role="tab" data-toggle="tab"><?php the_sub_field('subject'); ?></a>
    							</li>
    							<?php $i++ ?>
    						<?php endwhile; ?>
						</ul>
						<div class="tab-content">
							<?php $panel_i = 0; ?>
							<?php while ( have_rows('sections') ) : the_row(); ?>
								<div role="tabpanel" class="tab-pane <?php if ($tab_i == 0) { ?>active<?php } ?>" id="<?php sanitize_title(get_sub_field('subject')) ?>">
									<?php the_sub_field('info'); ?>	
								</div>
  						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<div id="event-talks">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Talks</h2>
					<?php $talks = get_posts(array(
						'post_type' => 'talk',
						'posts_per_page' => '50',
						'meta_query' => array(
							array(
								'key' => 'event', // name of custom field
								'value' => $post->ID, // matches exaclty "123", not just 123. This prevents a match for "1234"
								'compare' => '='
							)
						)
					)); ?>
					<?php if( $talks ) { ?>
						<ul>
							<?php foreach( $talks as $talk ): ?>
								<?php $speaker = get_field('speaker', $talk->ID); ?>
								<li>
									<a href="<?php echo get_permalink( $talk->ID ); ?>">
										<?php echo $talk->post_title; ?>
									</a>
									 by 
									<a href="<?php echo get_permalink($speaker->ID); ?>">
										<?php echo $speaker->post_title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php } else { ?>
						<p>No talks listed, yet.</p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div id="event-sponsors">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Sponsors</h2>
				</div>
			</div>
		</div>
	</div>

	<div id="event-cta">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Get ahold of us...</h2>
					<span>Contact:</span> <a href="mailto:<?php the_field('organizer_email'); ?>"><?php the_field('organizer_name'); ?></a>
					<strong><?php echo $target; ?></strong>
					<?php // echo do_shortcode( '[gravityform id="2" title="false" description="false" field_values="event_email=' . $target . '"]' ); ?>
					<?php echo do_shortcode( '[gravityform id="2" title="false" description="false"]' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>