<?php $talks = get_posts(array(
	'post_type' => 'talk',
	'posts_per_page' => '100',
	'meta_query' => array(
		array(
			'key' => 'event', // name of custom field
			'value' => $post->ID, // matches exaclty "123", not just 123. This prevents a match for "1234"
			'compare' => '='
		)
	)
)); ?>


<div id="event-talks">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>Talks</h2>
				<ul>
					<?php foreach ( $talks as $talk ): ?>
						<?php $speaker = get_field('speaker', $talk->ID); ?>
						<li>
							<a href="<?php echo get_permalink( $talk->ID ); ?>">
								<?php echo $talk->post_title; ?>
							</a>
							 by 
							<a href="<?php echo get_permalink($speaker->ID); ?>">
								<?php echo $speaker->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>