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
         <a class="navbar-brand" href="#">Ad - <?=h($ad->id) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $ad->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?> </li>
            <li><?= $this->Html->link(__('New'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8">
            <?=$this->Html->image($ad->pic_url, ['class'=>'img-responsive'])?>
         </div>
         <div class="col-md-4">
            <div class="card">
               <div class="header">
                  <h3><?= h($ad->id) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                     <tr>
                        <th scope="row"><?= __('Pic Url') ?></th>
                        <td><?= h($ad->pic_url) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Url') ?></th>
                        <td><?= h($ad->url) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Alt') ?></th>
                        <td><?= h($ad->alt) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Ad Type') ?></th>
                        <td><?= $ad->has('ad_type') ? $this->Html->link($ad->ad_type->name, ['controller' => 'AdTypes', 'action' => 'view', $ad->ad_type->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Contract') ?></th>
                        <td><?= $ad->has('contract') ? $this->Html->link($ad->contract->label, ['controller' => 'Contracts', 'action' => 'view', $ad->contract->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('State') ?></th>
                        <td><?= $ad->has('state') ? $this->Html->link($ad->state->name, ['controller' => 'States', 'action' => 'view', $ad->state->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Category') ?></th>
                        <td><?= $ad->has('category') ? $this->Html->link($ad->category->name, ['controller' => 'Categories', 'action' => 'view', $ad->category->id]) : '' ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($ad->id) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Clicked') ?></th>
                        <td><?= $this->Number->format($ad->clicked) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($ad->created) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($ad->modified) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Active') ?></th>
                        <td><?= $ad->active ? __('Yes') : __('No'); ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('No Follow') ?></th>
                        <td><?= $ad->no_follow ? __('Yes') : __('No'); ?></td>
                     </tr>
                  </table>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
