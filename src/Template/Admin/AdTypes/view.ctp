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
         <a class="navbar-brand" href="#">Ad Type - <?=h($adType->name) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $adType->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adType->id)]) ?> </li>
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
                  <h3><?= h($adType->name) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                                                                                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($adType->name) ?></td>
                     </tr>
                                                                                                                                                   <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($adType->id) ?></td>
                     </tr>
                                          <tr>
                        <th scope="row"><?= __('Height') ?></th>
                        <td><?= $this->Number->format($adType->height) ?></td>
                     </tr>
                                          <tr>
                        <th scope="row"><?= __('Width') ?></th>
                        <td><?= $this->Number->format($adType->width) ?></td>
                     </tr>
                                                                                                      </table>
                                 </div>
            </div>
                        <div class="card related">
               <div class="header">
                  <h4><?= __('Related Ads') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($adType->ads)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                                                      <th scope="col"><?= __('Id') ?></th>
                                                      <th scope="col"><?= __('Created') ?></th>
                                                      <th scope="col"><?= __('Modified') ?></th>
                                                      <th scope="col"><?= __('Pic Url') ?></th>
                                                      <th scope="col"><?= __('Url') ?></th>
                                                      <th scope="col"><?= __('Alt') ?></th>
                                                      <th scope="col"><?= __('Active') ?></th>
                                                      <th scope="col"><?= __('No Follow') ?></th>
                                                      <th scope="col"><?= __('Clicked') ?></th>
                                                      <th scope="col"><?= __('Ad Type Id') ?></th>
                                                      <th scope="col"><?= __('Contract Id') ?></th>
                                                      <th scope="col"><?= __('State Id') ?></th>
                                                      <th scope="col"><?= __('Category Id') ?></th>
                                                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($adType->ads as $ads): ?>
                           <tr>
                              <td><?= h($ads->id) ?></td>
                              <td><?= h($ads->created) ?></td>
                              <td><?= h($ads->modified) ?></td>
                              <td><?= h($ads->pic_url) ?></td>
                              <td><?= h($ads->url) ?></td>
                              <td><?= h($ads->alt) ?></td>
                              <td><?= h($ads->active) ?></td>
                              <td><?= h($ads->no_follow) ?></td>
                              <td><?= h($ads->clicked) ?></td>
                              <td><?= h($ads->ad_type_id) ?></td>
                              <td><?= h($ads->contract_id) ?></td>
                              <td><?= h($ads->state_id) ?></td>
                              <td><?= h($ads->category_id) ?></td>
                              <td class="actions">
                                 <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
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
