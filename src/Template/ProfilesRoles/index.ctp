<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfilesRole[]|\Cake\Collection\CollectionInterface $profilesRoles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Profiles Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="profilesRoles index large-9 medium-8 columns content">
    <h3><?= __('Profiles Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profilesRoles as $profilesRole): ?>
            <tr>
                <td><?= $this->Number->format($profilesRole->id) ?></td>
                <td><?= $profilesRole->has('role') ? $this->Html->link($profilesRole->role->name, ['controller' => 'Roles', 'action' => 'view', $profilesRole->role->id]) : '' ?></td>
                <td><?= $profilesRole->has('profile') ? $this->Html->link($profilesRole->profile->name, ['controller' => 'Profiles', 'action' => 'view', $profilesRole->profile->id]) : '' ?></td>
                <td><?= h($profilesRole->created) ?></td>
                <td><?= h($profilesRole->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $profilesRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profilesRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profilesRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profilesRole->id)]) ?>
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
