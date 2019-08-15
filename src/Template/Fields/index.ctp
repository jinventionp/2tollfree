<?php ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Fields') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="<?=$this->Url->build(["controller" => "Fields", "action" => "add"])?>" class="btn btn-primary waves-effect waves-light" data-animation="fadein" data-overlaycolor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> <?= __('New Field')?></a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button>
                            <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-striped table-sm" id="products-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;"><?= $this->Paginator->sort('id') ?> </th>
                                <th><?= $this->Paginator->sort('module_id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('label') ?></th>
                                <th><?= $this->Paginator->sort('description') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th style="width: 85px;"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fields as $field): ?>
                            <tr>
                                <td><?= $this->Number->format($field->id) ?></td>
                                <td><?= h($field->module->name) ?></td>
                                <td><?= h($field->name) ?></td>
                                <td><?= h($field->label) ?></td>
                                <td><?= h($field->description) ?></td>
                                <td><?= h($field->created) ?></td>
                                <td>
                                    <a href="<?=$this->Url->build(["controller" => "Fields", "action" => "edit", $field->id])?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>                
                <?=$this->element('pagination')?>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->