<?php get_header(); ?>

<div id="stream-list">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<h2>Global</h2>
				<?php 
					$page = get_posts(
								    array(
								        'name'      => 'global',
								        'post_type' => 'page'
								    ) );
					if ( $page )
					{
					    echo $page[0]->post_content;
					}

				?>
			</div>
			<div class="col-xs-12 col-sm-8">
				<ul>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li>
						<a href="<?php the_field('url') ?>"><?php the_title(); ?></a> by <a href="<?php the_field('url') ?>"><?php the_field('publisher'); ?></a>
					</li>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>