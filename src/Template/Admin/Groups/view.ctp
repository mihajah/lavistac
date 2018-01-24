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
         <a class="navbar-brand" href="#">Group - <?=h($group->name) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
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
                  <h3><?= h($group->name) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                                                                                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($group->name) ?></td>
                     </tr>
                                                                                    <tr>
                        <th scope="row"><?= __('Description') ?></th>
                        <td><?= h($group->description) ?></td>
                     </tr>
                                                                                                                                                   <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($group->id) ?></td>
                     </tr>
                                                                                                      </table>
                                 </div>
            </div>
                        <div class="card related">
               <div class="header">
                  <h4><?= __('Related Users') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($group->users)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                                                      <th scope="col"><?= __('Id') ?></th>
                                                      <th scope="col"><?= __('Created') ?></th>
                                                      <th scope="col"><?= __('Email') ?></th>
                                                      <th scope="col"><?= __('Password') ?></th>
                                                      <th scope="col"><?= __('Ip Address') ?></th>
                                                      <th scope="col"><?= __('Group Id') ?></th>
                                                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($group->users as $users): ?>
                           <tr>
                              <td><?= h($users->id) ?></td>
                              <td><?= h($users->created) ?></td>
                              <td><?= h($users->email) ?></td>
                              <td><?= h($users->password) ?></td>
                              <td><?= h($users->ip_address) ?></td>
                              <td><?= h($users->group_id) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
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
