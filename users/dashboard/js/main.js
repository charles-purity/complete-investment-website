"use strict";

$(function() {
	
	$("[data-copy]").click(function() {
		var el = $(this.dataset.copy).get(0);
		if( el ) {
			el.select();
			document.execCommand('copy');
			alert( 'Copied the text: ' + el.value );
		}
	});
	
});