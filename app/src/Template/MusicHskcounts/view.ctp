<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Music Hskcount'), ['action' => 'edit', $musicHskcount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Music Hskcount'), ['action' => 'delete', $musicHskcount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicHskcount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Music Hskcounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Music Hskcount'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="musicHskcounts view large-9 medium-8 columns content">
    <h3><?= h($musicHskcount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Music') ?></th>
            <td><?= $musicHskcount->has('music') ? $this->Html->link($musicHskcount->music->id, ['controller' => 'Musics', 'action' => 'view', $musicHskcount->music->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($musicHskcount->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($musicHskcount->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnt Lylics') ?></th>
            <td><?= $this->Number->format($musicHskcount->cnt_lylics) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnt Dist') ?></th>
            <td><?= $this->Number->format($musicHskcount->cnt_dist) ?></td>
        </tr>
    </table>
</div>
