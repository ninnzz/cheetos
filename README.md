
```
endpoint    : http://www.reliefboard.com/messages/feed/
description : retrieve all messages/feeds 
method 	    : GET
params      : (int)offset, (int)limit
result 	    :  {
				"status": "Success",
					"data": {
						"result": [
						{
						"id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",		post_id	
						"place_tag": "manila",							place or location of sender
						"sender": "Z-clothing%2520Line",				name of sender				
						"sender_number": "",							sender number
						"message": "",									
						"date_created": "1384587346",
						"date_updated": "1384587346",
						"fb_post_link": null,   
						"status": "pending",   							(pending,flagged,approved)
						"source": "web.primary" 						(web.primary,globe.mobile,smart.mobile)
						}
					],
				"result_count": 1,
				},
				"method": "GET",
				"memory_usage": "1.02MB",
				"ellapsed_time": 0.0027821063995361,
			 	"compress_output": true
			    }

endpoint    : http://www.reliefboard.com/messages/feed_item/
description : retrieve a specific message
method 	    : GET
params      : message_id (varchar(32))
result 	    :  {
				"status": "Success",
					"data": {
						"result": [
						{
						"id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",		post_id	
						"place_tag": "manila",							place or location of sender
						"sender": "Z-clothing%2520Line",				name of sender				
						"sender_number": "",							sender number
						"message": "",									
						"date_created": "1384587346",
						"date_updated": "1384587346",
						"fb_post_link": null,   
						"status": "pending",   							(pending,flagged,approved)
						"source": "web.primary" 						(web.primary,globe.mobile,smart.mobile)
						}
					],
				"result_count": 1,
				},
				"method": "GET",
				"memory_usage": "1.02MB",
				"ellapsed_time": 0.0027821063995361,
			 	"compress_output": true
			    }


endpoint    : http://www.reliefboard.com/messages/feed/
description : post message  
method 	    : POST
params      : app_id, message (text), name (varchar(32))
result 	    :  {
				"status": "Success",
				"method": "POST",
				"memory_usage": "1.02MB",
				"ellapsed_time": 0.0027821063995361,
			 	"compress_output": true
			    }

endpoint    : http://www.reliefboard.com/search/
description : search location, name, or message  through the query param. set loc/name/message to 1 for the category of search 
method 	    : GET
params      : loc (varchar(32)),name (varchar(32)),message (text), query, offset (int),limit (int)
result 	    :  {
				"status": "Success",
					"data": {
						"result": [
						{
						"id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",		post_id	
						"place_tag": "manila",							place or location of sender
						"sender": "Z-clothing%2520Line",				name of sender				
						"sender_number": "",							sender number
						"message": "",									
						"date_created": "1384587346",
						"date_updated": "1384587346",
						"fb_post_link": null,   
						"status": "pending",   							(pending,flagged,approved)
						"source": "web.primary" 						(web.primary,globe.mobile,smart.mobile)
						}
					],
				"result_count": 1,
				},
				"method": "GET",
				"memory_usage": "1.02MB",
				"ellapsed_time": 0.0027821063995361,
			 	"compress_output": true
			    }

endpoint    : http://www.reliefboard.com/search/google_finder
description : search query from the google finder database
method 	    : GET
params      : query
result 	    :  {
				"status": "Success",
					"data": {
						"result": [
						{
						"id": "bd4e6b11ff9ef39a45651d9f91ac3ba4",		post_id	
						"place_tag": "manila",							place or location of sender
						"sender": "Z-clothing%2520Line",				name of sender				
						"sender_number": "",							sender number
						"message": "",									
						"date_created": "1384587346",
						"date_updated": "1384587346",
						"fb_post_link": null,   
						"status": "pending",   							(pending,flagged,approved)
						"source": "web.primary" 						(web.primary,globe.mobile,smart.mobile)
						}
					],
				"result_count": 1,
				},
				"method": "GET",
				"memory_usage": "1.02MB",
				"ellapsed_time": 0.0027821063995361,
			 	"compress_output": true
			    }
endpoint    : http://www.reliefboard.com/tagrec
description : recommends tags for a certain message
method 	    : GET
params      : (required) msg: the urlencoded message string
			  (optional) count: number of tags to be returned (defaults to two) sometimes will not recommend any tag depending on the message
			  (optional) tolerance: floating point values from 0.0 to 1 with 0 as the strictest in spelling (defaults to 0.2)
result 	    :  {
				"status":"Success",
				"data":{
					"tags":"Relief Goods,Water,evacuation"
				},
				"method":"GET",
				"memory_usage":"0.27MB",
				"ellapsed_time":0.073107957839966,
				"compress_output":true
			   }

```
Just create a <filename>.php in db_drivers

