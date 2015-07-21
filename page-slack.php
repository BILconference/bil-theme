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


// TODO: 
// - If we want we can add in the WP Content as an upper description.
// - Add in instructions, custom emojis, etc as a reference
// - List out current slack channels (requires API integration)

get_header();
?>


<div id="join-slack">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="iframe-wrapper">
					<iframe style="width:100%; height:400px;" src="https://bil-slack.herokuapp.com/" scrolling="no"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>




<?php get_footer(); ?>