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
         <a class="navbar-brand" href="#"><?= __('Toplists') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('List Toplists'), ['action' => 'index']) ?></li>
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
                  <h4 class="title"><?= __('Add Toplist') ?></h4>
               </div>
               <div class="content">
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->create($toplist, ['novalidate', 'type'=>'file']) ?>
                        <?php
                        echo $this->Form->input('pic_url', ['class'=>'form-control', 'type'=>'file']);
                        echo $this->Form->input('url', ['class'=>'form-control']);
                        echo $this->Form->input('title', ['class'=>'form-control']);
                        echo $this->Form->input('description', ['class'=>'form-control']);
                        echo $this->Form->input('status', [
                           'type'=>'select',
                           'options'=>[

                              'ONLINE'=>'ONLINE',
                              'OFFLINE' => 'OFFLINE'
                           ],
                           'class'=>'form-control'
                        ]);
                        echo $this->Form->input('no_follow', ['class'=>'form-control']);
                        echo $this->Form->input('in', ['class'=>'form-control']);
                        echo $this->Form->input('out', ['class'=>'form-control']);
                        echo $this->Form->input('user_id', ['class'=>'form-control', 'empty'=>'--commencer à taper--']);
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
<?=$this->Html->script('admin/getUsers', ['block'=>'scriptBottom'])?>
