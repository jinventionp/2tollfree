<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audio[]|\Cake\Collection\CollectionInterface $audios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Audio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="audios index large-9 medium-8 columns content">
    <h3><?= __('Audios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('audio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('audio_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('audio_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('audio_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($audios as $audio): ?>
            <tr>
                <td><?= $this->Number->format($audio->id) ?></td>
                <td><?= $audio->has('customer') ? $this->Html->link($audio->customer->name, ['controller' => 'Customers', 'action' => 'view', $audio->customer->id]) : '' ?></td>
                <td><?= h($audio->name) ?></td>
                <td><?= h($audio->audio) ?></td>
                <td><?= h($audio->audio_dir) ?></td>
                <td><?= h($audio->audio_size) ?></td>
                <td><?= h($audio->audio_type) ?></td>
                <td><?= h($audio->is_active) ?></td>
                <td><?= h($audio->created) ?></td>
                <td><?= h($audio->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $audio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $audio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $audio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $audio->id)]) ?>
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
