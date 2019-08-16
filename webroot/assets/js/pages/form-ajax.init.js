!function($) {
    "use strict";

    var FormAjax = function() {};

    //initializing Load Form Modal
    FormAjax.prototype.initLoadFormModal = function() { 
        $('#modalAdd').on('show.bs.modal', function(e) {
            $("#modalAdd .modal-body").html('');
            $('#modalAdd h4').html($("#openModalAdd").attr('data-title'));
            var url = $("#openModalAdd").attr('data-url');
            $("#modalAdd .modal-body").load(url, function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                } else {
                    
                }
            });
        });

        $('#modalAdd').on('hidden.bs.modal', function(e) {
            $("#modalAdd .modal-body").html('<p>Cargando...</p>');
            //$('#btnModalAdd').attr("disabled", true);
        });

        $('#contentList').on('click', '.actions a[id ^= "editRecord-"]', function() {
            $('#modalEdit').modal('show');
            $('#modalEdit .modal-header h4').html($(this).attr('data-title'));
            var url = $(this).attr('data-url');
            $("#modalEdit .modal-body").load(url, function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });

        $('#modalEdit').on('hidden.bs.modal', function(e) {
            $("#modalEdit .modal-body").html('<p>Cargando...</p>');
            //$('#btnModalAdd').attr("disabled", true);
        });

        $('#contentList').on('click', '.actions a[id ^= "deleteRecord-"]', function() {
            $('#modalDelete').modal('show');
            $('#modalDelete .modal-header h4').html($(this).attr('data-title'));

            var url = $(this).attr('data-url');
            var urlAction = $(this).attr('data-url-action');
            var question = $(this).attr('data-question');
            $("#modalDelete .modal-body").load(url, function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                }else if(status == "success"){
                    $('#textRemove').html(question);
                    $('#formActions').attr('action', urlAction);
                }
            });
        });

        $('#modalDelete').on('hidden.bs.modal', function(e) {
            $("#modalDelete .modal-body").html('<p>Cargando...</p>');
            //$('#btnModalAdd').attr("disabled", true);
        });

        $('#modalAds').on('show.bs.modal', function(e) {
            $("#modalAds .modal-body").html('');
            $('#modalAds h4').html($("#generateCode").attr('data-title'));
            var url = $("#generateCode").attr('data-url');
            $("#modalAds .modal-body").load(url, function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                } else {
                    
                }
            });
        });

        /*$('#contentList').on('click', '.actions a[id ^= "viewAds-"]', function() {
            $('#modalAds').modal('show');
            $('#modalAds .modal-header h4').html($(this).attr('data-title'));

            var url = $(this).attr('data-url');
            $("#modalAds .modal-body").load(url, function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });*/

    },			
		
	//initializing TimePicker
    FormAjax.prototype.initTimePicker = function() {
		//Flat picker
        $('#start-time, #end-time').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            defaultDate: "01:45"
        });
    },

    //initializing Module Index
    FormAjax.prototype.initLoadModuleIndex = function() {
    	if($('#moduleIndex').length)
		{
			var $portlet = $("#contentList").closest(".card");
			$portlet.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>');
		    var url = $("#moduleIndex").val();
			$("#contentList").load(url, function(response, status, xhr) {
				//console.log(response);//console.log(status);//console.log(xhr);
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
				}else if(status == "success"){
					$portlet.find('.card-disabled').remove();
				}
			});

			//PAGINATION TABLE
            $('#contentList').on('click', '.pagination a', function (event) {
                event.preventDefault();
				$portlet.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>');

                var txtSearch = ($('#txtSearch').val().length > 0)?$('#txtSearch').val():0;
                var cboNumRegister = $('#cboNumRegister').val();

                var href = $(this).attr('href');
                var urlAjax = "";
                if(href.indexOf('?') != -1){
                    var arrayUrl = href.split('?');
                    urlAjax = url+'/'+txtSearch+'/'+cboNumRegister+'/?'+arrayUrl[1];
                }else{
                    urlAjax = url+'/'+txtSearch+'/'+cboNumRegister;
                }
                $.get(urlAjax, {}, function (data) {
                    $('#contentList').html(data);
                    $portlet.find('.card-disabled').remove();
                }, 'html');
            });

            //SORT TABLE
            $('#contentList').on('click', 'thead a', function (event) {
                event.preventDefault();
                $portlet.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>');

                var txtSearch = ($('#txtSearch').val().length > 0)?$('#txtSearch').val():0;
                var cboNumRegister = $('#cboNumRegister').val();

                var href = $(this).attr('href');
                var urlAjax = "";
                if(href.indexOf('?') != -1){
                    var arrayUrl = href.split('?');
                    urlAjax = url+'/'+txtSearch+'/'+cboNumRegister+'/?'+arrayUrl[1];
                }else{
                    urlAjax = url+'/'+txtSearch+'/'+cboNumRegister;
                }
                $.get(urlAjax, {}, function (data) {
                    $('#contentList').html(data);
                    $portlet.find('.card-disabled').remove();
                }, 'html');
            });
            //SEARCH FIELD
            $('#txtSearch').keyup(function () {
            	$portlet.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>');

                var txtSearch = ($('#txtSearch').val().length > 0)?$('#txtSearch').val():0;
                var cboNumRegister = $('#cboNumRegister').val();

                var urlAjax = url + '/' + txtSearch + '/' + cboNumRegister;
                //console.log('urlAjax  '+urlAjax);
                $.get(urlAjax, {}, function (data) {
                    $('#contentList').html(data);
                    $portlet.find('.card-disabled').remove();
                });
            });
            //NUMBER REGISTER
            $('#cboNumRegister').change(function () {
            	$portlet.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>');
            	
                var txtSearch = ($('#txtSearch').val().length > 0)?$('#txtSearch').val():0;
                var cboNumRegister = $('#cboNumRegister').val();
                var urlAjax = url + '/' + txtSearch + '/' + cboNumRegister;
                $.get(urlAjax, {}, function (data) {
                    $('#contentList').html(data);
                    $portlet.find('.card-disabled').remove();
                });
            });
		}
    	
    },

    //initializing Iframe Ads
    FormAjax.prototype.initIframeAds = function() {
        $(document).ready(function() {
            // Urls Iframe and Generate Code
            var urls = null;
            if ($('#urls').length) {
                urls = JSON.parse($('#urls').val());
            }
            //Event Genarate Code
            $('#generateIframeAds').on('click', function (e) {
                
                var customersCode = ($('#customersCode').val())? $('#customersCode').val() : 0, 
                    advertisementsCode = ($('#advertisementsCode').val())? $('#advertisementsCode').val() : 0, 
                    phonesCode = ($('#phonesCode').val())? $('#phonesCode').val() : 0 , 
                    audiosCode = ($('#audiosCode').val())? $('#audiosCode').val() : 0 ;

                if(customersCode && advertisementsCode && phonesCode){
                    var textDimensions =  $('#advertisementsCode option:selected').text().split('-');
                    var textDimensions =  $('#advertisementsCode option:selected').text().split('-');
                    var dimensions = textDimensions[0].split('x');
                    var urlViewCodeAds = urls.urlViewCodeAds+'/'+customersCode+'/'+advertisementsCode+'/'+phonesCode+'/'+audiosCode;
                    var urlCodeAds = urls.urlAds+'/'+customersCode+'/'+advertisementsCode+'/'+phonesCode+'/'+audiosCode;

                    $("#contentIframe").html('<iframe src="' + urls.fullbaseUrl + urlCodeAds + '" width="'+dimensions[0]+'" height="'+dimensions[1]+'" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>');
                    
                    $('#generateCode').attr('data-url', urlViewCodeAds);
                    $('#generateCode').removeAttr('disabled');
                    $('#msgCode').html('');                   
                }else{                    
                    var listError = "<ul>", msgCode = "";
                    if(!customersCode){
                        listError += "<li>Debe Seleccionar el Cliente, para crear un Cliente haga click Aquí</li>";
                    }else if(!advertisementsCode > 0){
                        listError += "<li>Debe Seleccionar el Anuncio, para crear un Anuncio haga click Aquí</li>";
                    }else if(!phonesCode > 0){
                        listError += "<li>Debe Seleccionar el Teléfono, para crear un Teléfono haga click Aquí</li>";
                    }                    
                    listError += "</ul>";
                    msgCode = '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' + 
                                '</button><i class="mdi mdi-check-all mr-2"></i>Error al Generar Anuncio<br>' + listError +
                            '</div>';
                    $('#msgCode').html(msgCode);
                    //$('#msgCode').slideDown('slow').delay(3000).fadeOut(1500, function(){});
                }
            });
        });      
    },

    //initializing Iframe Ads
    FormAjax.prototype.initChartReports = function() {
        $(document).ready(function() {
            var moduleIndex = $('#moduleIndex').val();
            var urls = null;
            if ($('#urls').length) {
                urls = JSON.parse($('#urls').val());
            }else if ($('#urlsChart').length) {
                urls = JSON.parse($('#urlsChart').val());
            }
            // Options Chart
            var options = {
                chart: {
                    renderTo: 'containerChart',
                    //type: 'column',
                },

                lang: {
                    viewFullscreen: "Ver en pantalla completa",
                    printChart: "Imprimir Gráfico",
                    downloadPNG: "Descargar Imagen PNG",
                    downloadJPEG: "Descargar Imagen JPEG",
                    downloadPDF: "Descargar documento PDF",
                    downloadSVG: "Descargar imagen vectorial SVG",
                    downloadCSV: "Descargar CSV",
                    downloadXLS: "Descargar XLS",
                    viewData: "Ver datos en tabla"
                },

                title: {
                    text: 'Resumen de llamadas'
                },

                subtitle: {
                    text: 'Source: thesolarfoundation.com'
                },

                tooltip: {
                    valueSuffix: ' Llamadas'
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },

                yAxis: {
                    title: {
                        text: 'Numero de llamadas'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                /*plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 2010
                    }
                },

                legend: {
                    layout: 'vertical',
                    align: 'right', //'left',//
                    verticalAlign: 'middle', //'bottom',//
                    floating: false,
                    //y:20,
                    //x:80,
                    borderWidth: 0
                },*/

                credits: {
                    enabled: false
                },

                series: [{}],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                },
            };

            if($('#customersChart').length){ 
                var id = $('#customersChart').val();
                if(id){
                    var startDate = $('#dateStart').val(), endDate = $('#dateEnd').val();
                    $('#interval-datepicker').flatpickr({
                        mode: "range",
                        defaultDate: [startDate, endDate],
                        onChange: function(selectedDates, dateStr, instance) {
                            //console.log(dateStr);
                            var rangeDate = dateStr.split('to');
                            startDate = $.trim(rangeDate[0]);
                            endDate = $.trim(rangeDate[1]);
                            $('#dateStart').val(startDate)
                            $('#dateEnd').val(endDate);
                            loadChart(id, startDate, endDate);
                        },
                        onReady:function(selectedDates, dateStr, instance) {
                            //console.log(selectedDates);
                            var rangeDate = dateStr.split('to');
                            startDate = $.trim(rangeDate[0]);
                            endDate = $.trim(rangeDate[1]);
                            $('#dateStart').val(startDate)
                            $('#dateEnd').val(endDate);
                            loadChart(id, startDate, endDate);                                
                        },
                    });                    

                    $('#customersChart').on('change', function(event){
                        event.preventDefault();
                        startDate = $('#dateStart').val();
                        endDate = $('#dateEnd').val();
                        loadChart(id, startDate, endDate);
                    });




                }else{
                    var listError = "<ul>", msgChart = "";
                    listError += "<li>No existe cliente asociado a su cuenta, para crear un cliente haga click " +
                                "<a href='" + moduleIndex + "'><b>aquí</b></a></li>";
                    listError += "</ul>";
                    msgChart = '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' + 
                                '</button><i class="mdi mdi-check-all mr-2"></i>Error al Generar Anuncio<br>' + listError +
                            '</div>';                    
                    $('#msgChart').html(msgChart);
                }
            }


            function loadChart(id, startDate, endDate) {
                var url = urls.urlCustomersDashboard + '/' + id + '/' + startDate + '/' + endDate;                
                $('#exportCSV').attr('href', url + '/1');
                $.getJSON(url, function (data) {
                    //console.log(data);
                    options.title.text = data.text;
                    options.subtitle.text = data.subtitle;
                    options.xAxis.categories = data.categories;
                    options.series = data.series;
                    var chart = new Highcharts.Chart(options);
                });
            }

        });
    },

    //initializing Ajax Request
    FormAjax.prototype.initAjaxRequest = function() {
        $(document).ready(function() {
            var urls = null;
            if ($('#urls').length) {
                urls = JSON.parse($('#urls').val());
            }else if ($('#urlsChart').length) {
                urls = JSON.parse($('#urlsChart').val());
            }

            if($('#customersCode').length){
                var customer_id = $('#customersCode').val();
                if(customer_id != null){
                    //Loading Associations
                    loadAssoCustomers(customer_id);
                }
                //Select relations customer_id 
                $('#customersCode').on('change', function (e) {console.log('Change');
                    //Loading Associations
                    loadAssoCustomers($(this).val());
                });

                //Change Status Records
                $('#changeStatus').on('click', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    $(this).html('<img src="./assets/images/loading.gif" />');
                    var url = $(this).attr('data-url');
                    $.get(url, function( data ) {
                        if(data.status == 1){
                            $('#changeStatus').html('<i class="fas fa-check-circle text-success"></i>');
                        }else{
                            $('#changeStatus').html('<i class="fas fa-times-circle text-danger"></i>');
                        }
                    }, "json" );
                });
            }

            // Search Customers Code and Chart
            /*$("#customersCode, #customersChart").select2({
                ajax: {
                    url: urls.urlCustomers,
                    dataType: 'json',
                    data: function (params) { 
                        var query = {
                            q: params.term, // search term
                            page: params.page
                        };

                        return query;
                    },
                    processResults: function (data) { 
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                language: "es",
                placeholder: 'Buscar Clientes',
                minimumInputLength: 3,
            });*/
            
        });

        function loadAssoCustomers(customer_id) {
            var urls = null;
            if ($('#urls').length) {
                urls = JSON.parse($('#urls').val());
            }
            //Load Association Advertisements
            var objAdvertisements = $('#advertisementsCode');
            $('option', objAdvertisements).remove();
            var urlAdvertisements = urls.urlAdvertisements+'/'+customer_id;
            $.get(urlAdvertisements, function (dataAdvertisement) {
                $.each(dataAdvertisement, function (i, item) {
                    objAdvertisements.append($(new Option(item.value, item.id)));
                });
            }, 'json');

            //Load Association Phones
            var objPhones = $('#phonesCode');
            $('option', objPhones).remove();
            var urlPhones = urls.urlPhones+'/'+customer_id;
            $.get(urlPhones, function (dataPhone) {
                $.each(dataPhone, function (i, item) {
                    objPhones.append($(new Option(item.value, item.id)));
                });
            }, 'json');

            //Load Association Audios
            var objAudios = $('#audiosCode');
            $('option', objAudios).remove();
            var urlAudios = urls.urlAudios+'/'+customer_id;
            $.get(urlAudios, function (dataAudio) {
                $.each(dataAudio, function (i, item) {
                    objAudios.append($(new Option(item.value, item.id)));
                });
            }, 'json');
        }

        function htmlEscape(s) {
            return s
              .replace(/&/g, '&amp;')
              .replace(/</g, '&lt;')
              .replace(/>/g, '&gt;');
        }        
    },

    //initializing Modules
    FormAjax.prototype.initLoadModules = function() {
    	// Start Check - Uncheck
    	$('#modules, #see').on('change', function(event){
    		event.preventDefault();
    		if (this.checked) {
				$('input[id ^= "modules"]').prop('checked', true);
				$('#see').prop('checked', true);
				$('#new').prop('checked', true);
				$('#edit').prop('checked', true);
				$('#erase').prop('checked', true);
			}else{
				$('input[id ^= "modules"]').prop('checked', false);
				$('#see').prop('checked', false);
				$('#new').prop('checked', false);
				$('#edit').prop('checked', false);
				$('#erase').prop('checked', false);
			}
    	});

    	$('#new').on('change', function(event){
    		event.preventDefault();
    		if (this.checked) {
    			$("#modules").prop('checked', true);
    			$('#see').prop('checked', true);
    			$("input[id $='-id']").prop('checked', true);
    			$("input[id $='-see']").prop('checked', true);
    			$("input[id $='-new']").prop('checked', true);
    		}else{
    			$("input[id $='-new']").prop('checked', false);
    		}
    	});

    	$('#edit').on('change', function(event){
    		event.preventDefault();
    		if (this.checked) {
    			$("#modules").prop('checked', true);
    			$('#see').prop('checked', true);
    			$("input[id $='-id']").prop('checked', true);
    			$("input[id $='-see']").prop('checked', true);
    			$("input[id $='-edit']").prop('checked', true);
    		}else{
    			$("input[id $='-edit']").prop('checked', false);
    		}
    	});

    	$('#erase').on('change', function(event){
    		event.preventDefault();
    		if (this.checked) {
    			$("#modules").prop('checked', true);
    			$('#see').prop('checked', true);
    			$("input[id $='-id']").prop('checked', true);
    			$("input[id $='-see']").prop('checked', true);
    			$("input[id $='-erase']").prop('checked', true);
    		}else{
    			$("input[id $='-erase']").prop('checked', false);
    		}
    	});

    	var allCheckEdit = 0;
		$("input[id $='-id']").each(function( index, value ) {
			if(!$(this).is(':checked')){
				allCheckEdit = 1;
			}    			
		});
		if(allCheckEdit == 0){
			$('#modules').prop('checked', true);
		}else{
			$('#modules').prop('checked', false);
		}

    	$("input[id $='-id']").on('change', function(event){
    		event.preventDefault();
    		var item = $(this).attr('data-item');
    		if (this.checked) {
    			$('input[id ^= "modules-' + item + '-"]').prop('checked', true);
    		}else{
    			$('input[id ^= "modules-' + item + '-"]').prop('checked', false);
    		}
    		var allCheck = 0;
    		$("input[id $='-id']").each(function( index, value ) {
    			if(!$(this).is(':checked')){
    				allCheck = 1;
    			}    			
    		});
    		if(allCheck == 0){
    			$('#modules').prop('checked', true);
    		}else{
    			$('#modules').prop('checked', false);
    		}
    	});

    	$("input[id $='-see']").on('change', function(event){
    		event.preventDefault();
    		var item = $(this).attr('data-item');
    		if (this.checked) {
    			$("#modules-" + item + "-id").prop('checked', true);
    		}else{
    			$('input[id ^= "modules-' + item + '-"]').prop('checked', false);
    		}
    	});

    	var checkSee = 0, checkNew = 0, checkEdit = 0, checkErase = 0;
    	$("input[id $='-see']").each(function( index, value ) {
			if(!$(this).is(':checked')){
				checkSee = 1;
			}    			
		});
		(checkSee == 0)? $('#see').prop('checked', true) : $('#see').prop('checked', false);

		$("input[id $='-new']").each(function( index, value ) {
			if(!$(this).is(':checked')){
				checkNew = 1;
			}    			
		});
		(checkNew == 0)? $('#new').prop('checked', true) : $('#new').prop('checked', false);

		$("input[id $='-edit']").each(function( index, value ) {
			if(!$(this).is(':checked')){
				checkEdit = 1;
			}    			
		});
		(checkEdit == 0)? $('#edit').prop('checked', true) : $('#edit').prop('checked', false);

		$("input[id $='-erase']").each(function( index, value ) {
			if(!$(this).is(':checked')){
				checkErase = 1;
			}    			
		});
		(checkErase == 0)? $('#erase').prop('checked', true) : $('#erase').prop('checked', false);

    	$("input[id $='-see'], input[id $='-new'], input[id $='-edit'], input[id $='-erase']").on('change', function(event){
    		event.preventDefault();
    		var item = $(this).attr('data-item');
    		if (this.checked) {
    			$("#modules-" + item + "-id").prop('checked', true);
    			$("#modules-" + item + "-joindata-see").prop('checked', true);    			
    		}
    		var arrayId = $(this).attr('id').split("-");
    		var patronId = "-" + arrayId[2] + "-" + arrayId[3];
    		var allCheck = 0;
    		$("input[id $='" + patronId + "']").each(function( index, value ) {
    			if(!$(this).is(':checked')){
    				allCheck = 1;
    			}    			
    		});
    		if(allCheck == 0){
    			$('#' + arrayId[3]).prop('checked', true);
    		}else{
    			$('#' + arrayId[3]).prop('checked', false);
    		}
    	});
    },


	
	//initilizing
    FormAjax.prototype.init = function() {
        var $this = this;
        this.initLoadFormModal();
		this.initTimePicker();
		this.initLoadModuleIndex();
        this.initIframeAds();
        this.initChartReports();
        this.initAjaxRequest();
		this.initLoadModules();        
    },

    $.FormAjax = new FormAjax, $.FormAjax.Constructor = FormAjax
}(window.jQuery),
 //initializing Ajax Form Jquery
function ($) {
	"use strict";
	$.FormAjax.init();
}(window.jQuery);