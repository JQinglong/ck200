<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Music'), ['action' => 'edit', $music->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Music'), ['action' => 'delete', $music->id], ['confirm' => __('Are you sure you want to delete # {0}?', $music->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Musics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Music'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Singers'), ['controller' => 'Singers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Singer'), ['controller' => 'Singers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lylics'), ['controller' => 'Lylics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lylic'), ['controller' => 'Lylics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="musics view large-9 medium-8 columns content">
    <h3><?= h($music->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Music Nm') ?></th>
            <td><?= h($music->music_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Singer') ?></th>
            <td><?= $music->has('singer') ? $this->Html->link($music->singer->id, ['controller' => 'Singers', 'action' => 'view', $music->singer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($music->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnt Lylics') ?></th>
            <td><?= $this->Number->format($music->cnt_lylics) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnt Dist') ?></th>
            <td><?= $this->Number->format($music->cnt_dist) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Lylics') ?></h4>
        <?= $this->Text->autoParagraph(h($music->lylics)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Lylics') ?></h4>
        <?php if (!empty($music->lylics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Music Id') ?></th>
                <th scope="col"><?= __('Ord') ?></th>
                <th scope="col"><?= __('Lylics') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($music->lylics as $lylics): ?>
            <tr>
                <td><?= h($lylics->id) ?></td>
                <td><?= h($lylics->music_id) ?></td>
                <td><?= h($lylics->ord) ?></td>
                <td><?= h($lylics->lylics) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Lylics', 'action' => 'view', $lylics->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lylics', 'action' => 'edit', $lylics->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lylics', 'action' => 'delete', $lylics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lylics->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
