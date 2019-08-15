<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-elements.init.js"></script> 
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= $this->Form->create($user, ["id" => "formActions"]) ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="name"><?= __('Name') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('name', ["label" => false, "class" => "form-control","placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="email"><?= __('Email') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('email', ["label" => false, "class" => "form-control", "placeholder" => "Ingresa tu Correo electrónico"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('phone', ["label" => "Teléfono", "class" => "form-control", "placeholder" => "Ingresa tu Teléfono"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="password"><?= __('Password') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('password', ["label" => false, "class" => "form-control", "placeholder" => "Ingresa tu Contraseña"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="confirm-password"><?= __('Confirm Password') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('confirm_password', ["label" => false, "type" => "password", "class" => "form-control", "placeholder" => "Confirma tu Contraseña"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="role-id"><?= __('Rol') ?><span class="text-danger">*</span></label>
                            <?= $this->Form->control('role_id', ["label" => false, 'options' => $roles, "class" => "form-control", "data-toggle" => "select2", "placeholder" => "Selecciona el Rol"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
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