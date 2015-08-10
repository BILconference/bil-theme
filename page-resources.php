<?php
// TODO: 
//

get_header();
?>


<div id="documentation" class="content">
	<div class="container">
		<div class="row">
			
			<div class="sidebar col-xs-12 col-sm-3">
				<?php // MENU
				if( have_rows('resources_page') ): ?>

					<ul id="sidebar-menu" class="sections" data-spy="affix" data-offset-top="280">

					<?php while( have_rows('resources_page') ): the_row(); 
						
						$section_title = get_sub_field('resource_title');
						$section_content = get_sub_field('resource_content');
						$section_anchor = get_sub_field('resource_anchor');
						?>

						<li class="section">
							<a href="#<?php echo $section_anchor; ?>"><?php echo $section_title; ?></a>
						</li>

					<?php endwhile; ?>

					</ul>

				<?php endif; ?>
			</div>
			
			<div class="col-xs-12 col-sm-9">
				<?php if( have_rows('resources_page') ): ?>

					<ul class="sections">

					<?php while( have_rows('resources_page') ): the_row(); 

						// vars
						
						$section_title = get_sub_field('resource_title');
						$section_content = get_sub_field('resource_content');
						$section_anchor = get_sub_field('resource_anchor');
						

						?>

						<li id="<?php echo $section_anchor; ?>" class="section">


								<?php echo $section_title; ?>
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