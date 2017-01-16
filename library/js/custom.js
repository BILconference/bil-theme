jQuery(document).ready(function($) {
	// Allows us to use a class to create DIV TEXT FILLING GOODNESS.
	$('.bigtext').bigtext();

	// Javascript to enable link to tab
	const url = document.location.toString();
	if (url.match('#')) {
		$('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
	}

	// Change hash for page-reload
	$('.nav-tabs a').on('shown.bs.tab', function(e) {
		window.location.hash = e.target.hash;
	});

	var localtz = moment.tz.guess();
	console.log(localtz);

	$('[data-date]').each(function(i, x) {
		var fmt = $(x).data('format');
		var date = moment.unix($(x).data(date));
		var text = date.tz("America/Los_Angeles").format(fmt);

		$(x).text(text);
	});
});
