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

	<div id="event-about">
		<div class="container single-event-nav-container">
			<div class="row">
				<div class="col-xs-12">
					<?php if( have_rows('sections') ) { ?>
						<ul id="single-event-nav-tabs" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a>
							</li>
							<?php $tab_i = 0; ?>
							<?php while ( have_rows('sections') ) : the_row(); ?>
								<li role="presentation" <?php if ($tab_i == 0) { ?><?php } ?>>
									<a href="#<?php echo sanitize_title(get_sub_field('subject')) ?>" aria-controls="<?php echo sanitize_title(get_sub_field('subject')) ?>" role="tab" data-toggle="tab"><?php the_sub_field('subject'); ?></a>
								</li>
								<?php $tab_i++ ?>
							<?php endwhile; ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="container"
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<?php if( have_rows('sections') ) { ?>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="general">
								<h3>General</h3>
								<?php the_content(); ?>	
							</div>
							<?php $panel_i = 0; ?>
							<?php while ( have_rows('sections') ) : the_row(); ?>
								<div role="tabpanel" class="tab-pane fade" id="<?php echo sanitize_title(get_sub_field('subject')) ?>">
									<h3><?php the_sub_field('subject'); ?></h3>
									<?php the_sub_field('info'); ?>	
								</div>
								<?php $panel_i++ ?>
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
					<div id="single-event-logo">
						<?php 
						$logo = get_field("logo");
						if ( $logo ): ?>

						<?php else: ?>

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

	<?php // Talks -------------------------------------------------- ?>

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
		<div id="event-talks">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2>Talks</h2>
						<ul>
							<?php foreach ( $talks as $talk ): ?>
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
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
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

	<?php // Press -------------------------------------------------- ?>

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