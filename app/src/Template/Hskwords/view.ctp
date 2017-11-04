<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hskword'), ['action' => 'edit', $hskword->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hskword'), ['action' => 'delete', $hskword->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hskword->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hskwords'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hskword'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hskwords view large-9 medium-8 columns content">
    <h3><?= h($hskword->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= h($hskword->word) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($hskword->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($hskword->level) ?></td>
        </tr>
    </table>
</div>
