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
         <a class="navbar-brand" href="#">Announce - <?=h($announce->title) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Management'), ['controller'=>'contracts','action' => 'management', $announce->id]) ?></li>
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $announce->id]) ?> </li>
            <li><?= $this->Html->link(__('Archived'), ['action' => 'archived', $announce->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announce->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announce->id)]) ?> </li>
            <li><?= $this->Html->link(__('New'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid">
      <div class="row">
               <?php if ($announce->type == 'FREE'): ?>
                  <?= $this->element('free_announce_view') ?>
               <?php else: ?>
               <?= $this->element('paying_announce_view') ?>
               <?php endif; ?>

         <div class="col-sm-6">
            <div class="card">
               <div class="header">
                  <h4><?= __('Announce n° '.$announce->id)?></h4>
               </div>
               <div class="content">
                  <table class="table table-striped">
                     <tr>
                        <th scope="row"><?= __('Type') ?></th>
                        <td>
                           <?= h($announce->type) ?>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Status') ?></th>
                        <td>
                           <?= h($announce->status) ?>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Connected') ?></th>
                        <td><?= h($announce->connected) ?>
                           <?php if ($announce->contract->contract_type_id == 8): ?>
                              <?= $this->Html->link('Be Online', ['controller'=>'Announces','action' => 'beOnline',  $announce->id],['class' => 'btn btn-success btn-sm btn-fill','escape' => false]) ?>
                           <?php endif; ?>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Firstname') ?></th>
                        <td><?= h($announce->firstname) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($announce->email) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Phone') ?></th>
                        <td><?= h($announce->phone) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Out In') ?></th>
                        <td><?= h($announce->out_in) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Website') ?></th>
                        <td><?= h($announce->website) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Title') ?></th>
                        <td><?= h($announce->title) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Slug') ?></th>
                        <td><?= h($announce->slug) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('User') ?></th>
                        <td><?= $announce->has('user') ? $this->Html->link($announce->user->email, ['controller' => 'Users', 'action' => 'view', $announce->user->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Contract') ?></th>
                        <td><?= $announce->has('contract') ? $this->Html->link($announce->contract->label, ['controller' => 'Contracts', 'action' => 'view', $announce->contract->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('State') ?></th>
                        <td><?= $announce->has('state') ? $this->Html->link($announce->state->name, ['controller' => 'States', 'action' => 'view', $announce->state->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Category') ?></th>
                        <td><?= $announce->has('category') ? $this->Html->link($announce->category->name, ['controller' => 'Categories', 'action' => 'view', $announce->category->id], ['escape'=>false]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($announce->id) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($announce->created) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($announce->modified) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Birthday') ?></th>
                        <td><?= h($announce->birthday) ?></td>
                     </tr>
                  </table>

                  <h4><?= __('Related Cities') ?></h4>

                  <?php if (!empty($announce->cities)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                           <th scope="col"><?= __('Id') ?></th>
                           <th scope="col"><?= __('Name') ?></th>
                           <th scope="col"><?= __('Slug') ?></th>
                           <th scope="col"><?= __('State Id') ?></th>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($announce->cities as $cities): ?>
                           <tr>
                              <td><?= h($cities->id) ?></td>
                              <td><?= h($cities->name) ?></td>
                              <td><?= h($cities->slug) ?></td>
                              <td><?= h($cities->state_id) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </table>
                  <?php endif; ?>

                  <h4><?= __('Related Pics') ?></h4>

                  <?php if (!empty($announce->pics)): ?>
                     <div class="row">
                        <?php foreach ($announce->pics as $pic): ?>
                           <div class="col-sm-3">
                              <div class="thumbnail">
                                 <?=$this->Image->image(['image'=>$pic->url, 'height'=>'100', 'class'=>'img-responsive'])?>
                                 <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Pics','action' => 'view',  $pic->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                                 <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Pics','action' => 'editToAnnounce',  $pic->id, $announce->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                                 <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Pics','action' => 'deleteToAnnounce',  $pic->id, $announce->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $pic->id)]) ?>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <?php foreach ($announce->pics as $pic): ?>
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <?=$this->Html->image($pic->url, ['class'=>'img-responsive announce_pic center-block'])?>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
