<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Page Info'), ['action' => 'edit', $pageInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page Info'), ['action' => 'delete', $pageInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Page Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Info'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pageInfos view large-9 medium-8 columns content">
    <h3><?= h($pageInfo->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pageInfo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($pageInfo->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($pageInfo->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pageInfo->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($pageInfo->text)); ?>
    </div>
</div>
