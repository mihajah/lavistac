<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Type'), ['action' => 'edit', $adType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Type'), ['action' => 'delete', $adType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adTypes view large-9 medium-8 columns content">
    <h3><?= h($adType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($adType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($adType->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= $this->Number->format($adType->width) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ads') ?></h4>
        <?php if (!empty($adType->ads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Pic Url') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Alt') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('No Follow') ?></th>
                <th scope="col"><?= __('Clicked') ?></th>
                <th scope="col"><?= __('Ad Type Id') ?></th>
                <th scope="col"><?= __('Contract Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adType->ads as $ads): ?>
            <tr>
                <td><?= h($ads->id) ?></td>
                <td><?= h($ads->created) ?></td>
                <td><?= h($ads->modified) ?></td>
                <td><?= h($ads->pic_url) ?></td>
                <td><?= h($ads->url) ?></td>
                <td><?= h($ads->alt) ?></td>
                <td><?= h($ads->active) ?></td>
                <td><?= h($ads->no_follow) ?></td>
                <td><?= h($ads->clicked) ?></td>
                <td><?= h($ads->ad_type_id) ?></td>
                <td><?= h($ads->contract_id) ?></td>
                <td><?= h($ads->state_id) ?></td>
                <td><?= h($ads->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ads', 'action' => 'edit', $ads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ads', 'action' => 'delete', $ads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
