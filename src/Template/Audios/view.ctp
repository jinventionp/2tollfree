<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audio $audio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Audio'), ['action' => 'edit', $audio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Audio'), ['action' => 'delete', $audio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $audio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Audios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Audio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="audios view large-9 medium-8 columns content">
    <h3><?= h($audio->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $audio->has('customer') ? $this->Html->link($audio->customer->name, ['controller' => 'Customers', 'action' => 'view', $audio->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($audio->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audio') ?></th>
            <td><?= h($audio->audio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audio Dir') ?></th>
            <td><?= h($audio->audio_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audio Size') ?></th>
            <td><?= h($audio->audio_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audio Type') ?></th>
            <td><?= h($audio->audio_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($audio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($audio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($audio->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $audio->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
