<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-elements.init.js"></script> 
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="msgFormActions"></div>                
                <?= $this->Form->create($role, ["id" => "formActions"]) ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('name', ["label" => "Nombre", "type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                           <?= $this->Form->control('parent_id', ['options' => $parentRoles, 'empty' => true, "class" => "form-control", "data-toggle" => "select2"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('profiles._ids', ['options' => $profiles, "class" => "form-control select2-multiple",  "data-toggle" => "select2", "multiple" => "multiple", "data-placeholder" => "Perfiles ..."]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                           <?= $this->Form->control('description', ["label" => "Descripción", "class" => "form-control", "placeholder" => "Ingresa la Descripción", 'rows' => '2']);?>
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