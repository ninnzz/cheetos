function convertToLinks(text) {
	var replaceText, replacePattern1;
	 
	//URLs starting with http://, https://
	replacePattern1 = /(\b(https?):\/\/[-A-Z0-9+&amp;@#\/%?=~_|!:,.;]*[-A-Z0-9+&amp;@#\/%=~_|])/ig;
	replacedText = text.replace(replacePattern1, '<a class="colored-link-1" title="$1" href="$1" target="_blank">$1</a>');
	 
	//URLs starting with "www."
	replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
	replacedText = replacedText.replace(replacePattern2, '$1<a class="colored-link-1" href="http://$2" target="_blank">$2</a>');
	 
	//returns the text result
	 
	return replacedText;
}

function timeConverter(UNIX_timestamp){
   var a = new Date(UNIX_timestamp*1000);
   var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
   var year = a.getFullYear();
   var month = months[a.getMonth()];
   var date = a.getDate();
   var hour = a.getHours();
   if(hour > 12){
    hour = hour-12;
    var ampm = 'pm';
   }else{
    var ampm = 'am';
   }

   var min = a.getMinutes();
   var sec = a.getSeconds();
   var time = date+' '+month+' '+year+' '+hour+':'+min+':'+sec + " "+ ampm;
   return time;
}

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
