<?php get_header(); ?>

	<div class="single-post">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9 col-md-push-3 content">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php if ( has_post_thumbnail() ) { ?>
						<?php $attr = array('class' => 'img-responsive');?>
							<div class='post-featured-image'>
								<?php the_post_thumbnail( 'full', $attr );  ?>
							</div>
						<?php } ?>

						<h1><?php the_title(); ?></h1>
						<p class="by-line">
							<?php the_time('j F Y') ?> by <?php the_author() ?>
						</p>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>	
				<div class="col-xs-12 col-md-3 col-md-pull-9 sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>