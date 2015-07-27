<?php get_header(); ?>

	<?php if (get_field('speakers_hero_background', 'option')) { 
		$hero_bg_obj = get_field('speakers_hero_background', 'option');
		$hero_bg = $hero_bg_obj['sizes']['full-width'];
	} ?>

	<div id="speakers-hero" class="jumbotron" style="background-image: url('<?php echo $hero_bg; ?>');" >
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php $image = get_field('speakers_hero_foreground', 'option'); ?>
					<?php if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div id="speakers-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<h1>Speakers</h1>
					<?php the_field('speakers_content', 'option'); ?>
				</div>
				<div class="col-xs-12 col-sm-8">					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>	

<?php get_footer(); ?>