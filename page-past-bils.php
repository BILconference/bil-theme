<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="page-<?php $post->post_name; ?>" class="page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<h1><?php the_title(); ?></h1>
					<?php $past_bils = past_bils(); ?>
					<?php if ($past_bils->have_posts() ) : ?>
						<ul>
							<?php while ( $past_bils->have_posts() ) : $past_bils->the_post(); ?>
								<li><?php the_title() ?> - <?php echo $post->ID; ?></li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
				<div class="col-xs-12 col-md-4">
					sidebar
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>