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

   		FB.getLoginStatus(function(response) {

		if (response.status === 'connected') {
		    // the user is logged in and has authenticated your
		    // app, and response.authResponse supplies
		    // the user's ID, a valid access token, a signed
		    // request, and the time the access token 
		    // and signed request each expire
		    var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;

		    FB.api('/me', function(response) {
  				$("#authenticated-name").text(response.name);
			});

		    $("#loginToFacebook").hide();
		    $("#authenticated").show();

		  } else if (response.status === 'not_authorized') {
		    // the user is logged in to Facebook, 
		    // but has not authenticated your app
		  } else {
		    // the user isn't logged in to Facebook.
		  }

		 });

   		FB.Event.subscribe('auth.authResponseChange', function(response) {
		    // Here we specify what we do with the response anytime this event occurs. 
		    if (response.status === 'connected') {
		      // The response object is returned with a status field that lets the app know the current
		      // login status of the person. In this case, we're handling the situation where they 
		      // have logged in to the app.
		      $("#loginToFacebook").hide();
			  $("#authenticated").show();

			FB.api('/me', function(response) {
				$("#authenticated-name").text(response.name);
			});

		    } else if (response.status === 'not_authorized') {
		      // In this case, the person is logged into Facebook, but not into the app, so we call
		      // FB.login() to prompt them to do so. 
		      // In real-life usage, you wouldn't want to immediately prompt someone to login 
		      // like this, for two reasons:
		      // (1) JavaScript created popup windows are blocked by most browsers unless they 
		      // result from direct interaction from people using the app (such as a mouse click)
		      // (2) it is a bad experience to be continually prompted to login upon page load.
		    } else {
		      // In this case, the person is not logged into Facebook, so we call the login() 
		      // function to prompt them to do so. Note that at this stage there is no indication
		      // of whether they are logged into the app. If they aren't then they'll see the Login
		      // dialog right after they log in to Facebook. 
		      // The same caveats as above apply to the FB.login() call here.
		    }
		});

   });


   $(document).on("click","#viawebSend", function(e) {
   		e.preventDefault();
   		
   		var location = $("#form-location").val();
   		var message = $("#form-message").val();
   		var name = $("#authenticated-name").text();

		var data = {
			user_number: "",
			name: name,
			address: location,
			message: message
		};

   		if( trim(message) == "" || trim(message) == " " ) {
   			alert("Message is required");
   			return;
   		}

   		$.post('http://reliefboard.com/messages/feed', data);

		$("#form-location").val("");
		$("#form-message").val("");

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