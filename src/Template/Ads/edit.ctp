<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?></li>
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
<div class="ads form large-9 medium-8 columns content">
    <?= $this->Form->create($ad) ?>
    <fieldset>
        <legend><?= __('Edit Ad') ?></legend>
        <?php
            echo $this->Form->input('pic_url');
            echo $this->Form->input('url');
            echo $this->Form->input('alt');
            echo $this->Form->input('active');
            echo $this->Form->input('no_follow');
            echo $this->Form->input('clicked');
            echo $this->Form->input('ad_type_id', ['options' => $adTypes]);
            echo $this->Form->input('contract_id', ['options' => $contracts]);
            echo $this->Form->input('state_id', ['options' => $states]);
            echo $this->Form->input('category_id', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
