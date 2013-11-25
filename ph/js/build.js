$( function () {

	//VARIABLES

	var id_list = [];
	var fresh_count = 0;
	var feed_cache = "";

	var offset = 0;
	var search_mode = false;
	var select2_options = {
		tags: ["volunteer","missing","relief","emergency","rescue"],
		tokenSeparators: [","],
		placeholder: "Add Tags - ex. volunteer, missing person, relief goods, rescue, etc.",
		minimumInputLength: 2,
		width: "500px"
	};

	function get_short_url(long_url, login, api_key, func)
	{
	    $.getJSON(
	        "http://api.bitly.com/v3/shorten?callback=?", 
	        { 
	            "format": "json",
	            "apiKey": api_key,
	            "login": login,
	            "longUrl": long_url
	        },
	        function(response)
	        {
	            func(response.data.url);
	        }
	    );
	}

	//APPLY FORMATING TO SINGLE RESULT

	function post_template (d) {

		var html = _.template( $("#post").html() , {d:d} );
        var version = "2.0.1";
        var id = d.id;
        var url = "http://www.reliefboard.com/ph/post.php?id=" + id;
        var login = "kjventura";
        var appkey = "R_afc197795cfaf9242fc1063b2c77c48d";
        var format = "json";
        var ajax_url = 'http://api.bit.ly/shorten?version='+ version + '&longUrl='+ encodeURIComponent(url) + '&login=' + login + '&apiKey=' + appkey + '&format=' + format;

        $.get(ajax_url, function( response ) {
        	
        });

        var login = "kjventura";
		var api_key = "R_afc197795cfaf9242fc1063b2c77c48d";
		var long_url = "http://www.reliefboard.com/ph/post.php?id=" + d.id;

		get_short_url(long_url, login, api_key, function(short_url) {
			$("#tw-" + d.id).attr("data-url",short_url);
		})
        

		return html;
	}

	// FEED CALL

	function feed () {

		/* FETCH FEED */

		$.ajax( {
			type: "GET",
			url: "http://www.reliefboard.com/messages/feed?offset=" + offset +"&limit=5"
		} ).done( function ( result ) {

			var html = "";
			
			_.each( result.data.result, function(d) {
			id_list.push(d.id);
			html = html + post_template(d);
			});post_template

			$( "#msg" ).append( html );
			$( ".time" ).prettyDate();
			/*$( 'input[id^="tag_"]').select2(select2_options);*/

			FB.XFBML.parse();
            $.getScript('http://platform.twitter.com/widgets.js')

		});

	}

	// TRIM FUNCTIONS

	function trim(s) { 
		s = s.replace(/(^\s*)|(\s*$)/gi,"");
		s = s.replace(/[ ]{2,}/gi," "); 
		s = s.replace(/\n /,"\n"); return s;
	}

	function search(val) {
		var filter = "";

		if($("#filter-name").is(":checked"))
			filter += "&name=1";
		else
			filter += "&name=0";

		if($("#filter-location").is(":checked"))
			filter += "&loc=1";
		else
			filter += "&loc=0";

		if($("#filter-message").is(":checked"))
			filter += "&message=1";
		else
			filter += "&message=0";
		
		var url = "http://www.reliefboard.com/search?query=" + val + filter + "&offset=" + offset +"&limit=5";
		$.ajax( {
				type: "GET",
				url: url
			} ).done( function ( result ) {
				var html = "";
				_.each( result.data.result, function(d) {

					html = html + post_template(d);

				});
				$( "#results" ).append( html );
				$( ".time" ).prettyDate();
			});
	}

	// PRETTY DATE REFRESH

	setInterval( function() {
		$( ".time" ).prettyDate();    
	},10000);

	// SET INTERVAL FOR RETRIEVING NEW RECORDS

	setInterval( function() {

		if(!search_mode) {

			$.ajax( {
				type: "GET",
				url: "http://www.reliefboard.com/messages/feed?offset=0&limit=5"
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
			
		}

	}, 5000);

	//EVENTS

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
		$.getScript('http://platform.twitter.com/widgets.js');
		FB.XFBML.parse();
	});




	// POST TO WEB
	$(document).on("click","#viawebSend", function(e) {

		e.preventDefault();
        var mobile_number = $("#form-mobile-number").val();
		var location = $("#form-location").val();
		var message = $("#form-message").val();
		var name = $("#authenticated-name").text();
		var app_id = '2b198w.reliefboard.web';
		var form_tags = $("#form-tags").val();
		var data = {
			user_number: mobile_number,
			name: name,
			address: location,
			message: message,
			app_id: app_id,
			form_tags:  form_tags
		};

		if( trim(message) == "" || trim(message) == " ") {
			alert("Message is required");
			return;
		}

		console.log(data);

		$.post('http://www.reliefboard.com/messages/feed', data);

		$("#form-location").val("");
		$("#form-message").val("");
		$("#viawebModal").modal("hide");
		$("#form-tags").val("");
		$("#form-tags").trigger("change");

	});

	$('#search').keypress(function(e) {
		if(e.which == 13){
			var val = $(this).val();

			var search_count = 0;
			$( "#search-count" ).text(search_count);

			if( val.length > 0 ) {
				$("#copy-container").fadeOut(100);
				$("#search-copy-container").fadeIn(100);
				$("#msg").fadeOut(100);
				$("#results").show();
				$(window).scrollTop(0);
				search_mode = true;
			} else {
				$("#copy-container").fadeIn(100);
				$("#search-copy-container").fadeOut(100);
				$("#msg").fadeIn(100);
				$("#results").hide();
				search_mode = false;
				return;
			}


			var filter = "";
			offset = 0;

			if($("#filter-name").is(":checked"))
				filter += "&name=1";
			else
				filter += "&name=0";

			if($("#filter-location").is(":checked"))
				filter += "&loc=1";
			else
				filter += "&loc=0";

			if($("#filter-message").is(":checked"))
				filter += "&message=1";
			else
				filter += "&message=0";

			var url = "http://www.reliefboard.com/search?query=" + val + "&offset=0&limit=5" +filter;
			$.ajax( {
				type: "GET",
				url: url
			} ).done( function ( result ) {
				var html = "";
				_.each( result.data.result, function(d) {

					//id_list.push(d.id);
					html = html + post_template(d);

				});
				$( "#results" ).html("");
				$( "#results" ).append( html );
				$( ".time" ).prettyDate();
			});
		}	
	});


	$(document).on("focus","#search", function(e) {
		$("#search-filter").show();
		//search_mode = true;
	});

	$(document).on("blur","#search", function(e) {
		//$("#search-filter").hide();
		/*
		if(!search_mode) {
			$("#search-filter").hide();
			search_mode = false;
		}*/
	});

	$(document).on("click","#main-container", function(e){
		e.stopPropagation();
		$("#search-filter").hide();
	});

	$(document).on("click","#search-filter",function(e) {
		e.stopPropagation();
		$("#search-filter").show();
	});

	$(document).on("click",".filter",function(e){
		e.stopPropagation();
		var val = $("#search").val();
		search(val);
	});

	$(document).on("click","#back-to-feed",function(e) {
		e.preventDefault();
		$("#copy-container").fadeIn(100);
		$("#search-copy-container").fadeOut(100);
		$("#msg").fadeIn(100);
		$("#results").hide();
		$("#search").val("");
		$("#search-filter").hide();
		search_mode = false;
		return;
	});

	$(document).on("click",".share",function(e) {
		e.preventDefault();
		c = confirm("Are you sure you want to mark it as SPAM or ABUSIVE?");
		if(!c)
			return false;

		var _this  = $(this),
			postID = _this.data('id');
		
		var data = {
			id: postID,
			status: "flagged"
		};
		$.post('http://www.reliefboard.com/messages/message_flag', data);
		$(".post"+postID).fadeOut(1000,function() {
			$(".post"+postID).remove();	
		});
		$(".time-container"+postID).fadeOut(1000,function() {
			$(".time-container"+postID).remove();	
		});	
	});


	// PAGINATION

	$(window).scroll(function () {
		if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
			offset = offset + 5;
			if(!search_mode) {
				feed();
			}else{
				search($("#search").val());
			}
		}
	});

	/* ------------------------------------------------------------------------ */
	/* START THE APPLICATION */
	
	
	feed();
	$("#search").fadeIn(1000);

	$(window).load(function() {

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
					$("#loginToFacebook").hide();
					$("#form-container").show();
				});

				$("#loginToFacebook").hide();
				$("#form-container").show();


			} else if (response.status === 'not_authorized') {
			// the user is logged in to Facebook, 
			// but has not authenticated your app
				$("#loginToFacebook").show();
			} else {
			// the user isn't logged in to Facebook.
				$("#loginToFacebook").show();
			}

		});

		FB.Event.subscribe('auth.authResponseChange', function(response) {
			// Here we specify what we do with the response anytime this event occurs. 
			if (response.status === 'connected') {
				// The response object is returned with a status field that lets the app know the current
				// login status of the person. In this case, we're handling the situation where they 
				// have logged in to the app.
				FB.api('/me', function(response) {
					$("#authenticated-name").text(response.name);
					$("#loginToFacebook").hide();
					$("#form-container").show();
				});
			}
		});

	});

	/* TAGS */

	// ADD SELECT2 to FORM
	
	/*$("#form-tags").select2(select2_options);*/


});