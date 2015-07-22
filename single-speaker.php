<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="speaker-hero" style="background-image: url('<?php echo $image; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
					<?php if( get_field( "association" ) ): ?>
						<p><?php the_field( "association" ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<h2>Bio:</h2>
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
								<?php $event = get_field('event'); ?>
								<li>
									<a href="<?php echo get_permalink(); ?>">
										<?php the_title(); ?> at <?php echo $event->post_title; ?>
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