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
         <a class="navbar-brand" href="#"><?= __('Partners') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
                        <li><?= $this->Html->link(__('List Partners'), ['action' => 'index']) ?></li>
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
                  <h4 class="title"><?= __('Add Partner') ?></h4>
               </div>
               <div class="content">
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->create($partner, ['novalidate']) ?>
                        <?php
                                                         echo $this->Form->input('position', ['class'=>'form-control']);
                                                                  echo $this->Form->input('title', ['class'=>'form-control']);
                                                                  echo $this->Form->input('banner', ['class'=>'form-control']);
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