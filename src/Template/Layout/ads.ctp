<?php
$cakeDescription = 'Call Free';
$base = $this->request->getAttribute('webroot');
$action = $this->request->getParam('action');
$controller = $this->request->getParam('controller');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
         <title>
            <?= $cakeDescription ?> - 
            <?= $this->fetch('title') ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="AAP" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=$base?>assets/images/favicon.ico">
        <link href="<?=$base?>assets/libs/intl-tel-input/build/css/intlTelInput.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=$base?>assets/libs/intl-tel-input/build/css/demo.css?1562189064761">

        <!-- App css -->
        <link href="<?=$base?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$base?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$base?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>

        <?= $this->fetch('content') ?>        

        <script src="<?=$base?>assets/libs/intl-tel-input/build/js/intlTelInput.js?1562189064761"></script>
        <script src="<?=$base?>assets/libs/jquery-form/jquery.form.min.js"></script>
        <script src="<?=$base?>assets/libs/jquery.blockui/jquery.blockUI.js" type="text/javascript">
        <script type="text/javascript">
            /*var input = document.querySelector("#phone");
            window.intlTelInput(input, {
              hiddenInput: "full_phone",
              utilsScript: "../../build/js/utils.js?1562189064761" // just for formatting/placeholders etc
            });*/
           
        </script>
        <script type="text/javascript">
            var input = document.querySelector("#phone");
              //output = document.querySelector("#output");

            var iti = window.intlTelInput(input, {
                // allowDropdown: false,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: "body",
                // excludeCountries: ["us"],
                // formatOnDisplay: false,
                nationalMode: true,
                geoIpLookup: function(callback) {
                    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        callback(countryCode);
                    });
                },
                // hiddenInput: "full_number",
                // initialCountry: "auto",
                // localizedCountries: { 'de': 'Deutschland' },
                onlyCountries: ['ca', 'us', 'mx', 'gt', 'hn', 'sv', 'ni', 'cr', 'pa', 'co', 'pr', 'do', 'it', 'fr'],
                //onlyCountries: ['be', 'bg', 'dk', 'es', 'fr', 'gr', 'it', 'nl', 'pt', 'gb', 'de', 'se', 'no', 'ru', 'ca', 'us', 'mx', 'bz', 'cr', 'dm', 'sv', 'gt', 'hn', 'ni', 'pa', 'do', 'pr', 'ar', 'br', 'co', 'cl', 'pe', 'uy', 'cn', 'ae'],
                // placeholderNumberType: "MOBILE",
                preferredCountries: ['cr', 'co'],
                // separateDialCode: true,
                utilsScript: "<?=$base?>assets/libs/intl-tel-input/build/js/utils.js?1562189064761" // just for formatting/placeholders etc
            });

            var handleChange = function() { 
                var countryData = iti.getSelectedCountryData();
                $("#country_code").val(countryData.iso2);
                $("#dial_code").val(countryData.dialCode);
                //var text = (iti.isValidNumber()) ? "International: " + iti.getNumber() : "Please enter a number below";
                //console.log(text);
                //var textNode = document.createTextNode(text);
                //output.innerHTML = "";
                //output.appendChild(textNode);
            };

            // listen to "keyup", but also "change" to update when the user selects a country
            input.addEventListener('change', handleChange);
            input.addEventListener('keyup', handleChange);

            $(document).ready(function(){

                $('#callForm').ajaxForm({
                    beforeSubmit:  function (formData, jqForm, options) { 
                        $('#contentAds').block({ css: { //$.blockUI
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#fff',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .4,
                        color: '#000'
                        },
                        message: '<img src="../../../img/ajax-loader.gif" /> Llamando...'
                    });

                    return true;
                    },
                    success:       function (responseText, statusText, xhr, $form) {
                        setTimeout($('#contentAds').unblock(), 10000); //$.unblockUI
                        console.log(responseText);
                    }
                }); 
                
            });

        </script>
    </body>

</html>