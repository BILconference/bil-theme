<?php get_header(); ?>

	<div id="talk-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Talks</h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1><?php the_title(); ?></h1>

						<?php $speaker = get_field('speaker'); ?>
						<?php if( $speaker ) { ?>
							<a href="<?php echo get_permalink( $speaker->ID ); ?>">
								<?php echo get_the_title( $speaker->ID ); ?>
							</a>
						<?php } ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>