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
         <a class="navbar-brand" href="#">Meta - <?=h($meta->id) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $meta->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meta->id)]) ?> </li>
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
                  <h3><?= h($meta->id) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                                                                                    <tr>
                        <th scope="row"><?= __('Url') ?></th>
                        <td><?= h($meta->url) ?></td>
                     </tr>
                                                                                    <tr>
                        <th scope="row"><?= __('Meta Type') ?></th>
                        <td><?= $meta->has('meta_type') ? $this->Html->link($meta->meta_type->name, ['controller' => 'MetaTypes', 'action' => 'view', $meta->meta_type->id]) : '' ?></td>
                     </tr>
                                                                                                                                                   <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($meta->id) ?></td>
                     </tr>
                                                                                                      </table>
                                                      <div class="row">
                     <div class="col-sm-12">
                        <h4><?= __('Content') ?></h4>
                        <?= $this->Text->autoParagraph(h($meta->content)); ?>
                     </div>
                  </div>
                                                   </div>
            </div>
            
         </div>
      </div>
   </div>
</div>
