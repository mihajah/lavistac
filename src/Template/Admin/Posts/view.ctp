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
         <a class="navbar-brand" href="#">Post - <?=h($post->title) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
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
            <div class="card">
               <div class="header">
                  <h3><?= h($post->title) ?></h3>
               </div>
               <div class="content">
                  <div class="row">
                     <div class="col-sm-12">
                        <?=$this->Html->image($post->img, ['class'=>'img-responsive center-block'])?>
                        <h4><?= $this->Text->autoParagraph(h($post->subtitle)); ?></h4>
                        <?= $post->body; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="card">
               <div class="header">
                  <h4>Post n° <?= $this->Number->format($post->id) ?></h4>
               </div>
               <div class="content">
                  <table class="table table-striped">
                     <tr>
                        <th scope="row"><?= __('Img Alt') ?></th>
                        <td><?= h($post->alt) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($post->created) ?></td>
                     </tr>
                     <tr>
                        <th scope="row"><?= __('Active') ?></th>
                        <td><?= $post->active ? __('Yes') : __('No'); ?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
