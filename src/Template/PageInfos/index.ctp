<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Page Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pageInfos index large-9 medium-8 columns content">
    <h3><?= __('Page Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pageInfos as $pageInfo): ?>
            <tr>
                <td><?= $this->Number->format($pageInfo->id) ?></td>
                <td><?= h($pageInfo->name) ?></td>
                <td><?= h($pageInfo->url) ?></td>
                <td><?= h($pageInfo->position) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pageInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pageInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pageInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageInfo->id)]) ?>
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
