<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModulesProfile[]|\Cake\Collection\CollectionInterface $modulesProfiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Modules Profile'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modulesProfiles index large-9 medium-8 columns content">
    <h3><?= __('Modules Profiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('module_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('add') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modulesProfiles as $modulesProfile): ?>
            <tr>
                <td><?= $this->Number->format($modulesProfile->id) ?></td>
                <td><?= $modulesProfile->has('profile') ? $this->Html->link($modulesProfile->profile->name, ['controller' => 'Profiles', 'action' => 'view', $modulesProfile->profile->id]) : '' ?></td>
                <td><?= $modulesProfile->has('module') ? $this->Html->link($modulesProfile->module->name, ['controller' => 'Modules', 'action' => 'view', $modulesProfile->module->id]) : '' ?></td>
                <td><?= h($modulesProfile->active) ?></td>
                <td><?= h($modulesProfile->add) ?></td>
                <td><?= h($modulesProfile->edit) ?></td>
                <td><?= h($modulesProfile->delete) ?></td>
                <td><?= h($modulesProfile->created) ?></td>
                <td><?= h($modulesProfile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $modulesProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modulesProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modulesProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulesProfile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
