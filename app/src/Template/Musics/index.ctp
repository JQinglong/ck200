<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Music'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Singers'), ['controller' => 'Singers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Singer'), ['controller' => 'Singers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lylics'), ['controller' => 'Lylics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lylic'), ['controller' => 'Lylics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="musics index large-9 medium-8 columns content">
    <h3><?= __('Musics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('music_nm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('singer_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($musics as $music): ?>
            <tr>
                <td><?= $this->Number->format($music->id) ?></td>
                <td><?= h($music->music_nm) ?></td>
                <td><?= $music->has('singer') ? $this->Html->link($music->singer->id, ['controller' => 'Singers', 'action' => 'view', $music->singer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $music->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $music->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $music->id], ['confirm' => __('Are you sure you want to delete # {0}?', $music->id)]) ?>
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
