<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php 	//pass the youtube URL to function to grab video ID
			$youtube = get_field('youtube');
			$youtube_id = get_youtube_video_id( $youtube );


	?>
	<?php 	$speaker = get_field('speaker'); ?>
	<?php 	$event = get_field('event'); ?>


	<div id="talk-hero" class="hero jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-9">
					<div class="video-container">
					    <iframe src="<?php get_youtube_embed_url($youtube_id); ?>" frameborder="0" width="560" height="315"></iframe>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-3">
					<div class="live-chat-container">
						<iframe src="<?php get_youtube_live_chat_embed_url($youtube_id, 'bilconference.com'); ?>" frameborder="0" width="auto" height="506"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="talk-details" class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><?php the_title(); ?></h1>

				<p>
					<?php if( $speaker ) { ?>
						<a href="<?php echo get_permalink( $speaker->ID ); ?>"><?php echo get_the_title( $speaker->ID ); ?></a>
					<?php } else { ?> unknown <?php } ?>
					&nbsp;at&nbsp;
					<?php if( $event ) { ?>
						<a href="<?php echo get_permalink( $event->ID ); ?>">
							<?php echo get_the_title( $event->ID ); ?>
						</a>
					<?php } else { ?> unknown <?php } ?>
				</p>

				<?php the_content(); ?>
			</div>
		</div>
		
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>