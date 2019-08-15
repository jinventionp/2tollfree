<?php $base = $this->request->getAttribute('webroot'); ?>
<div class="table-responsive">
    <table class="table table-centered table-striped table-sm" id="products-datatable">
        <thead>
            <tr>
                <th style="width: 20px;"><?= $this->Paginator->sort('id') ?> </th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dimensions') ?></th>
                <th scope="col"  class="text-center"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url_youtube') ?></th>
                <th style="width: 106px;" class="text-center"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advertisements as $advertisement): ?>
            <tr>
                <td><?= $this->Number->format($advertisement->id) ?></td>
                <td><?= $advertisement->has('customer') ? $this->Html->link($advertisement->customer->name, ['controller' => 'Customers', 'action' => 'view', $advertisement->customer->id]) : '' ?></td>
                <td><?= h($advertisement->name) ?></td>
                <td>
                    <img src="<?=$base?>files/Advertisements/image/thumbnail-<?= h($advertisement->image) ?>" alt="image" class="img-fluid avatar-md rounded">
                </td>
                <td><?= h($advertisement->dimensions) ?> px</td>
                <td class="text-center">
                    <?php $class = ($advertisement->active)? "fa-check-circle text-success" : "fa-times-circle text-danger" ;?>
                    <a href="javascript:void(0)" id="changeStatus" data-url="<?=$this->Url->build(["controller" => "Advertisements", "action" => "changestatus", $advertisement->id])?>"><i class="fas <?=$class?>"></i></a>
                </td>
                <td><?= h($advertisement->url_youtube) ?></td>
                <td class="actions">
                    <a id="viewAds-<?=$advertisement->id?>" href="javascript:void(0)" data-url="<?=$this->Url->build(["action" => "viewads", $advertisement->id, $advertisement->customer->id])?>" data-title="<?=__('View Advertisement')?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver" title="" class="action-icon"><i class="fas fa-code"></i></a>
                    <a id="editRecord-<?=$advertisement->id?>" href="javascript:void(0)" data-url="<?=$this->Url->build(["controller" => "Advertisements", "action" => "edit", $advertisement->id])?>" data-title="<?=__('Edit Advertisement')?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar" class="action-icon"> <i class="fas fa-edit"></i></a>
                    <a id="deleteRecord-<?=$advertisement->id?>"  href="javascript:void(0);" data-url="<?=$this->Url->build(["controller" => "Advertisements", "action" => "remove", $advertisement->id])?>" data-url-action="<?=$this->Url->build(["controller" => "Advertisements", "action" => "delete", $advertisement->id])?>" data-title="<?=__('Delete Advertisement')?>" data-id="<?=$advertisement->id?>" data-question='Seguro que desea eliminar el <?=__('Advertisement')?> <span class="badge bg-soft-primary text-primary"><?=$advertisement->name?></span> ?'  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar" class="action-icon"> <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>                
<?=$this->element('pagination')?>