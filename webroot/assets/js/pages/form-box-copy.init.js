!function($) {
    "use strict";

    var FormBoxCopy = function() {};
     
	//initializing BoxCopy
    FormBoxCopy.prototype.initBoxCopy = function() { 
        $(document).ready(function () {
		    $('.code-box-copy').codeBoxCopy({
		        tooltipText: 'Copied',
		        tooltipShowTime: 1000,
		        tooltipFadeInTime: 300,
		        tooltipFadeOutTime: 300
		    });
		});
    },   

	
	//initilizing
    FormBoxCopy.prototype.init = function() {
        var $this = this;		
        this.initBoxCopy();
    },

    $.FormBoxCopy = new FormBoxCopy, $.FormBoxCopy.Constructor = FormBoxCopy
}(window.jQuery),
 //initializing Ajax Form Jquery
function ($) {
	"use strict";
	$.FormBoxCopy.init();
}(window.jQuery);