<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advertisement[]|\Cake\Collection\CollectionInterface $images
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Advertisement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="advertisements index large-9 medium-8 columns content">
    <h3><?= __('Advertisements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dimensions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url_youtube') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advertisements as $advertisement): ?>
            <tr>
                <td><?= $this->Number->format($advertisement->id) ?></td>
                <td><?= $advertisement->has('customer') ? $this->Html->link($advertisement->customer->name, ['controller' => 'Customers', 'action' => 'view', $advertisement->customer->id]) : '' ?></td>
                <td><?= h($advertisement->name) ?></td>
                <td><?= h($advertisement->image) ?></td>
                <td><?= h($advertisement->image_dir) ?></td>
                <td><?= h($advertisement->image_size) ?></td>
                <td><?= h($advertisement->image_type) ?></td>
                <td><?= h($advertisement->dimensions) ?></td>
                <td><?= h($advertisement->is_active) ?></td>
                <td><?= h($advertisement->url_youtube) ?></td>
                <td><?= h($advertisement->created) ?></td>
                <td><?= h($advertisement->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $advertisement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advertisement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advertisement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertisement->id)]) ?>
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
