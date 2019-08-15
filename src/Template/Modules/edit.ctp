<?= $this->Flash->render() ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('New Module') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="msgFormActions"></div>                
                <?= $this->Form->create($module, ["id" => "formActions"]) ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('name', ["label" => "Nombre del Controlador", "type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('label', ["label" => "Etiqueta", "type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Nombre"]);?>
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
                        <a href="<?=$this->Url->build(["controller" => "Modules", "action" => "index"])?>" class="btn btn-secondary waves-effect m-l-5">Cancelar</a>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->