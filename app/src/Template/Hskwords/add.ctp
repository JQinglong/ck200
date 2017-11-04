<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hskwords'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="hskwords form large-9 medium-8 columns content">
    <?= $this->Form->create($hskword) ?>
    <fieldset>
        <legend><?= __('Add Hskword') ?></legend>
        <?php
            echo $this->Form->input('level');
            echo $this->Form->input('word');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
