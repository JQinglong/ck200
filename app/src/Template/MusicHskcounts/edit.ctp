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
                ['action' => 'delete', $musicHskcount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $musicHskcount->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Music Hskcounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="musicHskcounts form large-9 medium-8 columns content">
    <?= $this->Form->create($musicHskcount) ?>
    <fieldset>
        <legend><?= __('Edit Music Hskcount') ?></legend>
        <?php
            echo $this->Form->input('music_id', ['options' => $musics]);
            echo $this->Form->input('level');
            echo $this->Form->input('cnt_lylics');
            echo $this->Form->input('cnt_dist');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
