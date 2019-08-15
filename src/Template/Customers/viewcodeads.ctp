<?php
$base = $this->request->getAttribute('webroot');

$dimensions = explode('x', $customer->advertisements[0]->dimensions);
$customerId = (!empty($customer->id))?$customer->id:0;
$adsId = (!empty($customer->advertisements))?$customer->advertisements[0]->id:0;
$phoneId = (!empty($customer->phones))?$customer->phones[0]->id:0;
$audioId = (!empty($customer->audios))?$customer->audios[0]->id:0;
?>
<!-- Cod Box Copy begin -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/themes/prism.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.16.0/prism.min.js"></script>

<link href="<?=$base?>assets/libs/clipboardjs/code-box-copy/css/code-box-copy.css" rel="stylesheet">
<script src="<?=$base?>assets/libs/clipboardjs/js/clipboard.min.js"></script>

<!--/ Cod Box Copy begin -->
<div class="row">  
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <p class="text-muted font-15">Coloque este código donde desee que aparezca el complemento en su página.</p>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn" data-clipboard-action="copy" data-clipboard-target="#codeCopy" title="Copiar Código"></button>
                            <pre class="language-html"><code class="language-html" id="codeCopy" style="white-space: normal;">&lt;iframe src="<?=$urls['fullbaseUrl'].$urls['urlAds'].'/'.$customerId.'/'.$adsId.'/'.$phoneId.'/'.$audioId?>" width="<?=$dimensions[0]?>" height="<?=$dimensions[1]?>" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"&gt;&lt;/iframe&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col <-->
</div>
<!-- end row -->
<script>
    var clipboard = new ClipboardJS('.code-box-copy__btn');

    clipboard.on('success', function(e) {/*console.log(e);*/});

    clipboard.on('error', function(e) {/*console.log(e);*/});
</script>