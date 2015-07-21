<?php
/**
 * Template Name: Chat Page
 *
 *
 * This page is a holder for a Slack Chat iFrame for
 * signing up on the BIL Slack Channel.
 *
 * A Heroku app has been created for automated adding
 * to the slack community.
 *
**/


get_header();
?>


<div id="slack-chat">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<script async defer src="https://bil-slack.herokuapp.com/slackin.js?large"></script>
			</div>
		</div>
	</div>
</div>




<?php get_footer(); ?>