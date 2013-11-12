$( function () {

	$.ajax( {
		type: "GET",
		url: "/messages/feed?offset=&limit=&sort_by=&sort_order=dsc"

	} ).done( function ( result ) {
		
		var html = "";

		_.each( result.data, function(d) {

			html += '<div class="post msg col-lg-12" data-id=' + d.id + '>';
			
				html += '<p>' + d.message;
					html += '<span class="label label-default timestamp" data-time=' + d.date_created + '>' + d.date_created + '</span>';
				html += '</p>';

				html += '<p>' + d.place_tag + ", " + d.sender + '</p>';

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