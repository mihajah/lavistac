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
         <a class="navbar-brand" href="#"><?= __('Announces') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('List Announces'), ['action' => 'index']) ?></li>
         </ul>
      </div>
   </div>
</nav>

<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="header">
                  <h4 class="title"><?= __('Add Announce') ?></h4>
               </div>
               <div class="content">
                  <div class="row">
                     <?= $this->Form->create($announce, ['novalidate', 'type'=>'file']) ?>
                     <div class="col-sm-8">
                        <?php

                        echo $this->Form->input('firstname', ['class'=>'form-control']);

                        echo $this->Form->input('email', ['class'=>'form-control']);
                        echo $this->Form->input('phone', ['class'=>'form-control']);
                        echo $this->Form->input('out_in', [
                           'type'=>'select',
                           'options'=>[
                              'Reçoit'=>'Reçoit',
                              'Se déplace'=>'Se déplace',
                              'Reçoit et se déplace' => 'Reçoit et se déplace'
                           ],
                           'class'=>'form-control'
                        ]);
                        echo $this->Form->input('website', ['class'=>'form-control']);
                        echo $this->Form->input('title', ['class'=>'form-control']);
                        echo $this->Form->input('presentation', ['class'=>'form-control']);

                        ?>
                     </div>
                     <div class="col-sm-4">
                        <?php
                        echo $this->Form->input('type', [
                           'type'=>'select',
                           'options'=>[
                              ''=>'--select--',
                              'FREE'=>'FREE',
                              'PAYING' => 'PAYING'
                           ],
                           'class'=>'form-control'
                        ]);
                        echo $this->Form->input('status', [
                           'type'=>'select',
                           'options'=>[
                              'ONLINE'=>'ONLINE',
                              'WAITING' => 'WAITING',
                              'EXPIRED'=>'EXPIRED',
                              'REFUSED' => 'REFUSED',
                              'ARCHIVED' => 'ARCHIVED'
                           ],
                           'class'=>'form-control'
                        ]);
                        echo $this->Form->input('category_id', ['options' => $categories,  'class'=>'form-control', 'escape'=>false]);

                        echo $this->Form->input('slug', ['class'=>'form-control']);
                        if(is_null($contract_id)){
                           echo $this->Form->input('user_id', ['class'=>'form-control', 'empty'=>'--commencer à taper--']);
                           echo $this->Form->input('contract_id', ['class'=>'form-control', 'empty'=>'--commencer à taper--']);
                        }
                        echo $this->Form->input('state_id', ['options' => $states,  'class'=>'form-control', 'empty'=>"--select--"]);
                        echo $this->Form->input('cities._ids', ['class'=>'form-control', 'multiple'=>"multiple"]);
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
<?= $this->element('trumbowyg') ?>
<?=$this->Html->script('admin/Announces/add_edit', ['block'=>'scriptBottom'])?>
