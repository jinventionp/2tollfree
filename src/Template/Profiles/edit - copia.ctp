<?php 
//pr($modules->toArray())
//pr($profile);
?>
<?php //pr($modules->toArray());?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Add Profile') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            	<div id="msgFormActions"></div>                
                <?= $this->Form->create($profile) ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <?= $this->Form->control('name', ["type " => "text", "class" => "form-control", "required" => "required", "placeholder" => "Ingresa tu Nombre"]);?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                           <?= $this->Form->control('description', ["class" => "form-control", "placeholder" => "Ingresa la Descripción"]);?>
                           <?php 
                            /*echo $this->Form->control('fields._ids', ['options' => $fields]);
                            echo $this->Form->control('modules._ids', ['options' => $modules]);
                            echo $this->Form->control('roles._ids', ['options' => $roles]);
                            echo $this->Form->control('modules.0.id', ['value' => 10]);
                            echo $this->Form->control('modules.0._joinData.active', ['value' => 1]);
                            echo $this->Form->control('modules.0._joinData.edit', ['value' => 1]);
                            echo $this->Form->control('modules.0.id');
                            echo $this->Form->control('modules.0.name');
                            echo $this->Form->control('modules.1.id');
                            echo $this->Form->control('modules.1.name');*/
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <p class="sub-header">Seleccionar los privilegios de este perfil</p>
                <div class="table-responsive">
                    <table class="table table-centered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    <div class="checkbox mb-2">
                                        <input type="checkbox" id="modules" value="">
                                        <label class="custom-control-label" for="modules">Módulos</label>
                                    </div>
                                </th>
                                <th class="text-center">
                                    <div class="checkbox mb-2">
                                        <input type="checkbox" id="see" value="">
                                        <label class="custom-control-label" for="see">Ver</label>
                                    </div>
                                </th>
                                <th class="text-center">
                                    <div class="checkbox mb-2">
                                        <input type="checkbox" id="new" value="">
                                        <label class="custom-control-label" for="new">Crear</label>
                                    </div>
                                </th>
                                <th class="text-center">
                                    <div class="checkbox mb-2">
                                        <input type="checkbox" id="edit" value="">
                                        <label class="custom-control-label" for="edit">Editar</label>
                                    </div>
                                </th>
                                <th class="text-center">
                                    <div class="checkbox mb-2">
                                        <input type="checkbox" id="erase" value="">
                                        <label class="custom-control-label" for="erase">Borrar</label>
                                    </div>
                                </th>
                                <th><label>Privilegios de Campos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0; 
                            foreach ($modules as $module): 
                                $seeCheck = $newCheck = $editCheck = $eraseCheck = "";
                                $itemModule = [];
                                foreach ($profile->modules as $selectedModule) {
                                    if($module->id == $selectedModule->id){
                                        $itemModule = $selectedModule;
                                    }
                                }
                                if(!empty($itemModule)){
                                    //pr($itemModule);
                                    $seeCheck = ($itemModule->_joinData->see)? 'checked' : '';
                                    $newCheck = ($itemModule->_joinData->new)? 'checked' : '';
                                    $editCheck = ($itemModule->_joinData->edit)? 'checked' : '';
                                    $eraseCheck = ($itemModule->_joinData->erase)? 'checked' : '';
                                    //echo $seeCheck;
                                }
                                ?>
                            <tr>
                                <th style="background-color: #f1f5f7;">
                                    <div class="checkbox mb-2">
                                        <!--<input type="checkbox" class="custom-control-input" id="module-<?=$module->id?>" name="profiles[_ids][<?=$i?>]" value="<?=$module->id?>">-->
                                        <?= $this->Form->control("modules.".$i.".id", ["label" => false, "type" => "checkbox", "value" => $module->id, "data-item" => $i, "templates" => ['inputContainer' => '{{content}}']]);?>
                                        <label class="custom-control-label" for="modules-<?=$i?>-id">
                                        <?= (empty($module->label))? $module->name : $module->label;?>
                                        </label>
                                    </div>
                                </th>
                                <td class="text-center">
                                    <div class="checkbox mb-2">
                                        <!--<input type="checkbox" class="custom-control-input" id="view-1" name="">-->
                                        <?= $this->Form->control("modules.".$i."._joinData.see", ["label" => false, "type" => "checkbox", "data-item" => $i, "templates" => ['inputContainer' => '{{content}}'], $seeCheck]);?>
                                        <label class="custom-control-label" for="modules-<?=$i?>-joindata-see">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="checkbox mb-2">
                                        <!--<input type="checkbox" class="custom-control-input" id="create-2">-->
                                        <?= $this->Form->control("modules.".$i."._joinData.new", ["label" => false, "type" => "checkbox", "data-item" => $i, "templates" => ['inputContainer' => '{{content}}'], $newCheck]);?>
                                        <label class="custom-control-label" for="modules-<?=$i?>-joindata-new">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="checkbox mb-2">
                                        <!--<input type="checkbox" class="custom-control-input" id="edit-1">-->
                                        <?= $this->Form->control("modules.".$i."._joinData.edit", ["label" => false, "type" => "checkbox", "data-item" => $i, "templates" => ['inputContainer' => '{{content}}'], $editCheck]);?>
                                        <label class="custom-control-label" for="modules-<?=$i?>-joindata-edit">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="checkbox mb-2">
                                        <!--<input type="checkbox" class="custom-control-input" id="delete-2">-->
                                        <?= $this->Form->control("modules.".$i."._joinData.erase", ["label" => false, "type" => "checkbox", "data-item" => $i, "templates" => [   'inputContainer' => '{{content}}'], $eraseCheck]);?>
                                        <label class="custom-control-label" for="modules-<?=$i?>-joindata-erase">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#cardCollpase<?=$i?>" class="btn btn-light btn-xs waves-effect waves-light" id="btn-archive" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="cardCollpase<?=$i?>">Archive</a>
                                </td>
                            </tr>
                            <tr id="cardCollpase<?=$i?>" class="collapse pt-3">
                                <td colspan="7">Collapse</td>
                            </tr>
                            <?php 
                            $i ++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                	<div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                        <a href="<?=$this->Url->build(["controller" => "Profiles", "action" => "index"])?>" class="btn btn-secondary waves-effect m-l-5">Cancelar</a>
                	</div>
                </div>
				<?= $this->Form->end() ?>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->