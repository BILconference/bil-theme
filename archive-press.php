<?php get_header(); ?>
<?php $image = get_field('press_hero_foreground', 'option'); ?>
<?php if( !empty($image) ): ?>
	<div id="press-hero" class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

	<div id="press-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<h2>Press</h2>
					<?php the_field('press_content', 'option'); ?>
				</div>
				<div class="col-xs-12 col-sm-8">
					<ul>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> by <a href="<?php the_field('url') ?>"><?php the_field('publisher'); ?></a>
						</li>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>