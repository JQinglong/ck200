<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $music->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $music->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Musics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Singers'), ['controller' => 'Singers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Singer'), ['controller' => 'Singers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lylics'), ['controller' => 'Lylics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lylic'), ['controller' => 'Lylics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="musics form large-9 medium-8 columns content">
    <?= $this->Form->create($music) ?>
    <fieldset>
        <legend><?= __('Edit Music') ?></legend>
        <?php
            echo $this->Form->input('music_nm');
            echo $this->Form->input('lylics');
            echo $this->Form->input('singer_id', ['options' => $singers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
