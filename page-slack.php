<?php
// TODO: 
// - If we want we can add in the WP Content as an upper description.
// - Add in instructions, custom emojis, etc as a reference
// - List out current slack channels (requires API integration)

get_header();
?>


<div id="join-slack" class="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="iframe-wrapper">
					<iframe style="width:100%; height:400px;" src="https://bil-slack.herokuapp.com/" scrolling="no"></iframe>
				</div>
			</div>
		</div>

		<div class="row">
			<h2>What is Slack??</h2>
			<p>Slack is a comminication tool for teams that allows organized chats.  We use it here at BIL because we have different communities all over the world who occasionally need to communicate with one another. Slack helps us do that efficiently.</p>
			
		</div>
	</div>
</div>




<?php get_footer(); ?>