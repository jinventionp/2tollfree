<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FieldsProfile $fieldsProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fields Profile'), ['action' => 'edit', $fieldsProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fields Profile'), ['action' => 'delete', $fieldsProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fieldsProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fields Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fields Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fieldsProfiles view large-9 medium-8 columns content">
    <h3><?= h($fieldsProfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= $fieldsProfile->has('profile') ? $this->Html->link($fieldsProfile->profile->name, ['controller' => 'Profiles', 'action' => 'view', $fieldsProfile->profile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field') ?></th>
            <td><?= $fieldsProfile->has('field') ? $this->Html->link($fieldsProfile->field->name, ['controller' => 'Fields', 'action' => 'view', $fieldsProfile->field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fieldsProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fieldsProfile->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fieldsProfile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visible') ?></th>
            <td><?= $fieldsProfile->visible ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Readonly') ?></th>
            <td><?= $fieldsProfile->readonly ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
