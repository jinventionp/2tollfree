<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-elements.init.js"></script> 
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>

<link href="<?=$base?>assets/libs/intl-tel-input/build/css/intlTelInput.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=$base?>assets/libs/intl-tel-input/build/css/demo.css?1562189064761">

<script src="<?=$base?>assets/libs/intl-tel-input/build/js/intlTelInput.js?1562189064761"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= $this->Form->create($phone, ["id" => "formActions"]) ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="name"><?= __('Customer') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('customer_id', ["label" => false, 'options' => $customers, "class" => "form-control", "data-toggle" => "select2", "placeholder" => "Selecciona el Cliente"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"><?= __('Phone') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('name', ["label" => false, "class" => "form-control","placeholder" => "Ingresa tu Nombre"]);?>
                            <?=$this->Form->control('country_code', ["id" => "country_code", "type" => "hidden", "value" => ""])?>
                            <?=$this->Form->control('dial_code', ["id" => "dial_code", "type" => "hidden", "value" => ""])?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                </div>
                
            	<div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                    <button class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            	</div>
				<?= $this->Form->end() ?>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
<script type="text/javascript">
    var input = document.querySelector("#name");
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
</script>