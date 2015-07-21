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

	<div id="event-hero" style="background-image: url('<?php echo $image; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
					<?php the_field('general_location'); ?><br>
					<?php if (get_field('start_date')) { 
						$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
						echo $start_date->format('F jS, Y');
					} ?>
					<?php if (get_field('end_date')) { 
						echo " &#9658; ";
						$end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));
						echo $end_date->format('F jS, Y');
					} ?>
				</div>
			</div>
		</div>
	</div>

	<div id="event-about">
		<div class="container">
			<div class="row">
				<h2>About</h2>
				<div class="col-xs-12 col-md-8 content">
					<?php the_content(); ?>
				</div>
				<div class="col-xs-12 col-md-4">
					<h2>Organizers</h2>
					<ul>
						<li>Cody Marx Bailey</li>
						<li>Michael Cummings</li>
						<li>Ryan Plesko</li>
						<li>Brad Shende</li>
						<li>Jackson Smith</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="event-talks">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Talks</h2>
					<?php $talks = get_posts(array(
						'post_type' => 'talks',
						'meta_query' => array(
							array(
								'key' => 'event', // name of custom field
								'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
								'compare' => 'LIKE'
							)
						)
					)); ?>
					<?php if( $talks ): ?>
						<ul>
							<?php foreach( $talks as $talk ): ?>
								<li>
									<a href="<?php echo get_permalink( $talk->ID ); ?>">
										<?php echo get_the_title( $talk->ID ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
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
					Call to Action
				</div>
			</div>
		</div>
	</div>


		<?php if (get_field('iframe')) { ?>
			<iframe seamless="seamless" border="0" height="1000" src="<?php the_field('iframe'); ?>" width="100%">
				<p>Your browser does not support iframes.</p>
			</iframe>
		<?php } else { ?>
			<div class="event-info">
				<ul class="date-contact">
					<li>
						<span>Start Date:</span>
						<?php if (get_field('start_date')) { 
							$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
							echo $start_date->format('F jS, Y');
						} ?>
					</li>
					<li>
						<span>End Date:</span>
						<?php if (get_field('end_date')) { 
							$end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));
							echo $end_date->format('F jS, Y');
						} ?>
					</li>
					<li>
						<span>Contact:</span>
						<a href="mailto:<?php the_field('organizer_email'); ?>"><?php the_field('organizer_name'); ?></a>
					</li>
				</ul>
				<ul class="location cf">
					<li>
						<span>Location:</span>
						<?php the_field('general_location'); ?>
					</li>
					<li>
						<span>Address:</span>
						<address><?php the_field('specific_location'); ?></address>
					</li>
				</ul>

				<span>Social:</span>
				<?php if (get_field('facebook_event')) { ?>
					<a href="<?php the_field('facebook_event'); ?>">Facebook Event</a>
				<?php } ?>
				<?php if (get_field('facebook_page')) { ?>
					| <a href="<?php the_field('facebook_page'); ?>">Facebook Page</a>
				<?php } ?>
				<?php if (get_field('twitter')) { ?>
					| <a href="<?php the_field('twitter'); ?>">Twitter</a>
				<?php } ?>
				<?php if (get_field('ticketing')) { ?>
					<a href="<?php the_field('ticketing'); ?>">Tickets</a>
				<?php } ?>
			</div>

			<?php if (get_field('ticketing_embed_code')) { ?>
				<h2>Ticketing</h2>
				<?php $embed = get_field('ticketing_embed_code'); ?>
				<?php echo sprintf($embed); ?>
			<?php } ?>
		<? } ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>