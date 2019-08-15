<?php $base = $this->request->getAttribute('webroot'); ?>

<style type="text/css">
    #contentIframe{
        border: 1px solid #dee2e6;
        min-height: 360px;
        border-radius: 4px;
        padding: 10px;
    }
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
                <input type="hidden" name="urls" id="urls" value='<?=$urls?>'>
				<!--<input type="hidden" name="urlCustomers" id="urlCustomers" value="<?=$this->Url->build(["action" => "getcustomers"])?>">
				<input type="hidden" name="urlAdvertisements" id="urlAdvertisements" value="<?=$this->Url->build(["action" => "getadvertisements"])?>">
				<input type="hidden" name="urlPhones" id="urlPhones" value="<?=$this->Url->build(["action" => "getphones"])?>">
				<input type="hidden" name="urlAudios" id="urlAudios" value="<?=$this->Url->build(["action" => "getaudios"])?>">
				<input type="hidden" name="fullbaseUrl" id="fullbaseUrl" value="<?=$fullbaseUrl?>">
				<input type="hidden" name="urlAds" id="urlAds" value="<?=$this->Url->build(["action" => "ads"])?>">
                <input type="hidden" name="urlViewCodeAds" id="urlViewCodeAds" value="<?=$this->Url->build(["action" => "viewcodeads"])?>">-->

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group mb-3">
                            <label for="customersCode">Buscar Cliente</label>
                            <!--<select class="form-control" data-toggle="select2" name="customersCode" id="customersCode">
                                <option></option>
                            </select>-->
                            <?= $this->Form->select('customersCode', $customers, ['id' => 'customersCode', "class" => "form-control", "data-toggle" => "select2"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mb-3">
                            <label for="advertisementsCode">Seleccionar Anuncio</label>
                        	<select class="form-control" data-toggle="select2" id="advertisementsCode" name="advertisementsCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mb-3">
                            <label for="phonesCode">Seleccionar Teléfono</label>
                        	<select class="form-control" data-toggle="select2" id="phonesCode" name="phonesCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mb-3">
                            <label for="audiosCode">Seleccionar Audio</label>
                        	<select class="form-control" data-toggle="select2" id="audiosCode" name="audiosCode">
                            	<option></option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="form-group mt-0 text-right">
		                    <buttom id="generateIframeAds" class="btn btn-primary waves-effect waves-light" title=""><i class="fab fa-adversal"></i> Generar Anuncio</buttom>
                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#modalAds" data-url="<?=$this->Url->build(["controller" => "Customers", "action" => "viewcodeads"])?>" data-title="Código Generado" id="generateCode" disabled="disabled"><i class="fas fa-code"></i> Obtener Código</button>
		                    <buttom class="btn btn-secondary waves-effect m-l-5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Limpiar"><i class="fas fa-trash-alt"></i></buttom>
		            	</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="msgCode"></div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-lg-12">
                		<div id="contentIframe" style="border: 1px solid #dee2e6;min-height: 360px;" class="text-center"></div>
                	</div>
                </div>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->