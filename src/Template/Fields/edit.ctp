<?= $this->Flash->render() ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Edit Field') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="msgFormActions"></div>                
                <?= $this->Form->create($field, ["id" => "formActions"]) ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="module_id"> Modulos <span class="text-danger">*</span></label>
                            <?= $this->Form->control('module_id', ['options' => $modules, "label" => false, "class" => "form-control", "data-toggle" => "select2"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"> Nombre <span class="text-danger">*</span></label>
                            <?= $this->Form->control('name', ["label" => false, "type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('label', ["label" => "Etiqueta", "type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa la Etiqueta"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                           <?= $this->Form->control('description', ["label" => "Descripción", "class" => "form-control", "placeholder" => "Ingresa la Descripción"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                        <a href="<?=$this->Url->build(["controller" => "Fields", "action" => "index"])?>" class="btn btn-secondary waves-effect m-l-5">Cancelar</a>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->