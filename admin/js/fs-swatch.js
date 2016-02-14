/**
 * @author franckysolo - franckysolo@gmail.com
 * @category Swatch Plugin
 * @version 1.0
 */
jQuery(function ($) {
	function chrono() {
	   var date = new Date(),
	  		h = date.getHours(),
	  		s = date.getSeconds(),
	  		i = date.getMinutes(),
	  		timeArray = [h, i, s],
	  		stringTime = '';		
	  
	  var stringTime = timeArray.map(function (e) {
	    if (parseInt(e) < 10)
	      return "0" + e;
	   return "" + e;}).join(':');
	  $('#fs-swatch').html(stringTime);
	}
	
	$(function () {
	    setInterval(chrono, 1000); 
	});  
});
    