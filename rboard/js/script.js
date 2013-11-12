$( function () {

	var prepend = [];

	$.ajax( {
		type: "GET",
		url: "http://www.reliefboard.com/messages/feed"
	} ).done( function ( result ) {
		
		var html = "";

		_.each( result.data.result, function(d) {

			prepend.push(d.id);

			html += '<div class="post msg col-lg-12" data-id=' + d.id + '>';
			
				html += '<p>' + unescape(decodeURIComponent(d.message)) + '</p> ';

				html += '<p><span class="label label-default timestamp" data-time=' + d.date_created + '>' + d.date_created + '</span></p>';

				html += ' <p>' + unescape(decodeURIComponent(d.place_tag)) + ", " + unescape(decodeURIComponent(d.sender)) + ", " + d.sender_number +'</p>';

				html += '<div class="fb-share-button" data-href="http://www.reliefboard.com/m/' + d.id + '" data-type="button_count"></div>';

        	html += '</div>';

		});

        $( "#msg" ).append( html );
        $( ".timestamp" ).prettyDate();

	});
	
	setInterval( function() {
	
		$( ".timestamp" ).prettyDate();
    
    }, 10000);

    setInterval( function() {

    	console.log(prepend);

    	$.ajax( {
			type: "GET",
			url: "http://www.reliefboard.com/messages/feed"
		} ).done( function ( result ) {
			
			var html = "";

			_.each( result.data.result, function(d) {

			  	if(  ! ( $.inArray( d.id , prepend ) > -1 ) ) {

			  	prepend.push(d.id);

				html += '<div class="post msg col-lg-12" data-id=' + d.id + '>';
				
					html += '<p>' + decodeURIComponent(d.message) + '</p> ';

					html += '<p><span class="label label-default timestamp" data-time=' + d.date_created + '>' + d.date_created + '</span></p>';

					html += ' <p>' + decodeURIComponent(d.place_tag) + ", " + decodeURIComponent(d.sender) + ", " + d.sender_number +'</p>';

					html += '<div class="fb-share-button" data-href="http://www.reliefboard.com/m/' + d.id + '" data-type="button_count"></div>';

	        	html += '</div>';

				}

			});

	        $( "#msg" ).prepend( html );
	        $( ".timestamp" ).prettyDate();

		});

    }, 5000); 

    $( ".timestamp" ).prettyDate();

});