<?php $base = $this->request->getAttribute('webroot'); ?>
<div class="table-responsive">
    <table class="table table-centered table-striped table-sm" id="products-datatable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'Teléfono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dial_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phones as $phone): ?>
            <tr>
                <td><?= $this->Number->format($phone->id) ?></td>
                <td><?= $phone->customer->name ?></td>
                <td><?= h($phone->name) ?></td>
                <td><?= $this->Number->format($phone->dial_code) ?></td>
                <td><?= h($phone->country_code) ?></td>
                <td><?= h($phone->created) ?></td>
                <td><?= h($phone->modified) ?></td>
                <td class="actions">
                    <a id="editRecord-<?=$phone->id?>" href="javascript:void(0)" data-url="<?=$this->Url->build(["controller" => "Phones", "action" => "edit", $phone->id])?>" data-title="<?=__('Edit Phone')?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar" class="action-icon"> <i class="fas fa-edit"></i></a>
                    <a id="deleteRecord-<?=$phone->id?>"  href="javascript:void(0);" data-url="<?=$this->Url->build(["controller" => "Phones", "action" => "remove", $phone->id])?>" data-url-action="<?=$this->Url->build(["controller" => "Phones", "action" => "delete", $phone->id])?>" data-title="<?=__('Delete Phone')?>" data-id="<?=$phone->id?>" data-question='Seguro que desea eliminar el <?=__('Phone')?> <span class="badge bg-soft-primary text-primary"><?=$phone->name?></span> ?'  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar" class="action-icon"> <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?=$this->element('pagination')?>