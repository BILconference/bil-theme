<?php
// TODO: 
//

get_header();
?>


<div id="documentation">
	<div class="container">
		<div class="row">			
			<div class="sidebar col-xs-12 col-sm-3">
				<?php // MENU
				if( have_rows('resources_page') ): ?>
					<div id="sidebar-menu">
						<h2><?php the_title(); ?></h2>
						<ul class="sections">
							<?php while( have_rows('resources_page') ): the_row(); ?>
								<?php
									$section_title = get_sub_field('resource_title');
									$section_content = get_sub_field('resource_content');
									$section_anchor = get_sub_field('resource_anchor');
								?>

								<li class="section">
									<a href="#<?php echo $section_anchor; ?>"><?php echo $section_title; ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			
			<div class="content col-xs-12 col-sm-9">
				<?php if( have_rows('resources_page') ): ?>
					<ul class="sections">
						<?php while( have_rows('resources_page') ): the_row(); ?>
							<?php
								$section_title = get_sub_field('resource_title');
								$section_content = get_sub_field('resource_content');
								$section_anchor = get_sub_field('resource_anchor');
							?>

							<div id="<?php echo $section_anchor; ?>" class="section">
								<h2><?php echo $section_title; ?></h2>
								<br/>
								<?php echo $section_content; ?>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>




<?php get_footer(); ?>