<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9 col-md-push-3 content">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="col-xs-12 col-md-3 col-md-pull-9 sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>