<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lylic'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lylics index large-9 medium-8 columns content">
    <h3><?= __('Lylics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('music_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ord') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lylics') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lylics as $lylic): ?>
            <tr>
                <td><?= $this->Number->format($lylic->id) ?></td>
                <td><?= $lylic->has('music') ? $this->Html->link($lylic->music->id, ['controller' => 'Musics', 'action' => 'view', $lylic->music->id]) : '' ?></td>
                <td><?= $this->Number->format($lylic->ord) ?></td>
                <td><?= h($lylic->lylics) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lylic->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lylic->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lylic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lylic->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
