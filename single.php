<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="" class="single-post content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
				<?php if ( has_post_thumbnail() ) { ?>
				<?php $attr = array(
								'class' => 'img-responsive'
					  ); 
				?>
					<div class='post-featured-image'>
						<?php the_post_thumbnail( 'large', $attr );  ?>
					</div>
				<?php } ?>

					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="col-xs-12 col-md-4">
					sidebar
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>