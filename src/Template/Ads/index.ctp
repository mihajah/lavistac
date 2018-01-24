<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ad Types'), ['controller' => 'AdTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Type'), ['controller' => 'AdTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ads index large-9 medium-8 columns content">
    <h3><?= __('Ads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pic_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_follow') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clicked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contract_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ads as $ad): ?>
            <tr>
                <td><?= $this->Number->format($ad->id) ?></td>
                <td><?= h($ad->created) ?></td>
                <td><?= h($ad->modified) ?></td>
                <td><?= h($ad->pic_url) ?></td>
                <td><?= h($ad->url) ?></td>
                <td><?= h($ad->alt) ?></td>
                <td><?= h($ad->active) ?></td>
                <td><?= h($ad->no_follow) ?></td>
                <td><?= $this->Number->format($ad->clicked) ?></td>
                <td><?= $ad->has('ad_type') ? $this->Html->link($ad->ad_type->name, ['controller' => 'AdTypes', 'action' => 'view', $ad->ad_type->id]) : '' ?></td>
                <td><?= $ad->has('contract') ? $this->Html->link($ad->contract->id, ['controller' => 'Contracts', 'action' => 'view', $ad->contract->id]) : '' ?></td>
                <td><?= $ad->has('state') ? $this->Html->link($ad->state->name, ['controller' => 'States', 'action' => 'view', $ad->state->id]) : '' ?></td>
                <td><?= $ad->has('category') ? $this->Html->link($ad->category->name, ['controller' => 'Categories', 'action' => 'view', $ad->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ad->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ad->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?>
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
