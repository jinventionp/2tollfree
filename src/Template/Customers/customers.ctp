<?php
use Cake\I18n\Time;
 ?>
<?php $base = $this->request->getAttribute('webroot'); ?>
<script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
<div class="table-responsive">
    <table class="table table-centered table-striped table-sm" id="products-datatable">
        <thead>
            <tr>
                <th style="width: 20px;"><?= $this->Paginator->sort('id') ?> </th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>
                <th><?= $this->Paginator->sort('opening_days') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th style="width: 85px;"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->user->name) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->email) ?></td>
                <td><?= h($customer->website) ?></td>
                <td><?php 
                	$startTime = new Time($customer->start_time);
                	echo $startTime->i18nFormat([\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT]);?></td>
                <td><?php 
                	$endTime = new Time($customer->end_time);
                	echo $endTime->i18nFormat([\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT]);?></td>
                <td><?php 
                $weeks = (array) json_decode($customer->opening_days);
                echo implode(",", array_keys($weeks, 1)); 
                ?></td>
                <td class="text-center">
                    <?php $class = ($customer->active)? "fa-check-circle text-success" : "fa-times-circle text-danger" ;?>
                    <a href="javascript:void(0)" id="changeStatus" data-url="<?=$this->Url->build(["controller" => "Customers", "action" => "changestatus", $customer->id])?>"><i class="fas <?=$class?>"></i></a>
                </td>
                <td class="actions">
                    <a id="editRecord-<?=$customer->id?>" href="javascript:void(0)" data-url="<?=$this->Url->build(["controller" => "Customers", "action" => "edit", $customer->id])?>" data-title="<?=__('Edit Customer')?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar" class="action-icon"> <i class="fas fa-edit"></i></a>
                    <a id="deleteRecord-<?=$customer->id?>"  href="javascript:void(0);" data-url="<?=$this->Url->build(["controller" => "Customers", "action" => "remove", $customer->id])?>" data-url-action="<?=$this->Url->build(["controller" => "Customers", "action" => "delete", $customer->id])?>" data-title="<?=__('Delete Customer')?>" data-id="<?=$customer->id?>" data-question='Seguro que desea eliminar el <?=__('Customer')?> <span class="badge bg-soft-primary text-primary"><?=$customer->name?></span> ?'  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar" class="action-icon"> <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>                
<?=$this->element('pagination')?>