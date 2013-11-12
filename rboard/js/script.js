$( function () {

	$.ajax( {
		type: "GET",
		url: "http://www.reliefboard.com/messages/feed"
	} ).done( function ( result ) {
		
		var html = "";

		_.each( result.data.result, function(d) {


			html += '<div class="post msg col-lg-12" data-id=' + d.id + '>';
			
				html += '<p>' + decodeURIComponent(d.message) + '</p> ';

				html += '<p><span class="label label-default timestamp" data-time=' + d.date_created + '>' + d.date_created + '</span></p>';

				html += ' <p>' + decodeURIComponent(d.place_tag) + ", " + decodeURIComponent(d.sender) + ", " + d.sender_number +'</p>';

				html += '<div class="fb-share-button" data-href="http://www.reliefboard.com/m/' + d.id + '" data-type="button_count"></div>';

        	html += '</div>';

		});

        $( "#msg" ).append( html );
        $( ".timestamp" ).prettyDate();

	});
	
	setInterval( function() {
      $( ".timestamp" ).prettyDate();
    }, 10000);

    $( ".timestamp" ).prettyDate();

});