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
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li>
               <?= $this->Html->link('<i class="fa fa-gear"></i> '.__('Check Validity'), ['action' => 'checkValidity'], ['escape'=>false]) ?>
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
               <h2><?= __('Announces')?></h2>
               <table id="bootstrap-table" class="table">
                  <thead>
                     <tr>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"></th>
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($announces as $announce): ?>
                        <tr>
                           <td><span class="label label-<?=$announce->status?>"><?= h($announce->status) ?></span></td>
                           <td><?= $this->Number->format($announce->id) ?></td>
                           <td><?=$this->Image->image(['image'=>$announce->pics[0]->url, 'height'=>'50', 'cropratio'=> "4:3", 'class'=>'img-responsive'])?></td>
                           <td><?= h($announce->title) ?></td>
                           <td><?= $announce->has('user') ? $this->Html->link($announce->user->email, ['controller' => 'Users', 'action' => 'view', $announce->user->id]) : '' ?></td>
                           <td><?= $announce->has('contract') ? $this->Html->link($announce->contract->label, ['controller' => 'Contracts', 'action' => 'view', $announce->contract->id]) : '' ?></td>
                           <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller'=>'Announces','action' => 'view',  $announce->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>

            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <h2><?= __('Ads')?></h2>
               <table id="bootstrap-table" class="table">
                  <thead>
                     <tr>
                        <th scope="col"><?= $this->Paginator->sort('pic_url') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contract_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($ads as $ad): ?>
                        <tr>
                           <td><?=$this->Image->image(['image'=>$ad->pic_url, 'height'=>100, 'class'=>'img-responsive'])?></td>
                           <td><?= h($ad->url) ?></td>
                           <td><?= h($ad->active) ?></td>
                           <td><?= $ad->has('contract') ? $this->Html->link($ad->contract->label, ['controller' => 'Contracts', 'action' => 'view', $ad->contract->id]) : '' ?></td>
                           <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller'=>'ads','action' => 'view',  $ad->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>

            </div>
         </div>
      </div>

   </div>
</div>
