<!DOCTYPE html>
<html>
	<head>
		<title>ReliefBoard API Documentation</title>
		<script type="text/javascript" src="//use.typekit.net/qcx1ndo.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<style type="text/css">
			html, body{
				margin: 0;
				padding: 0;
			}
			*{
				font-family: "proxima-nova", sans-serif;
				color: #333;
			}
			body{
				background-image: url(http://reliefboard.com/ph/img/bg.png);
			}
			header{
				margin-top: -20px;
				height: 80px;
				width: 100%;
				background: #294360;
				text-align: left;
			}
			#container{
				margin: 0 auto;
				width: 80%;
				position: relative;
			}
			h1{
				vertical-align: middle;
				padding-left: 20px;
				padding-top: 20px;
			}
			h3{
				color: #1d2f43;
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			table{
				margin: 0 auto;
				width: 100%;
				border-collapse: collapse;
				border-spacing: 0;
				background: #FFF;
				border: 5px solid #e2e2e2;
			}
			td{
				padding: 10px;
				border: 1px solid #CCC;
			}
			pre{
				font-family: monospace
			}
		</style>
	</head>
	<body>
		<header>
			<h1><img src="http://reliefboard.com/ph/img/logo.png" title="ReliefBoar" alt="ReliefBoard"/></h1>
		</header>
		<div id="container">
			<h3>Retrieve all messages/feeds</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://www.reliefboard.com/messages/feed/</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>GET</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>
						(int) offset<br />
						(int) limit
						<br/>(string) parent_id - post_id of parent message, gets all the comments/responses for a post with id "parent_id"
					</td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
  "status": "Success",
  "data": {
	"result": [
	{
	 "id": "92e472fc949f2db20a3a415a9a02e57e",		post_id
	 "parent_id": null,					parent_id if the message is a comment
	 "place_tag": "lapaz%20leyte",				place/location associated with message
	 "sender": "people%20of%20la%20paz",			name/organization of sender
	 "sender_number": "",					sender number if from sms
	 "message": "they%20have%20not%20recieve%20any%20food%20and%20water.",
	 "date_created": "1385174265",
	 "date_updated": "1385174265",
	 "status": "pending",					(pending,flagged,approved)
	 "source": "sms.semaphore",				(web.primary,sms.semaphore,sms.smart,sms.globe) or external APP source
	 "source_type": null,
	 "action_status": "pending",				('pending','in_progress','done','expired') status of request
	 "fb_id": "",						fb_id associated with poster/sender
	 "tags": "",						tags for this message
	 "expiry_date": null,
	 "logo": null,						logo for external APP (bangonPH, goHelpPH, Rappler)
	 "app_name": null					external app name
	}
	],
	"result_count": 1,
  },
  "method": "GET",
  "memory_usage": "1.02MB",
  "elapsed_time": 0.0027821063995361,
  "compress_output": true
}
						</pre>
					</td>
				</tr>
			</table>
			<h3>Retrieve a specific message</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://www.reliefboard.com/messages/feed_item/</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>GET</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>
						message_id (varchar(32))
					</td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
  "status": "Success",
  "data": {
	"result": [
	{
	 "id": "92e472fc949f2db20a3a415a9a02e57e",		post_id
	 "parent_id": null,					parent_id if the message is a comment
	 "place_tag": "lapaz%20leyte",				place/location associated with message
	 "sender": "people%20of%20la%20paz",			name/organization of sender
	 "sender_number": "",					sender number if from sms
	 "message": "they%20have%20not%20recieve%20any%20food%20and%20water.",
	 "date_created": "1385174265",
	 "date_updated": "1385174265",
	 "status": "pending",					(pending,flagged,approved)
	 "source": "sms.semaphore",				(web.primary,sms.semaphore,sms.smart,sms.globe) or external APP source
	 "source_type": null,
	 "action_status": "pending",				('pending','in_progress','done','expired') status of request
	 "fb_id": "",						fb_id associated with poster/sender
	 "tags": "",						tags for this message
	 "expiry_date": null,
	 "logo": null,						logo for external APP (bangonPH, goHelpPH, Rappler)
	 "app_name": null					external app name
	}
	],
	"result_count": 1,
  },
  "method": "GET",
  "memory_usage": "1.02MB",
  "elapsed_time": 0.0027821063995361,
  "compress_output": true
}
						</pre>
					</td>
				</tr>
			</table>



			<h3>Get all the comments/response for a post</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://reliefboard.com/comments/</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>GET</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>
						parent_id (string) id of the parent post<br/>
						offset (int)<br/>
						limit (int)
					</td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
  "status": "Success",
  "data": {
	"result": [
	{
		"id": "aaecc1822cdcc50e6a3a7bc34d1f767e",
		"parent_id": "76bbbcdb775d8051cd9a0fb64ba07b59",
		"place_tag": null,
		"sender": "StarsTrak%2520Dev",
		"sender_number": "",
		"message": "this%2520is%2520a%2520test.",
		"date_created": "1384851340",
		"date_updated": "1384851340",
		"status": "pending",
		"source": "2b198w.reliefboard.web",
		"source_type": null,
		"action_status": "pending",
		"fb_id": null,
		"tags": null,
		"expiry_date": null,
		"logo": "http://rboard.me/rboard/img/profile-pic-205.jpg",
		"app_name": "Relief Board Website"
	}
	],
	"result_count": 1,
  },
  "method": "GET",
  "memory_usage": "1.02MB",
  "elapsed_time": 0.0027821063995361,
  "compress_output": true
}
						</pre>
					</td>
				</tr>
			</table>









			<h3>Post message</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://www.reliefboard.com/messages/feed/</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>POST</td>
				</tr>
				<tr>
					<td>Notes</td>
					<td>You need an APP_ID to access this API. Contact <em style='color:red;font-size:14px;'>nreclarin@gmail.com/neclarin@stratpoint.com</em> for APP_ID <br/>You post will automatically be posted to fb and twitter account of ReliefBoard</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>
						<em style='color:red;'>Required</em><br/>
						app_id <br />
						message (text)<br />
						name (varchar(32))
						<br />
						<em style='color:red;'>Optional</em><br/>
						address (text) location associated with post <br/>
						user_number (text) number associated with post <br/>
						fb_id (string) fb_id associated with post/poster <br/>
						fb_id (string) fb_id associated with post/poster <br/>
						tags (string) tags associated with the post for easy searching <br/>
						parent_id (string) if the post is a response/comment to another post, put the parent id of the parent post
					</td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
  "status": "Success",
  "method": "POST",
  "memory_usage": "1.02MB",
  "elapsed_time": 0.0027821063995361,
  "compress_output": true
}
						</pre>
					</td>
				</tr>
			</table>

			<h3>Search location, name, or message  through the query param. set loc/name/message to 1 for the category of search</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://www.reliefboard.com/search/</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>GET</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>
						loc - set to 1 to enable location search<br />
						name - set to 1 to enable name search<br />
						message - set to 1 to enable message search<br />
						query - the search string <br />
						offset (int)<br />
						limit (int)
					</td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
  "status": "Success",
  "data": {
	"result": [
	{
	  "id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",  post_id	
	  "place_tag": "manila",                     place or location of sender
	  "sender": "Z-clothing%2520Line",           name of sender				
	  "sender_number": "",                       sender number
	  "message": "",									
	  "date_created": "1384587346",
	  "date_updated": "1384587346",
	  "fb_post_link": null,   
	  "status": "pending",                       (pending,flagged,approved)
	  "source": "web.primary"                    (web.primary,globe.mobile,smart.mobile)
	}
	],
	"result_count": 1,
  },
  "method": "GET",
  "memory_usage": "1.02MB",
  "elapsed_time": 0.0027821063995361,
  "compress_output": true
}
						</pre>
					</td>
				</tr>
			</table>

			<h3>Search query from the google finder database</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://www.reliefboard.com/search/google_finder</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>GET</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>query</td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
	"status": "Success",
	"data": {
		"person": [
			{
				"person_record_id": "2013-yolanda.personfinder.google.org/person.120576006",
				"entry_date": "2013-11-20T08:05:35Z",
				"expiry_date": "2013-12-20T08:05:35Z",
				"author_name": "Kelina Varga",
				"source_name": "google.org",
				"source_date": "2013-11-20T08:05:35Z",
				"source_url": "http://google.org/personfinder/2013-yolanda/view?id=2013-yolanda.personfinder.google.org%2Fperson.120576006",
				"full_name": "Avenir Mark",
				"given_name": "Avenir",
				"family_name": "Mark",
				"sex": "male",
				"age": "19"
			}
		]
	},
	"method": "GET",
	"memory_usage": "2.69MB",
	"ellapsed_time": 6.2922790050507,
	"compress_output": true
}
						</pre>
					</td>
				</tr>
			</table>
			<h3>Get recommended tags for a message or post</h3>
			<table>
				<tr>
					<td>Endpoint</td>
					<td>http://www.reliefboard.com/tagrec</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>GET</td>
				</tr>
				<tr>
					<td>Params</td>
					<td>(required) msg(string): the urlencoded message string<br/>
			  (optional) count(int): number of tags to be returned (defaults to two) sometimes will not recommend any tag depending on the message<br/>
			  (optional) tolerance(float): floating point values from 0.0 to 1 with 0 as the strictest in spelling (defaults to 0.2)<br/></td>
				</tr>
				<tr>
					<td>Result</td>
					<td>
						<pre>
{
	"status":"Success",
	"data":{
		"tags":"Relief Goods,Water,evacuation"
	},
	"method":"GET",
	"memory_usage":"0.27MB",
	"ellapsed_time":0.073107957839966,
	"compress_output":true
}
						</pre>
					</td>
				</tr>
			</table>
			<br /><br /><br /><br /><br />
		</div>
	</body>
</html>
