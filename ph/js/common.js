// this file contains common js functions for reliefboard

function post_template (d) {
        var html = _.template( $("#post").html() , {d:d} );
        return html;
}

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