<?php ?>
<div class="table-responsive">
    <table class="table table-centered table-striped table-sm" id="products-datatable">
        <thead>
            <tr>
                <th style="width: 20px;"><?= $this->Paginator->sort('id') ?> </th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th style="width: 85px;"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $this->Number->format($role->id) ?></td>
                <td><?= h($role->name) ?></td>
                <td><?= $role->has('parent_role') ? $this->Html->link($role->parent_role->name, ['controller' => 'Roles', 'action' => 'view', $role->parent_role->id]) : '' ?></td>
                <td><?= h($role->created) ?></td>
                <td class="actions">
                    <a id="editRecord-<?=$role->id?>" href="javascript:void(0)" data-url="<?=$this->Url->build(["controller" => "Roles", "action" => "edit", $role->id])?>" data-title="<?=__('Edit Rol')?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                    <a id="deleteRecord-<?=$role->id?>"  href="javascript:void(0);" data-url="<?=$this->Url->build(["controller" => "Roles", "action" => "remove", $role->id])?>" data-url-action="<?=$this->Url->build(["controller" => "Roles", "action" => "delete", $role->id])?>" data-title="<?=__('Delete Rol')?>" data-id="<?=$role->id?>" data-question='Seguro que desea eliminar el <?=__('Rol')?> <span class="badge bg-soft-primary text-primary"><?=$role->name?></span> ?'  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>                
<?=$this->element('pagination')?>