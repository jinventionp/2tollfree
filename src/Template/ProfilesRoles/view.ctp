<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfilesRole $profilesRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profiles Role'), ['action' => 'edit', $profilesRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profiles Role'), ['action' => 'delete', $profilesRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profilesRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profiles Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profiles Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="profilesRoles view large-9 medium-8 columns content">
    <h3><?= h($profilesRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $profilesRole->has('role') ? $this->Html->link($profilesRole->role->name, ['controller' => 'Roles', 'action' => 'view', $profilesRole->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= $profilesRole->has('profile') ? $this->Html->link($profilesRole->profile->name, ['controller' => 'Profiles', 'action' => 'view', $profilesRole->profile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profilesRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($profilesRole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($profilesRole->modified) ?></td>
        </tr>
    </table>
</div>
