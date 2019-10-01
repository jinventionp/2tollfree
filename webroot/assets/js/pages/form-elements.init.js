!function($) {
    "use strict";

    var FormElements = function() {};

    //initializing Select2
    FormElements.prototype.initSelect2 = function() {
        // Select2
        $(document).ready(function() {
            $('[data-toggle="select2"]').select2();
            if($('#customersChart').length){
                $("#customersChart").select2({placeholder: 'Seleccionar Cliente'});
            }
            if($('#customersCode').length){
                $("#customersCode").select2({placeholder: 'Seleccionar Cliente'});
                $('#advertisementsCode').select2({placeholder: 'Seleccionar Anuncio'});
                $('#phonesCode').select2({placeholder: 'Seleccionar Teléfono'});
                $('#audiosCode').select2({placeholder: 'Seleccionar Audio'});
            }
        });
    },

    //initializing Switchery
    FormElements.prototype.initSwitchery = function() {
        $('[data-plugin="switchery"]').each(function (idx, obj) {
            new Switchery($(this)[0], $(this).data());
            if($(this).is(':checked')) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        });

        $('input[type=checkbox]').on('change', function() {            
            if($(this).is(':checked')) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        });
    },

    //initializing OpeningDays
    FormElements.prototype.initOpeningDays = function() {
        $(document).ready(function() {
            var action = $('#opening_days_action').val();
            if(action == "add"){
                var days = {};
                $('input[id ^= "days-"]').each(function() {
                    if (!this.checked) {
                        days[$(this).val()] = 0;
                    }else{
                        days[$(this).val()] = 1;
                    }
                });
                  
                $('#opening_days').val(JSON.stringify(days));
            }else if(action == "edit"){ console.log('edit');                
                if($('#opening_days').val() == "" ){
                    $('#opening_days').val('{"lu":0,"ma":0,"mi":0,"ju":0,"vi":0,"sa":0,"do":0}');
                }
                var days = $.parseJSON($('#opening_days').val());
                $('input[id ^= "days-"]').each(function() {
                    var obj = $(this);
                    if(days[obj.val()] == 1)
                        obj.prop("checked", true);
                    else
                        obj.prop("checked", false);
                });
            }

            $('input[id ^= "days-"]').on('change', function(){ console.log('change  ' + action);
                $('input[id ^= "days-"]').each(function() {
                    if (!this.checked) {
                        days[$(this).val()] = 0;
                    }else{
                        days[$(this).val()] = 1;
                    }
                });
                $('#opening_days').val(JSON.stringify(days));
            });
        });
    },

    //initializing Pickers
    FormElements.prototype.initPickers = function() {
        $('#start-time').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            defaultDate: "08:00"
        });

        $('#end-time').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            defaultDate: "18:00"
        });        
    },
    
    //initilizing Pickers
    FormElements.prototype.init = function() {
        var $this = this;
        this.initSelect2();        
		this.initSwitchery();
        this.initOpeningDays();
        this.initPickers();
    },

    $.FormElements = new FormElements, $.FormElements.Constructor = FormElements
}(window.jQuery),
 //initializing Ajax Form Jquery
function ($) {
	"use strict";
	$.FormElements.init();
}(window.jQuery);