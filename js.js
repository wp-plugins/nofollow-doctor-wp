/*
 new taber v1.0.0
 Author: Omar Faruk
 Git: 
 Copyright 2015 Omar Faruk.
 Licensed under the MIT license
 http://www.opensource.org/licenses/mit-license.php

 Twitter: @rraju7

*/
jQuery( document ).ready(function() {
	function makeExternal(link) {
	  var url      = link.getAttribute('href'),
	  host         = window.location.hostname.toLowerCase(),
	  regex        = new RegExp('^(?:(?:f|ht)tp(?:s)?\:)?//(?:[^\@]+\@)?([^:/]+)', 'im'),
	  match        = url.match(regex),
	  domain       = ((match ? match[1].toString() : ((url.indexOf(':') < 0) ? host : ''))).toLowerCase();
  
	  // Same domain
	  if (domain != host) {
		link.setAttribute('target', '_blank');      
	  }
	}

	for (var l = 0, links = document.querySelectorAll('a'), ll = links.length; l < ll; ++l ){
	   makeExternal(links[l]); 
	}
});
