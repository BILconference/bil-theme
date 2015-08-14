<?php get_header(); ?>

	<?php if (get_field('speakers_hero_background', 'option')) { 
		$hero_bg_obj = get_field('speakers_hero_background', 'option');
		$hero_bg = $hero_bg_obj['sizes']['full-width'];
	} ?>

	<div id="speakers-hero" class="hero jumbotron" style="background-image: url('<?php echo $hero_bg; ?>');" >
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
					<div class="row" id="featured">
						<?php if (have_posts()) { ?>
							<h2>Featured Past Speakers</h2>
							<?php while (have_posts()) : the_post(); ?>
								<div class="col-xs-12 col-sm-6 col-md-4 speaker">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) {
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '300x300' ); 
											if ($image) {
												echo '<img src="' . $image[0] . '" class="img-responsive" />';
											}
										} else {
											echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/library/images/blank-person.png" class="img-responsive" />';
										} ?>
										<h3><?php the_title(); ?></h3>
									</a>
								</div>
							<?php endwhile; ?>
						<?php } ?>
					</div>
					<div class="row" id="non-featured">
						<div class="col-xs-12">
							<?php $nfs = non_featured_speakers(); ?>
							<?php if ( $nfs->have_posts() ) { ?>
								<h2>Full List of Past Speakers</h2>
								<div>
									<?php while ( $nfs->have_posts() ) : $nfs->the_post(); ?>
										<a href="<?php the_permalink(); ?>" class="speaker"><?php the_title(); ?></a>
									<?php endwhile; ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	

<?php get_footer(); ?>