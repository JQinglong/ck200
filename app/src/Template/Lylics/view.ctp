<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lylic'), ['action' => 'edit', $lylic->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lylic'), ['action' => 'delete', $lylic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lylic->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lylics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lylic'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lylics view large-9 medium-8 columns content">
    <h3><?= h($lylic->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Music') ?></th>
            <td><?= $lylic->has('music') ? $this->Html->link($lylic->music->id, ['controller' => 'Musics', 'action' => 'view', $lylic->music->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lylics') ?></th>
            <td><?= h($lylic->lylics) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lylic->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ord') ?></th>
            <td><?= $this->Number->format($lylic->ord) ?></td>
        </tr>
    </table>
</div>
