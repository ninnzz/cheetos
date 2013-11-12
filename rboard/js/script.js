$( function () {

	var id_list = [];
	var fresh_count = 0;
	var feed_cache = "";

	/* START THE FETCH */

	$.ajax( {
		type: "GET",
		url: "http://www.reliefboard.com/messages/feed"
	} ).done( function ( result ) {
		
		var html = "";

		_.each( result.data.result, function(d) {

			id_list.push(d.id);

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

	/* PRETTY DATE */
	
	setInterval( function() {

		$( ".timestamp" ).prettyDate();    
    
    }, 10000);

	/* FETCH  */

    setInterval( function() {

    	$.ajax( {
			type: "GET",
			url: "http://www.reliefboard.com/messages/feed"
		} ).done( function ( result ) {
			
			var html = "";

			_.each( result.data.result, function(d) {

			  	if(  ! ( $.inArray( d.id , id_list ) > -1 ) ) {

			  		id_list.push(d.id);

					html += '<div class="post msg col-lg-12" data-id=' + d.id + '>';
						html += '<p>' + decodeURIComponent(d.message) + '</p> ';
						html += '<p><span class="label label-default timestamp" data-time=' + d.date_created + '>' + d.date_created + '</span></p>';
						html += ' <p>' + decodeURIComponent(d.place_tag) + ", " + decodeURIComponent(d.sender) + ", " + d.sender_number +'</p>';
						html += '<div class="fb-share-button" data-href="http://www.reliefboard.com/m/' + d.id + '" data-type="button_count"></div>';
		        	html += '</div>';

		        	feed_cache = html + feed_cache;

		        	fresh_count = fresh_count + 1;

				}

			});

			if( fresh_count > 0 ) {
				$(".notif").show();
				$(".notif").css("display","block");
				$("#count").text(fresh_count);
			}

		});

    }, 5000);

	$(document).on("click", ".notif", function(e) {
		e.preventDefault();
	    $( "#msg" ).prepend( feed_cache );
	    $(".notif").hide();
	    $( ".timestamp" ).prettyDate();
	    feed_cache = "";
	    fresh_count = 0;
	});

    $( ".timestamp" ).prettyDate();

});