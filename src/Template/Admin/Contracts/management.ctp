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
         <a class="navbar-brand" href="#"><?= __('Contracts') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Back'), $referer) ?></li>
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
                  <h4 class="title"><?= __('Management') ?></h4>
               </div>
               <div class="content">
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->create($contract, ['novalidate']) ?>
                        <?php
                        echo $this->Form->input('active', ['class'=>'form-control', 'default'=>1]);
                        echo $this->Form->input('start', ['class'=>'form-control']);
                        echo $this->Form->input('end', ['class'=>'form-control']);
                        echo $this->Form->input('contract_type_id', ['options' => $contractTypes,  'class'=>'form-control']);
                        echo $this->Form->input('announce_status', [
                           'type'=>'select',
                           'options'=>[
                              'ONLINE'=>'ONLINE',
                              'WAITING' => 'WAITING',
                              'EXPIRED'=>'EXPIRED',
                              'REFUSED' => 'REFUSED',
                              'ARCHIVED' => 'ARCHIVED'
                           ],
                           'empty'=>'--select--',
                           'class'=>'form-control'
                        ]);
                        echo $this->Form->input('ads_active', ['class'=>'form-control', 'type'=>'checkbox']);
                        echo $this->Form->input('user_id', ['options' => $users,  'class'=>'form-control']);
                        echo $this->Form->input('notification_id', ['class'=>'form-control', 'empty'=>'--select--']);
                        ?>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill pull-right']) ?>
                        <?= $this->Form->end() ?>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>