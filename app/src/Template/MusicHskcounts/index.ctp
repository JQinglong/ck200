<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Music Hskcount'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="musicHskcounts index large-9 medium-8 columns content">
    <h3><?= __('Music Hskcounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('music_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnt_lylics') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnt_dist') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($musicHskcounts as $musicHskcount): ?>
            <tr>
                <td><?= $this->Number->format($musicHskcount->id) ?></td>
                <td><?= $musicHskcount->has('music') ? $this->Html->link($musicHskcount->music->id, ['controller' => 'Musics', 'action' => 'view', $musicHskcount->music->id]) : '' ?></td>
                <td><?= $this->Number->format($musicHskcount->level) ?></td>
                <td><?= $this->Number->format($musicHskcount->cnt_lylics) ?></td>
                <td><?= $this->Number->format($musicHskcount->cnt_dist) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $musicHskcount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $musicHskcount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $musicHskcount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicHskcount->id)]) ?>
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
