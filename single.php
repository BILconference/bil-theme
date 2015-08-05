<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
	$author_email = get_the_author_meta( 'user_email' ); 
	$author_name = get_the_author_meta( 'display_name' );
	$author_image = get_avatar( get_the_author_meta( 'ID' ), 64 );
	$author_bio = get_the_author_meta( 'description' );
?>



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
						<?php the_post_thumbnail( 'full', $attr );  ?>
					</div>
				<?php } ?>

					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>

				<div class="author col-xs-12 col-md-8">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							
						</div>
						<div class="col-xs-12 col-sm-8">
							<span class="author-name"><?php echo $author_name; ?></span>
							<p class="author-bio"><?php echo $author_bio; ?></p>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-4">
					sidebar
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>