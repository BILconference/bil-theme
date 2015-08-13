<?php get_header(); ?>

	<div id="blog-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9 col-md-push-3 content">
					<div class="row">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-xs-12 post">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 col-md-pull-9 sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>	

<?php get_footer(); ?>