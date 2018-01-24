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
         <a class="navbar-brand" href="#">City - <?=h($city->name) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $city->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
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
                  <h3><?= h($city->name) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                     <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($city->name) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Slug') ?></th>
                        <td><?= h($city->slug) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('State') ?></th>
                        <td><?= $city->has('state') ? $this->Html->link($city->state->name, ['controller' => 'States', 'action' => 'view', $city->state->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($city->id) ?></td>
                     </tr>
                  </table>
               </div>
            </div>
            <div class="card related">
               <div class="header">
                  <h4><?= __('Related Announces') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($city->announces)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                           <th scope="col"><?= __('Title') ?></th>
                           <th scope="col"><?= __('Slug') ?></th>
                           <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($city->announces as $announces): ?>
                           <tr>
                              <td><?= h($announces->title) ?></td>
                              <td><?= h($announces->slug) ?></td>
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
