<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FieldsProfile $fieldsProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fields Profiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fieldsProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($fieldsProfile) ?>
    <fieldset>
        <legend><?= __('Add Fields Profile') ?></legend>
        <?php
            echo $this->Form->control('profile_id', ['options' => $profiles]);
            echo $this->Form->control('field_id', ['options' => $fields]);
            echo $this->Form->control('visible');
            echo $this->Form->control('readonly');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
