<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Singer'), ['action' => 'edit', $singer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Singer'), ['action' => 'delete', $singer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $singer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Singers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Singer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Musics'), ['controller' => 'Musics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Music'), ['controller' => 'Musics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="singers view large-9 medium-8 columns content">
    <h3><?= h($singer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Singer Nm') ?></th>
            <td><?= h($singer->singer_nm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img Url') ?></th>
            <td><?= h($singer->img_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($singer->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Musics') ?></h4>
        <?php if (!empty($singer->musics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Music Nm') ?></th>
                <th scope="col"><?= __('Lylics') ?></th>
                <th scope="col"><?= __('Singer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($singer->musics as $musics): ?>
            <tr>
                <td><?= h($musics->id) ?></td>
                <td><?= h($musics->music_nm) ?></td>
                <td><?= h($musics->lylics) ?></td>
                <td><?= h($musics->singer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Musics', 'action' => 'view', $musics->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Musics', 'action' => 'edit', $musics->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Musics', 'action' => 'delete', $musics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musics->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
