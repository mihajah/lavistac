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
         <p class="navbar-brand"><?= __('Categories') ?> <span class="counter"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></span></p>
      </div>
      <div class="collapse navbar-collapse">
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
                                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($categories as $category): ?>
                        <tr>
                                                               <td><?= $this->Number->format($category->id) ?></td>
                                                                        <td><?= h($category->created) ?></td>
                                                                        <td><?= h($category->modified) ?></td>
                                                                        <td><?= h($category->name) ?></td>
                                                                        <td><?= h($category->slug) ?></td>
                                                                        <td><?= h($category->description) ?></td>
                                                               <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view',  $category->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                              <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit',  $category->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                              <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['action' => 'delete',  $category->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $category->id)]) ?>
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
