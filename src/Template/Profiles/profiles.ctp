<?php ?>
<div class="table-responsive">
    <table class="table table-centered table-striped table-sm" id="products-datatable">
        <thead>
            <tr>
                <th style="width: 20px;"><?= $this->Paginator->sort('id') ?> </th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th style="width: 85px;"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profiles as $profile): ?>
            <tr>
                <td><?= $this->Number->format($profile->id) ?></td>
                <td><?= h($profile->name) ?></td>
                <td><?= h($profile->description) ?></td>
                <td><?= h($profile->created) ?></td>
                <td>
                    <a href="<?=$this->Url->build(["controller" => "Profiles", "action" => "edit", $profile->id])?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>                
<?=$this->element('pagination')?>