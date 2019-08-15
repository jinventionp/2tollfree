<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audio $audio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $audio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $audio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Audios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="audios form large-9 medium-8 columns content">
    <?= $this->Form->create($audio) ?>
    <fieldset>
        <legend><?= __('Edit Audio') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('name');
            echo $this->Form->control('audio');
            echo $this->Form->control('audio_dir');
            echo $this->Form->control('audio_size');
            echo $this->Form->control('audio_type');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
