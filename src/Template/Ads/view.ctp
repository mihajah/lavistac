<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad'), ['action' => 'edit', $ad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Types'), ['controller' => 'AdTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Type'), ['controller' => 'AdTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ads view large-9 medium-8 columns content">
    <h3><?= h($ad->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pic Url') ?></th>
            <td><?= h($ad->pic_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($ad->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alt') ?></th>
            <td><?= h($ad->alt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad Type') ?></th>
            <td><?= $ad->has('ad_type') ? $this->Html->link($ad->ad_type->name, ['controller' => 'AdTypes', 'action' => 'view', $ad->ad_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contract') ?></th>
            <td><?= $ad->has('contract') ? $this->Html->link($ad->contract->id, ['controller' => 'Contracts', 'action' => 'view', $ad->contract->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $ad->has('state') ? $this->Html->link($ad->state->name, ['controller' => 'States', 'action' => 'view', $ad->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $ad->has('category') ? $this->Html->link($ad->category->name, ['controller' => 'Categories', 'action' => 'view', $ad->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ad->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clicked') ?></th>
            <td><?= $this->Number->format($ad->clicked) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ad->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ad->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $ad->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Follow') ?></th>
            <td><?= $ad->no_follow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
