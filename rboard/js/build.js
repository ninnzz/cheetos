$( function () {

	var id_list = [];
	var fresh_count = 0;
	var feed_cache = "";

	function post_template (d) {
		var html = _.template( $("#post").html() , {d:d} );
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
	        $( ".time" ).prettyDate();

		});

	}

	function trim(s) { 
	    s = s.replace(/(^\s*)|(\s*$)/gi,"");
	    s = s.replace(/[ ]{2,}/gi," "); 
	    s = s.replace(/\n /,"\n"); return s;
	}

	setInterval( function() {
		$( ".time" ).prettyDate();    
    }, 10000);

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
				$(".notif").parent().show();
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
	    $(".notif").parent().hide();
	    $( ".time" ).prettyDate();
	    feed_cache = "";
	    fresh_count = 0;
	    var title = $("title").text();
	    title = title.replace(/\([1-9][0-9]{0,2}\)/g, '');
        $("title").text(title);
        FB.XFBML.parse();
        $.getScript('http://platform.twitter.com/widgets.js');
	});

   $(document).on("click", ".share", function(e) {

   		e.preventDefault();
   		
   		var id = $(this).attr("data-id");
   		var msg = $(this).attr("data-msg");
   		var place_tag = $(this).attr("data-place-tag");
   		var sender = $(this).attr("data-sender");

   		$("#tw-container").html("");
   		$("#tw-container").html($("#twTemplate").html());

   		$("#fb").attr("data-href","http://www.reliefboard.com/rboard/post.php?id=" + id);
   		$("#tw").attr("data-text", unescape(decodeURIComponent(msg)) + ' - ' + unescape(decodeURIComponent(place_tag)) + ' - ' + unescape(decodeURIComponent(sender)) + ' #reliefboard VIA reliefboard.com');

   		//Refresh Social Network Share Buttons
   		
	    FB.XFBML.parse();
	    $.getScript('http://platform.twitter.com/widgets.js');

	    $("#shareModal").modal("show");

   });

   $(document).on("click","#viaweb", function(e) {
   		e.preventDefault();
   		$("#viawebModal").modal("show");
   });


   $(document).on("click","#viawebSend", function(e) {
   		e.preventDefault();
   		$("#viawebModal").modal("show");
   		   		var location = $("#form-location").val();
   		var name = $("#form-name").val();
   		var message = $("#form-message").val();

   		var data = {
   			user_number: "",
   			address: location,
   			name: name,
   			message: message
   		};

   		if( trim(name) == " " || trim(message) == " " || trim(name) == "" || trim(message) == " " ) {
   			alert("Your Name and Message is required");
   			return;
   		}

   		$.post('http://reliefboard.com/messages/feed', data).done( function( result ) {

   			var html = "";

			_.each( result.data.result, function(d) {
				id_list.push(d.id);
				html = html + post_template(d);
			});

   		});

   					$("#form-location").val("");
			$("#form-name").val("");
			$("#form-message").val("");

	        $( "#msg" ).append( html );
	        $( ".time" ).prettyDate();

	        $("#viawebModal").modal("hide");
   });

   $(document).on("keypress","#search", function(e) {

   		if( e.which == 13 && $(this).val() != "" ) {

        	alert('You pressed enter!');

    	}

   });

	//Start Application
	init();

});