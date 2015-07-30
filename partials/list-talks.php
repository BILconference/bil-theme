<div id="talks-list">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Talks</h1>
				<?php the_field('talks_content', 'option'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<p>Browse by subject</p>
				<?php list_filter_taxonomies('subject'); ?>
			</div>
		</div>
		<div id="parent" class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-xs-12 col-sm-6 col-md-4 talk box <?php echo get_talk_categories( the_ID(), 'subject' ); ?>">
					<?php $youtube = get_field('youtube');
					$youtube_id = get_youtube_video_id( $youtube ); ?>
					<?php if ( $youtube_id ) { ?>
					<div class="thumbnail-container">
						<img class="img-responsive" src='http://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg' />
					</div>
					<?php } ?>
					<hr>
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