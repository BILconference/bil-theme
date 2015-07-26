<?php get_header(); ?>

	<div id="talk-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Talks</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<?php if (get_field('speaker')) { ?>
							<?php $speaker = get_field('speaker'); ?>
							<a href="<?php echo get_permalink( $speaker->ID ); ?>">
								<?php echo $speaker->post_title; ?>
							</a>
						<?php } ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>