<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="images view large-9 medium-8 columns content">
    <h3><?= h($image->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $image->has('customer') ? $this->Html->link($image->customer->name, ['controller' => 'Customers', 'action' => 'view', $image->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($image->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($image->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Dir') ?></th>
            <td><?= h($image->image_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Size') ?></th>
            <td><?= h($image->image_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Type') ?></th>
            <td><?= h($image->image_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dimensions') ?></th>
            <td><?= h($image->dimensions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url Youtube') ?></th>
            <td><?= h($image->url_youtube) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($image->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($image->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($image->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $image->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
