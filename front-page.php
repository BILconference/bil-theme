<?php get_header(); ?>
<?php

if( have_rows('modules') ):
	while ( have_rows('repeater_field_name') ) : the_row();
		the_sub_field('sub_field_name');
	endwhile;
else:
	// no rows found
endif;

?>
	<div class="container-fluid" id="module-hero">
		<div class="row">
			<div class="col-xs-12">
				Hero Module
				This should be full width
			</div>
		</div>
	</div>
	<div class="container-fluid" id="module-map">
		<div class="row">
			<div class="col-xs-12">
				Map Module
				This should be full width
			</div>
		</div>
	</div>
	<div class="container-fluid" id="module-intro">
		<div class="row">
			<div class="col-xs-12">
				Intro Module
				This should be full width
			</div>
		</div>
	</div>
	<div class="container-fluid" id="module-sponsors">
		<div class="row">
			<div class="col-xs-12">
				Sponsors
				This should be full width
			</div>
		</div>
	</div>
	<div class="container-fluid" id="module-cta">
		<div class="row">
			<div class="col-xs-12">
				Call to Action
				This should be full width
			</div>
		</div>
	</div>
<?php get_footer(); ?>