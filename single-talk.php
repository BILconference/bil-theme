<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="talk-hero" style="background-image: url('<?php echo $image; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>

					<?php $event = get_field('event'); ?>
					<?php if( $event ) { ?>
						<a href="<?php echo get_permalink( $event->ID ); ?>">
							<?php echo get_the_title( $event->ID ); ?>
						</a>
					<?php } ?>

					<?php $speaker = get_field('speaker'); ?>
					<?php if( $speaker ) { ?>
						<a href="<?php echo get_permalink( $speaker->ID ); ?>">
							<?php echo get_the_title( $speaker->ID ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>