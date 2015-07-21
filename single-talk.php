<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="talk-hero" style="background-image: url('<?php echo $image; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>

					<?php $speaker = get_field('speaker'); ?>
					<?php $event = get_field('event'); ?>

					<p>
						<?php if( $speaker ) { ?>
							<a href="<?php echo get_permalink( $speaker->ID ); ?>">
								<?php echo get_the_title( $speaker->ID ); ?> 
							</a>
						<?php } else { ?> unknown <?php } ?>
						at
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
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>