<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="sponsor-hero" class="hero jumbotron" style="background-image: url('<?php echo $image; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Supporter: <?php the_title(); ?></h1>
					<?php the_field('about_long'); ?>
				</div>
			</div>
		</div>
	</div>	

<?php endwhile; endif; ?>

<?php get_footer(); ?>