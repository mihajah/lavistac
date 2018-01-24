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
         <a class="navbar-brand" href="#">Toplist - <?=h($toplist->title) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $toplist->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $toplist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $toplist->id)]) ?> </li>
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
            <a href="<?=$this->Url->build(['controller'=>'Toplists', 'action'=>'out', $toplist->id])?>" class="thumbnail">
               <h3 class="text-center"><?= $toplist->title ?></h3>
               <?=$this->Image->image(['image'=>$toplist->pic_url, 'height'=>'100'], ['class'=>'img-responsive'])?>
               <br>
               <p class="text-center"><?= $toplist->description ?></p>
               <p class="pull-right"><span class="label label-danger">IN : <?= $toplist->in ?></span> <span class="label label-success">OUT : <?= $toplist->out ?></span></p>
            </a>
            <hr>
            <?php foreach ($banners as $banner): ?>
               <div class="card">
                  <div class="content">
                     <div class="row">
                        <div class="col-sm-12">
                           <?=$this->Html->image($banner->pic_url)?>
                           <p class="code">
                              <?=   h($this->Html->link(
                                 $this->Html->image($banner->pic_url, [
                                    "alt" => $banner->title, 'fullBase' => true
                                 ]),
                                 ['controller'=>'toplists', 'action'=>'in', $toplist->id, '_full' => true, 'prefix'=>false ]
                                 ,['escape' => false]))?>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>

            <div class="col-sm-4">
               <div class="card">
                  <div class="header">
                     <h3>Toplist ID <?= h($toplist->id) ?></h3>
                  </div>
                  <div class="content">
                     <table class="table table-striped">
                        <tr>
                           <th scope="row"><?= __('Url') ?></th>
                           <td><?= h($toplist->url) ?></td>
                        </tr>
                        <tr>
                           <th scope="row"><?= __('Status') ?></th>
                           <td><?= h($toplist->status) ?></td>
                        </tr>
                        <tr>
                           <th scope="row"><?= __('User') ?></th>
                           <td><?= $toplist->has('user') ? $this->Html->link($toplist->user->id, ['controller' => 'Users', 'action' => 'view', $toplist->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                           <th scope="row"><?= __('Created') ?></th>
                           <td><?= h($toplist->created) ?></td>
                        </tr>
                        <tr>
                           <th scope="row"><?= __('Modified') ?></th>
                           <td><?= h($toplist->modified) ?></td>
                        </tr>
                        <tr>
                           <th scope="row"><?= __('No Follow') ?></th>
                           <td><?= $toplist->no_follow ? __('Yes') : __('No'); ?></td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
