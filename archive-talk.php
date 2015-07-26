<?php get_header(); ?>

	<div id="talk-hero" class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php $image = get_field('talk_image', 'option'); ?>
					<?php if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div id="talk-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Talks</h1>
				</div>
			</div>
			<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="col-xs-12 col-sm-6 col-md-4 talk">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php if (get_field('speaker')) { ?>
							<?php $speaker = get_field('speaker'); ?>
							<a href="<?php echo get_permalink( $speaker->ID ); ?>">
								<?php echo $speaker->post_title; ?>
							</a>
						<?php } ?>

						<?php if (get_field('event')) { ?>
							<?php $event = get_field('event'); ?>
							 @ 
							<a href="<?php echo get_permalink( $event->ID ); ?>">
								<?php echo $event->post_title; ?>
							</a>
						<?php } ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>