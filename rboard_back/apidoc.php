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
				background-image: url(http://reliefboard.com/rboard/img/bg.png);
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
			<h1><img src="http://reliefboard.com/rboard/img/logo.png" title="ReliefBoar" alt="ReliefBoard"/></h1>
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
						(int)offset<br />
						(int)limit
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
		"status": "pending",                      (pending,flagged,approved)
		"source": "web.primary"                   (web.primary,globe.mobile,smart.mobile)
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
	  "id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",    post_id  
	  "place_tag": "manila",                       place or location of sender
	  "sender": "Z-clothing%2520Line",             name of sender        
	  "sender_number": "",                         sender number
	  "message": "",                  
	  "date_created": "1384587346",
	  "date_updated": "1384587346",
	  "fb_post_link": null,   
	  "status": "pending",                        (pending,flagged,approved)
	  "source": "web.primary"                     (web.primary,globe.mobile,smart.mobile)
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
					<td>Params</td>
					<td>
						app_id<br />
						message (text)<br />
						name (varchar(32))
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
						loc (varchar(32))<br />
						name (varchar(32))<br />
						message (text)<br />
						query <br />
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
	"result": [
	  {
	  "id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",   post_id	
	  "place_tag": "manila",                      place or location of sender
	  "sender": "Z-clothing%2520Line",            name of sender				
	  "sender_number": "",                        sender number
	  "message": "",									
	  "date_created": "1384587346",
	  "date_updated": "1384587346",
	  "fb_post_link": null,   
	  "status": "pending",                        (pending,flagged,approved)
	  "source": "web.primary"                     (web.primary,globe.mobile,smart.mobile)
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
			<br /><br /><br /><br /><br />
		</div>
	</body>
</html>
