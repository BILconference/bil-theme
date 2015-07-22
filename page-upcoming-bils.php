<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="page-<?php $post->post_name; ?>" class="page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<h1><?php the_title(); ?></h1>
					asdf
				</div>
				<div class="col-xs-12 col-md-4">
					sidebar
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>