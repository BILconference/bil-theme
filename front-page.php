<?php get_header(); ?>
	<?php $mods = get_field('modules'); ?>

	<?php if( $mods ) : ?>
		<?php foreach( $mods as $mod): ?>
			<?php get_template_part( 'partials/mod', $mod->post_name ); ?>
		<?php endforeach; ?>
	<?php endif; ?>

<?php get_footer(); ?>