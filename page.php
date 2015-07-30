<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-push-4">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="col-xs-12 col-md-4 col-md-pull-8">
					sidebar
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>