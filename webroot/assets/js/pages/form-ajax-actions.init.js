!function($) {
    "use strict";

    var FormAjax = function() {};
     
	//initializing Ajax Jquery Form
    FormAjax.prototype.initJqueryForm = function() { 
        // JqueryForm
		$('#formActions').ajaxForm({
			type:      'post',
			dataType:  'json',
			beforeSubmit: function (formData, jqForm, options) {
				return true;
			},
			success: function (responseText, statusText, xhr, $form)  { console.log(responseText);console.log(statusText);console.log(xhr);console.log($form);
				var msgActions = null;
				if(responseText.success == 1){                    
                    $("#contentList").load(responseText.redirectUrl, function(response, status, xhr) {
                        /*if ( status == "error" ) {
                            var msg = "Sorry but there was an error: ";
                            $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
                        }*/
                    });
					msgActions = '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">' +
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
									'<span aria-hidden="true">&times;</span>' + 
								'</button><i class="mdi mdi-check-all mr-2"></i>' + responseText.message +
							'</div>';
                    $(responseText.modal).modal('hide');
                    $('#msgFormActions').html(msgActions);
                    $('#msgFormActions').slideDown('slow').delay(3000).fadeOut(1500, function(){}); //Se muestra el mensaje por 5 segundos.
				}else{
                    $(responseText.modal + ' .modal-body .alert-danger').remove();
					var listError = "<ul>";
					$.each(responseText.message, function(index, value) {
						$.each(value, function(i, item) {
							listError += "<li>" + item + "</li>";
						});
					});
					listError += "</ul>";
					//console.log(listError);
					msgActions = '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">' +
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
									'<span aria-hidden="true">&times;</span>' + 
								'</button><i class="mdi mdi-check-all mr-2"></i>Error al Guardar<br>' + listError +
							'</div>';
                    $(responseText.modal + " .modal-body").prepend(msgActions);
				}
				
				
			}
		}); 
    },   

	
	//initilizing
    FormAjax.prototype.init = function() {
        var $this = this;		
        this.initJqueryForm();
    },

    $.FormAjax = new FormAjax, $.FormAjax.Constructor = FormAjax
}(window.jQuery),
 //initializing Ajax Form Jquery
function ($) {
	"use strict";
	$.FormAjax.init();
}(window.jQuery);