<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lylics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lylics form large-9 medium-8 columns content">
    <?= $this->Form->create($lylic) ?>
    <fieldset>
        <legend><?= __('Add Lylic') ?></legend>
        <?php
            echo $this->Form->input('music_id', ['options' => $musics]);
            echo $this->Form->input('ord');
            echo $this->Form->input('lylics');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
