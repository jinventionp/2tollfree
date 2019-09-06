<?php $base = $this->request->getAttribute('webroot'); ?>
<!--<script src="<?=$base?>assets/js/pages/form-ajax.init.js"></script>
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>-->
<div class="table-responsive">
    <table class="table table-centered table-striped table-sm" id="products-datatable">
        <thead>
            <tr>
                <th style="width: 20px;"><?= $this->Paginator->sort('id') ?> </th>
                <th><?= $this->Paginator->sort('role_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th class="text-center"><?= $this->Paginator->sort('active') ?></th>
                <th style="width: 85px;"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->role->name) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone) ?></td>
                <td class="text-center">
                    <?php $class = ($user->active)? "fa-check-circle text-success" : "fa-times-circle text-danger" ;?>
                    <a href="javascript:void(0)" id="changeStatus-<?=$user->id?>" data-url="<?=$this->Url->build(["controller" => "Users", "action" => "changestatus", $user->id])?>"><i class="fas <?=$class?>"></i></a>
                </td>
                <td class="actions">
                    <a id="editRecord-<?=$user->id?>" href="javascript:void(0)" data-url="<?=$this->Url->build(["controller" => "Users", "action" => "edit", $user->id])?>" data-title="<?=__('Edit User')?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar" class="action-icon"> <i class="fas fa-edit"></i></a>
                    <a id="deleteRecord-<?=$user->id?>"  href="javascript:void(0);" data-url="<?=$this->Url->build(["controller" => "Users", "action" => "remove", $user->id])?>" data-url-action="<?=$this->Url->build(["controller" => "Users", "action" => "delete", $user->id])?>" data-title="<?=__('Delete User')?>" data-id="<?=$user->id?>" data-question='Seguro que desea eliminar el <?=__('User')?> <span class="badge bg-soft-primary text-primary"><?=$user->name?></span> ?'  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar" class="action-icon"> <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>                
<?=$this->element('pagination')?>