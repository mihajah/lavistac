<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Page Infos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pageInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($pageInfo) ?>
    <fieldset>
        <legend><?= __('Add Page Info') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('text');
            echo $this->Form->input('url');
            echo $this->Form->input('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
