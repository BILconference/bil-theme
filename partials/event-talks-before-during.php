<?php $talks = get_posts(array(
	'post_type' => 'talk',
	'posts_per_page' => '100',
	'meta_query' => array(
		array(
			'key' => 'event', // name of custom field
			'value' => $post->ID, // matches exaclty "123", not just 123. This prevents a match for "1234"
			'compare' => '='
		)
	),
	'meta_key' => 'start_time',
	'orderby' => 'meta_value'
)); ?>

<?php if($talks) { ?>
	<div id="event-talks">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Schedule</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Time</th>
									<th>Speaker</th>
									<th>Title</th>
								</tr>
							</thead>
							<?php foreach ( $talks as $talk ): ?>
								<?php $speaker = get_field('speaker', $talk->ID); ?>
								<tr>
									<td><?php echo $talk->start_time; ?></td>
									<td><?php echo $talk->start_time; ?></td>
									<td>
										<a href="<?php echo get_permalink( $talk->ID ); ?>">
											<?php echo $talk->post_title; ?>
										</a>
									</td>
									<td>
										<a href="<?php echo get_permalink($speaker->ID); ?>">
											<?php echo $speaker->post_title; ?>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }