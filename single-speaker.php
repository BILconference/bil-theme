<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="speaker-hero">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 content bigtext">
					<h1><?php the_title(); ?></h1>
					<?php if( get_field( "association" ) ): ?>
						<p><?php the_field( "association" ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="speaker-about">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<h2>Biography</h2>
					<?php the_content(); ?>
				</div>
				<div class="col-xs-12 col-md-6">
					<h2>Talks Given</h2>
					<?php $talks = get_posts(array(
						'post_type' => 'talk',
						'meta_query' => array(
							array(
								'key' => 'speaker', // name of custom field
								'value' => $post->ID, // matches exaclty "123", not just 123. This prevents a match for "1234"
								'compare' => '='
							)
						)
					)); ?>
					<?php if( $talks ): ?>
						<ul>
							<?php foreach( $talks as $talk ): ?>
								<?php $event = get_field('event', $talk->ID); ?>
								<li>
									<a href="<?php echo get_permalink($talk->ID); ?>">
										<?php echo get_the_title($talk->ID); ?>
									</a>
									 at 
									<a href="<?php echo get_permalink($event->ID); ?>">
										<?php echo $event->post_title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>