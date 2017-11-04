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
                ['action' => 'delete', $singer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $singer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Singers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="singers form large-9 medium-8 columns content">
    <?= $this->Form->create($singer) ?>
    <fieldset>
        <legend><?= __('Edit Singer') ?></legend>
        <?php
            echo $this->Form->input('singer_nm');
            echo $this->Form->input('img_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
