<?php
	global $post;
	$field = get_post_meta($post->ID, 'redirect', true);
	if ($field) wp_redirect(clean_url($field), 301);
?>

<?php get_header(); ?>
<div class="event">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>">
				<header class="article-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<p class="byline vcard hide">
						<?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
					</p>
				</header>
				<section class="entry-content" itemprop="articleBody">
					<?php if (get_field('iframe')) { ?>
						<iframe seamless="seamless" border="0" height="1000" src="<?php the_field('iframe'); ?>" width="100%">
							<p>Your browser does not support iframes.</p>
						</iframe>
					<?php } else { ?>
						<div class="event-info">
							<div class="cf">
								<ul class="date-contact">
									<li>
										<span>Start Date:</span>
										<?php if (get_field('start_date')) { 
											$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
											echo $start_date->format('F jS, Y');
										} ?>
									</li>
									<li>
										<span>End Date:</span>
										<?php if (get_field('end_date')) { 
											$end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));
											echo $end_date->format('F jS, Y');
										} ?>
									</li>
									<li>
										<span>Contact:</span>
										<a href="mailto:<?php the_field('organizer_email'); ?>"><?php the_field('organizer_name'); ?></a>
									</li>
								</ul>
								<ul class="location cf">
									<li>
										<span>Location:</span>
										<?php the_field('general_location'); ?>
									</li>
									<li>
										<span>Address:</span>
										<address><?php the_field('specific_location'); ?></address>
									</li>
								</ul>
							</div>
							<p class="cf">
								<span>Social:</span>
								<?php if (get_field('facebook_event')) { ?>
									<a href="<?php the_field('facebook_event'); ?>">Facebook Event</a>
								<?php } ?>
								<?php if (get_field('facebook_page')) { ?>
									| <a href="<?php the_field('facebook_page'); ?>">Facebook Page</a>
								<?php } ?>
								<?php if (get_field('twitter')) { ?>
									| <a href="<?php the_field('twitter'); ?>">Twitter</a>
								<?php } ?>
								<?php if (get_field('ticketing')) { ?>
									<a href="<?php the_field('ticketing'); ?>">Tickets</a>
								<?php } ?>
							</p>
						</div>

						<?php if (get_field('ticketing_embed_code')) { ?>
							<h2>Ticketing</h2>
							<?php $embed = get_field('ticketing_embed_code'); ?>
							<?php echo sprintf($embed); ?>
						<?php } ?>

						<div class="content">
							<?php the_content(); ?>
						</div>
					<?php } ?>
				</section>
				<footer class="article-footer">
      				<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
				</footer>
			</article>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>