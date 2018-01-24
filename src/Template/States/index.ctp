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
         <a class="navbar-brand" href="#"><?= __('States') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <?= $this->element('search_index')?>
         <ul class="nav navbar-nav navbar-right">
            <li>
               <?= $this->Html->link('<i class="fa fa-plus"></i> '.__('New'), ['action' => 'add'], ['escape'=>false]) ?>
            </li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <table id="bootstrap-table" class="table">
                  <thead>
                     <tr>
                                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($states as $state): ?>
                        <tr>
                                                               <td><?= $this->Number->format($state->id) ?></td>
                                                                        <td><?= h($state->name) ?></td>
                                                               <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view',  $state->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                              <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit',  $state->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                              <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['action' => 'delete',  $state->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $state->id)]) ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
               <div class="paginator">
                  <ul class="pagination">
                     <?= $this->Paginator->prev('< ' . __('previous')) ?>
                     <?= $this->Paginator->numbers() ?>
                     <?= $this->Paginator->next(__('next') . ' >') ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
