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
         <a class="navbar-brand" href="#"><?= __('Metas') ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
                        <li><?= $this->Form->postLink(
               __('Delete'),
               ['action' => 'delete', $meta->id],
               ['confirm' => __('Are you sure you want to delete # {0}?', $meta->id)]
               )?>
            </li>
                        <li><?= $this->Html->link(__('List Metas'), ['action' => 'index']) ?></li>
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
                  <h4 class="title"><?= __('Edit Meta') ?></h4>
               </div>
               <div class="content">
                  <div class="row">
                     <div class="col-sm-12">
                        <?= $this->Form->create($meta, ['novalidate']) ?>
                        <?php
                                                         echo $this->Form->input('content', ['class'=>'form-control']);
                                                                  echo $this->Form->input('url', ['class'=>'form-control']);
                                                                     echo $this->Form->input('meta_type_id', ['options' => $metaTypes,  'class'=>'form-control']);
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