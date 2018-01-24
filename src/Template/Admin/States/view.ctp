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
         <a class="navbar-brand" href="#">State - <?=h($state->name) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $state->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
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
                  <h3><?= h($state->name) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                                                                                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($state->name) ?></td>
                     </tr>
                                                                                    <tr>
                        <th scope="row"><?= __('Slug') ?></th>
                        <td><?= h($state->slug) ?></td>
                     </tr>
                                                                                                                                                   <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($state->id) ?></td>
                     </tr>
                                                                                                      </table>
                                 </div>
            </div>
                        <div class="card related">
               <div class="header">
                  <h4><?= __('Related Ads') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($state->ads)): ?>
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
                        <?php foreach ($state->ads as $ads): ?>
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
                        <div class="card related">
               <div class="header">
                  <h4><?= __('Related Announces') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($state->announces)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                                                      <th scope="col"><?= __('Id') ?></th>
                                                      <th scope="col"><?= __('Created') ?></th>
                                                      <th scope="col"><?= __('Modified') ?></th>
                                                      <th scope="col"><?= __('Connected') ?></th>
                                                      <th scope="col"><?= __('Type') ?></th>
                                                      <th scope="col"><?= __('Status') ?></th>
                                                      <th scope="col"><?= __('Firstname') ?></th>
                                                      <th scope="col"><?= __('Label') ?></th>
                                                      <th scope="col"><?= __('Birthday') ?></th>
                                                      <th scope="col"><?= __('Email') ?></th>
                                                      <th scope="col"><?= __('Phone') ?></th>
                                                      <th scope="col"><?= __('Out In') ?></th>
                                                      <th scope="col"><?= __('Website') ?></th>
                                                      <th scope="col"><?= __('Title') ?></th>
                                                      <th scope="col"><?= __('Presentation') ?></th>
                                                      <th scope="col"><?= __('Slug') ?></th>
                                                      <th scope="col"><?= __('User Id') ?></th>
                                                      <th scope="col"><?= __('Contract Id') ?></th>
                                                      <th scope="col"><?= __('State Id') ?></th>
                                                      <th scope="col"><?= __('Category Id') ?></th>
                                                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($state->announces as $announces): ?>
                           <tr>
                              <td><?= h($announces->id) ?></td>
                              <td><?= h($announces->created) ?></td>
                              <td><?= h($announces->modified) ?></td>
                              <td><?= h($announces->connected) ?></td>
                              <td><?= h($announces->type) ?></td>
                              <td><?= h($announces->status) ?></td>
                              <td><?= h($announces->firstname) ?></td>
                              <td><?= h($announces->label) ?></td>
                              <td><?= h($announces->birthday) ?></td>
                              <td><?= h($announces->email) ?></td>
                              <td><?= h($announces->phone) ?></td>
                              <td><?= h($announces->out_in) ?></td>
                              <td><?= h($announces->website) ?></td>
                              <td><?= h($announces->title) ?></td>
                              <td><?= h($announces->presentation) ?></td>
                              <td><?= h($announces->slug) ?></td>
                              <td><?= h($announces->user_id) ?></td>
                              <td><?= h($announces->contract_id) ?></td>
                              <td><?= h($announces->state_id) ?></td>
                              <td><?= h($announces->category_id) ?></td>
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
                  <h4><?= __('Related Cities') ?></h4>
               </div>
               <div class="content">

                  <?php if (!empty($state->cities)): ?>
                     <table class="table table-hover table-striped">
                        <tr>
                                                      <th scope="col"><?= __('Id') ?></th>
                                                      <th scope="col"><?= __('Name') ?></th>
                                                      <th scope="col"><?= __('Slug') ?></th>
                                                      <th scope="col"><?= __('State Id') ?></th>
                                                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($state->cities as $cities): ?>
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
               </div>
            </div>
            
         </div>
      </div>
   </div>
</div>
