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
         <a class="navbar-brand" href="#">Contract Type - <?=h($contractType->name) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $contractType->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contractType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractType->id)]) ?> </li>
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
                  <h3><?= h($contractType->name) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                                                                                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($contractType->name) ?></td>
                     </tr>
                                                                                                                                                   <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($contractType->id) ?></td>
                     </tr>
                                                                                                      </table>
                                                      <div class="row">
                     <div class="col-sm-12">
                        <h4><?= __('Description') ?></h4>
                        <?= $this->Text->autoParagraph(h($contractType->description)); ?>
                     </div>
                  </div>
                                                   </div>
            </div>
                        <div class="card related">
               <div class="header">
                  <h4><?= __('Related Contracts') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($contractType->contracts)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                                                      <th scope="col"><?= __('Id') ?></th>
                                                      <th scope="col"><?= __('Label') ?></th>
                                                      <th scope="col"><?= __('Start') ?></th>
                                                      <th scope="col"><?= __('End') ?></th>
                                                      <th scope="col"><?= __('Contract Type Id') ?></th>
                                                      <th scope="col"><?= __('User Id') ?></th>
                                                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contractType->contracts as $contracts): ?>
                           <tr>
                              <td><?= h($contracts->id) ?></td>
                              <td><?= h($contracts->label) ?></td>
                              <td><?= h($contracts->start) ?></td>
                              <td><?= h($contracts->end) ?></td>
                              <td><?= h($contracts->contract_type_id) ?></td>
                              <td><?= h($contracts->user_id) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?>
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
