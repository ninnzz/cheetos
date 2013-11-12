$( function () {

	var id_list = [];
	var fresh_count = 0;
	var feed_cache = "";


	function post_template (d) {
		var html = "";
		html += '<div class="post msg col-lg-7 col-md-offset-3" data-id=' + d.id + '>';
			html += '<p>' + unescape(decodeURIComponent(d.message)) + '</p> ';
			html += ' <p>' + unescape(decodeURIComponent(d.place_tag)) + ", " + unescape(decodeURIComponent(d.sender)) + ", " + d.sender_number +'</p>';
			html += '<p><span class="label label-default timestamp" data-time=' + d.date_created + '>' + d.date_created + '</span></p>';
			html += '<div class="fb-share-button" data-href="http://www.reliefboard.com/" data-type="button_count"></div>';
        html += '</div>';
        return html;
	}

	function init () {

		/* START THE FETCH */

		$.ajax( {
			type: "GET",
			url: "http://www.reliefboard.com/messages/feed"
		} ).done( function ( result ) {
			
			var html = "";

			_.each( result.data.result, function(d) {
				
				id_list.push(d.id);
				html = html + post_template(d);

			});

			$( "#msg" ).html("");
	        $( "#msg" ).append( html );
	        $( ".timestamp" ).prettyDate();

		});

	}

	init();

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
			var title = $("title").text();
			title = title.replace(/\([1-9][0-9]{0,2}\)/g, '');

			_.each( result.data.result, function(d) {

			  	if(  ! ( $.inArray( d.id , id_list ) > -1 ) ) {
			  		id_list.push(d.id);
			  		html = html + post_template(d);
		        	feed_cache = html + feed_cache;
		        	fresh_count = fresh_count + 1;
				}

			});

			if( fresh_count > 0 ) {
				$(".notif").show();
				$(".notif").css("display","block");
				$("#count").text(fresh_count);
				$("title").text(title + " (" + fresh_count + ")" );
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
	    var title = $("title").text();
	    title = title.replace(/\([1-9][0-9]{0,2}\)/g, '');
        $("title").text(title)
	});

	$(document).on("keyup", "#search", function(e) {

		var val = $(this).val();
		var search_count = 0;

		 $( "#search-count" ).text(search_count);

		if( val.length > 0 ) {
			$(".search-container").show();
		} else {
			$(".search-container").hide();
			init();
			return;
		}

		$.ajax( {
			type: "GET",
			url: "http://reliefboard.com/messages/search?q=" + val
		} ).done( function ( result ) {
			
			var html = "";

			_.each( result.data.result, function(d) {
				
				id_list.push(d.id);
				html = html + post_template(d);
				search_count = search_count + 1;

			});

			$( "#msg" ).html("");
	        $( "#msg" ).append( html );
	        $( ".timestamp" ).prettyDate();
	        $( "#search-count" ).text(search_count);

		});

	});

    $( ".timestamp" ).prettyDate();

});