<nav class="navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-minimize">
         <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
         </button>
      </div>
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Contract - <?=h($contract->id) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $contract->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?> </li>
            <li><?= $this->Html->link(__('New'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="card">
               <div class="header">
                  <h3><?= h($contract->label) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                     <tr>
                        <th scope="row"><?= __('Contract Type') ?></th>
                        <td><?= $contract->has('contract_type') ? $this->Html->link($contract->contract_type->name, ['controller' => 'ContractTypes', 'action' => 'view', $contract->contract_type->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('User') ?></th>
                        <td><?= $contract->has('user') ? $this->Html->link($contract->user->id, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($contract->id) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Start') ?></th>
                        <td><?= h($contract->start) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('End') ?></th>
                        <td><?= h($contract->end) ?></td>
                     </tr>
                  </table>
               </div>
            </div>
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related Ads') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($contract->ads)): ?>
                     <table class="table table-hover table-striped">
                        <tr>

                           <th scope="col"><?= __('Pic Url') ?></th>
                           <th scope="col"><?= __('Url') ?></th>
                           <th scope="col"><?= __('Active') ?></th>
                           <th scope="col"><?= __('No Follow') ?></th>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contract->ads as $ads): ?>
                           <tr>

                              <td><?= h($ads->pic_url) ?></td>
                              <td><?= h($ads->url) ?></td>
                              <td><?= h($ads->active) ?></td>
                              <td><?= h($ads->no_follow) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </table>
                  <?php endif; ?>
               </div>
            </div>
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related Announces') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($contract->announces)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                           <th scope="col"><?= __('Id') ?></th>
                           <th scope="col"><?= __('Type') ?></th>
                           <th scope="col"><?= __('Status') ?></th>
                           <th scope="col"><?= __('Firstname') ?></th>
                           <th scope="col"><?= __('Title') ?></th>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contract->announces as $announces): ?>
                           <tr>
                              <td><?= h($announces->id) ?></td>
                              <td><?= h($announces->type) ?></td>
                              <td><?= h($announces->status) ?></td>
                              <td><?= h($announces->firstname) ?></td>
                              <td><?= h($announces->title) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Announces', 'action' => 'view', $announces->id]) ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </table>
                  <?php endif; ?>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
