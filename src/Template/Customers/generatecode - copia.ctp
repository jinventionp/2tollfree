<?php $base = $this->request->getAttribute('webroot'); ?><!--
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?autoload=true&amp;skin=sunburst&amp;lang=css" defer></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>-->

<style type="text/css">
	/*.content-code{
		border: 1px solid #dadde1;
	    border-radius: 4px;
	    background-color: #f5f6f7;
	    padding: 10px;
	    white-space: normal;
    }*/
</style>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Configure Call Box') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
		
				<input type="hidden" name="urlCustomers" id="urlCustomers" value="<?=$this->Url->build(["action" => "getcustomers"])?>">
				<input type="hidden" name="urlAdvertisements" id="urlAdvertisements" value="<?=$this->Url->build(["action" => "getadvertisements"])?>">
				<input type="hidden" name="urlPhones" id="urlPhones" value="<?=$this->Url->build(["action" => "getphones"])?>">
				<input type="hidden" name="urlAudios" id="urlAudios" value="<?=$this->Url->build(["action" => "getaudios"])?>">
				<input type="hidden" name="baseUrl" id="baseUrl" value="<?=$baseUrl?>">
				<input type="hidden" name="urlAds" id="urlAds" value="<?=$this->Url->build(["action" => "ads"])?>">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group mb-3">
                            <select class="form-control" data-toggle="select2" id="customersCode" name="customersCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mb-3">
                        	<select class="form-control" data-toggle="select2" id="advertisementsCode" name="advertisementsCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group mb-3">
                        	<select class="form-control" data-toggle="select2" id="phonesCode" name="phonesCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group mb-3">
                        	<select class="form-control" data-toggle="select2" id="audiosCode" name="audiosCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                    	<div class="form-group mt-1">
		                    <buttom id="generateCode" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Caja de Llamadas">Generar Código</buttom>
		                    <buttom class="btn btn-secondary btn-xs waves-effect m-l-5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Limpiar"><i class="fas fa-trash-alt"></i></buttom>
		            	</div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-lg-6">
                		<div id="contentIframe" style="border: 1px solid #dee2e6;min-height: 360px;" class="text-center">
							
                		</div>
                	</div>
                    <div class="col-lg-6">
                    	<div class="code-box-copy">
		                    <button class="code-box-copy__btn" data-clipboard-target="#copy-code" title="Copy"></button>
		                    <pre style="margin: 0px !important;"><code class="language-html" id="copy-code">&lt;!-- Cod Box Copy begin --&gt;
		&lt;link href=&quot;prism/prism.min.css&quot; rel=&quot;stylesheet&quot;&gt;
		&lt;link href=&quot;code-box-copy/css/code-box-copy.css&quot; rel=&quot;stylesheet&quot;&gt;
		&lt;script src=&quot;js/jquery.min.js&quot;&gt;&lt;/script&gt;
		&lt;script src=&quot;prism/prism.min.js&quot;&gt;&lt;/script&gt;
		&lt;script src=&quot;clipboard/clipboard.min.js&quot;&gt;&lt;/script&gt;
		&lt;script src=&quot;code-box-copy/js/code-box-copy.js&quot;&gt;&lt;/script&gt;
		&lt;!-- Cod Box Copy end --&gt;</code></pre>
		                </div>
		                <div class="code-box-copy">
		                	<button class="code-box-copy__btn" data-clipboard-target="#code" title="Copiar Código"></button>
                        	<pre class="content-code"><code class="language-html" id="code">
                        		&lt;iframe src="http://localhost//tollfreenew/customers/ads/1/34/1/0" width="300" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"&gt;&lt;/iframe&gt;
                        	</code></pre>
                    	</div>
                    </div>
                </div>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<script type="text/javascript">//<![CDATA[
(function () {

	/*document.getElementById("contentIframe").innerHTML = '<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAFAIguaran%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=195313173861040" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';*/
  /*function htmlEscape(s) {
    return s
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;');
  }*/

  // this page's own source code
  /*var quineHtml = htmlEscape(
    '<!DOCTYPE html>\n<html>\n' +
    document.documentElement.innerHTML +
    '\n<\/html>\n');*/
/*var quineHtml = htmlEscape('<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAFAIguaran%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=195313173861040" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>');*/

  // Highlight the operative parts:
  /*quineHtml = quineHtml.replace(
    /&lt;script src[\s\S]*?&gt;&lt;\/script&gt;|&lt;!--\?[\s\S]*?--&gt;|&lt;pre\b[\s\S]*?&lt;\/pre&gt;/g,
    '<span class="operative">$&<\/span>');*/

  // insert into PRE
  //document.getElementById("code").innerHTML = quineHtml;
})();
//]]>
</script>
<script type="text/javascript">
    /* $(document).ready(function() {
        $('#phones').on('change', function(event) {
            event.preventDefault();
            /* Act on the event */
            /*console.log($('#phones').val());
            if($('#phones').val() != ""){
                $('#generateCode').attr('disabled', false);
            }
        });
        
        $('#phones').select2({
            placeholder: "Seleccione el Teléfono", 
            allowClear: true
        });
    });*/
</script>