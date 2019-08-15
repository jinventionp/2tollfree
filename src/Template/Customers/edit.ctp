<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-elements.init.js"></script> 
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= $this->Form->create($customer, ["id" => "formActions"]) ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"> Nombre <span class="text-danger">*</span></label>
                            <?= $this->Form->control('name', ["label" => false, "type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"> Correo electrónico <span class="text-danger">*</span></label>
                           <?= $this->Form->control('email', ["label" => false, "type " => "email", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Correo electrónico"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('website', ["label" => "Sitio Web", "type " => "text", "class" => "form-control",  "placeholder" => "Ingresa tu Sitio Web"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"> Usuario <span class="text-danger">*</span></label>
                           <?= $this->Form->control('user_id', ['options' => $users, "label" => false, "class" => "form-control", "data-toggle" => "select2"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                           <?= $this->Form->control('start_time', ["label" => "Horario Inicial", "type" => "text", "class" => "form-control"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('end_time', ["label" => "Horario Final", "type" => "text", "class" => "form-control"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group mb-3">
                            <?=$this->Form->hidden('opening_days', ["id" => "opening_days", "value" => $customer->opening_days])?>
                            <?=$this->Form->hidden('opening_days_action', ["id" => "opening_days_action", "value" => 'edit'])?>
                            <label class="mb-2">Días de Apertura</label>
                            <br>

                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-1" type="checkbox" value="lu" >
                                <label for="days-1">Lu</label>
                            </div>
                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-2" type="checkbox" value="ma" >
                                <label for="days-2">Ma</label>
                            </div>
                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-3" type="checkbox" value="mi" >
                                <label for="days-3">Mi</label>
                            </div>
                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-4" type="checkbox" value="ju" >
                                <label for="days-4">Ju</label>
                            </div>
                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-5" type="checkbox" value="vi" >
                                <label for="days-5">Vi</label>
                            </div>
                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-6" type="checkbox" value="sa" >
                                <label for="days-6">Sa</label>
                            </div>
                            <div class="checkbox checkbox-primary form-check-inline">
                                <input id="days-7" type="checkbox" value="do" >
                                <label for="days-7">Do</label>
                            </div>                            
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3 switchery-demo">
                            <input id="sponsor" name="sponsor" type="checkbox" data-plugin="switchery" data-color="#9261c6" data-size="small" <?=($customer->sponsor)?'checked':'';?> />
                            <label>Patrocinado</label>
                            <input id="active" name="active" type="checkbox" data-plugin="switchery" data-color="#9261c6" data-size="small" <?=($customer->active)?'checked':'';?> />
                            <label>Estado</label>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label>Observaciones</label>
                            <?= $this->Form->control('observations', ["label" => false, "class" => "form-control", 'rows' => '2']);?>
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