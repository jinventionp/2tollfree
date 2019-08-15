<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-elements.init.js"></script> 
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= $this->Form->create($advertisement, ["id" => "formActions", 'type' => 'file']) ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"><?= __('Customer') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('customer_id', ["label" => false, 'options' => $customers, "class" => "form-control", "data-toggle" => "select2", "placeholder" => "Selecciona el Cliente"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"><?= __('Name') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('name', ["label" => false, "class" => "form-control","placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="dimensions"><?= __('Dimensions') ?></label>
                            <?=$this->Form->control('dimensions', ["label" => false, 'options' => ['200x200' => 'Imagen 200x200px', '250x250' => 'Imagen 250x250px', '300x250' => 'Imagen 300x250px', '300x600' => 'Imagen 300x600 px', '336x280' => 'Imagen 336x280px'], "empty" => true, "class" => "js-example-placeholder-single js-states form-control", "data-toggle" => "select2"])?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="url_youtube"><?= __('url_youtube') ?></label>
                            <?= $this->Form->control('url_youtube', ["label" => false, "class" => "form-control", "placeholder" => "URL youtube"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="image"><?= __('Image') ?></label>
                            <?= $this->Form->control('image', ["label" => false, 'type' => 'file']);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3 switchery-demo">
                            <input id="active" name="active" type="checkbox" checked data-plugin="switchery" data-color="#9261c6" data-size="small"/>
                            <label>Activo</label>
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
     $(document).ready(function() {
        $('#dimensions').select2({
            placeholder: "Seleccione la Dimensión", 
            allowClear: true
        });
    });
</script>