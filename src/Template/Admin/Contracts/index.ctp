<nav class="navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-minimize">
         <button id="minimizeSidebar" class="btn btn-default btn-fill btn-round btn-icon">
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
         <p class="navbar-brand"><?= __('Contracts') ?> <span class="counter"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></span></p>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li>
               <?= $this->Html->link('<i class="fa fa-gear"></i> '.__('Check Validity'), ['action' => 'checkValidity'], ['escape'=>false]) ?>
            </li>
            <li>
               <?= $this->Html->link('<i class="fa fa-plus"></i> '.__('New'), ['action' => 'add'], ['escape'=>false]) ?>
            </li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid">
      <?= $this->element('search_index')?>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <table id="bootstrap-table" class="table">
                  <thead>
                     <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_type_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($contracts as $contract): ?>
                        <tr>
                           <td><?= $this->Number->format($contract->id) ?></td>
                           <td><?= h($contract->created) ?></td>
                           <td><?= h($contract->modified) ?></td>
                           <td><?= h($contract->label) ?></td>
                           <td><?= h($contract->start) ?></td>
                           <td><?= h($contract->end) ?></td>
                           <td><?= $contract->has('contract_type') ? $this->Html->link($contract->contract_type->name, ['controller' => 'ContractTypes', 'action' => 'view', $contract->contract_type->id]) : '' ?></td>
                           <td><?= $contract->has('user') ? $this->Html->link($contract->user->email, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
                           <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view',  $contract->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                              <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit',  $contract->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                              <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['action' => 'delete',  $contract->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $contract->id)]) ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>

            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="paginator">
               <ul class="pagination">
                  <?= $this->Paginator->first('<< ' . __('first')) ?>
                  <?= $this->Paginator->prev('< ' . __('previous')) ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next(__('next') . ' >') ?>
                  <?= $this->Paginator->last(__('last') . ' >>') ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
