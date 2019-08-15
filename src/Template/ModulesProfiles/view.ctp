<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModulesProfile $modulesProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modules Profile'), ['action' => 'edit', $modulesProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modules Profile'), ['action' => 'delete', $modulesProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulesProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modules Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modules Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modulesProfiles view large-9 medium-8 columns content">
    <h3><?= h($modulesProfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= $modulesProfile->has('profile') ? $this->Html->link($modulesProfile->profile->name, ['controller' => 'Profiles', 'action' => 'view', $modulesProfile->profile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Module') ?></th>
            <td><?= $modulesProfile->has('module') ? $this->Html->link($modulesProfile->module->name, ['controller' => 'Modules', 'action' => 'view', $modulesProfile->module->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modulesProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($modulesProfile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($modulesProfile->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $modulesProfile->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add') ?></th>
            <td><?= $modulesProfile->add ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edit') ?></th>
            <td><?= $modulesProfile->edit ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delete') ?></th>
            <td><?= $modulesProfile->delete ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
