/**
 * @author franckysolo - franckysolo@gmail.com
 * @category Swatch Plugin
 * @version 1.1
 */
jQuery(function ($) {
	function chrono() {
	   var date = new Date();
	  $('#fs-swatch').html(date.toLocaleTimeString());
	}
	
	$(function () {
	    setInterval(chrono, 1000); 
	});  
});
    