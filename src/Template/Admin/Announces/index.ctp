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
         <p class="navbar-brand"><?= __('Announces')." ".$this->request->params['pass'][0]?> <span class="counter"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></span></p>
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
      <?= $this->element('search_index_status')?>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <table id="bootstrap-table" class="table">
                  <thead>
                     <tr>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"></th>
                        <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($announces as $announce): ?>
                        <tr>
                           <td><span class="label label-<?=$announce->status?>"><?= h($announce->status) ?></span></td>
                           <td><?= $this->Number->format($announce->id) ?></td>
                           <td><?=$this->Image->image(['image'=>$announce->pics[0]->url, 'height'=>'50', 'cropratio'=> "4:3", 'class'=>'img-responsive'])?></td>
                           <td><?= h($announce->firstname) ?></td>
                           <td><?= h($announce->title) ?></td>
                           <td><?= $announce->has('user') ? $this->Html->link($announce->user->email, ['controller' => 'Users', 'action' => 'view', $announce->user->id]) : '' ?></td>
                           <td><?= $announce->has('contract') ? $this->Html->link($announce->contract->label, ['controller' => 'Contracts', 'action' => 'view', $announce->contract->id]) : '' ?></td>
                           <td><?= $announce->has('state') ? $this->Html->link($announce->state->name, ['controller' => 'States', 'action' => 'view', $announce->state->id]) : '' ?></td>
                           <td><?= h($announce->slug) ?></td>
                           <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-magic"></i>', ['controller'=>'Contracts','action' => 'management',  $announce->id],['class' => 'btn btn-simple btn-danger btn-icon manage','escape' => false]) ?>
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view',  $announce->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                              <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['action' => 'delete',  $announce->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $announce->id)]) ?>

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
