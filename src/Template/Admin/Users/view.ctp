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
         <a class="navbar-brand" href="#">User - <?=h($user->id) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
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
                  <h3><?= h($user->email) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                     <tr>
                        <th scope="row"><?= __('Active') ?></th>
                        <td><?= $user->active ? __('Yes') : __('No'); ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Password') ?></th>
                        <td><?= h($user->password) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Ip Address') ?></th>
                        <td><?= h($user->ip_address) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Group') ?></th>
                        <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                     </tr>
                  </table>
               </div>
            </div>
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related Announces') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($user->announces)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                           <th scope="col"><?= __('Id') ?></th>
                           <th scope="col"><?= __('Created') ?></th>
                           <th scope="col"><?= __('Modified') ?></th>

                           <th scope="col"><?= __('Type') ?></th>
                           <th scope="col"><?= __('Status') ?></th>
                           <th scope="col"><?= __('Title') ?></th>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->announces as $announces): ?>
                           <tr>
                              <td><?= h($announces->id) ?></td>
                              <td><?= h($announces->created) ?></td>
                              <td><?= h($announces->modified) ?></td>
                              <td><?= h($announces->type) ?></td>
                              <td><?= h($announces->status) ?></td>

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
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related Contracts') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($user->contracts)): ?>
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
                        <?php foreach ($user->contracts as $contracts): ?>
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
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related Toplists') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($user->toplists)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                           <th scope="col"><?= __('Id') ?></th>
                           <th scope="col"><?= __('Created') ?></th>
                           <th scope="col"><?= __('Modified') ?></th>
                           <th scope="col"><?= __('Pic Url') ?></th>
                           <th scope="col"><?= __('Url') ?></th>
                           <th scope="col"><?= __('Title') ?></th>
                           <th scope="col"><?= __('Description') ?></th>
                           <th scope="col"><?= __('Status') ?></th>
                           <th scope="col"><?= __('No Follow') ?></th>
                           <th scope="col"><?= __('In') ?></th>
                           <th scope="col"><?= __('Out') ?></th>
                           <th scope="col"><?= __('User Id') ?></th>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->toplists as $toplists): ?>
                           <tr>
                              <td><?= h($toplists->id) ?></td>
                              <td><?= h($toplists->created) ?></td>
                              <td><?= h($toplists->modified) ?></td>
                              <td><?= h($toplists->pic_url) ?></td>
                              <td><?= h($toplists->url) ?></td>
                              <td><?= h($toplists->title) ?></td>
                              <td><?= h($toplists->description) ?></td>
                              <td><?= h($toplists->status) ?></td>
                              <td><?= h($toplists->no_follow) ?></td>
                              <td><?= h($toplists->in) ?></td>
                              <td><?= h($toplists->out) ?></td>
                              <td><?= h($toplists->user_id) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Toplists', 'action' => 'view', $toplists->id]) ?>
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
