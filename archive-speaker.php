<?php get_header(); ?>

	<div id="speaker-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Speakers</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>	

<?php get_footer(); ?>