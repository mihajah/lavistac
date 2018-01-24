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
         <p class="navbar-brand"><?= __('Pics') ?> <span class="counter"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></span></p>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li>
               <?= $this->Html->link('<i class="fa fa-plus"></i> '.__('New'), ['action' => 'add'], ['escape'=>false]) ?>
            </li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid" >
      <?= $this->element('search_index')?>
      <div class="row" id="isotope">
         <?php foreach ($pics as $pic): ?>
            <div class="col-sm-2">
               <div class="thumbnail">
                  <p> <?= $pic->announce->title ?></p>
                  <?=$this->Image->image(['image'=>$pic->url, 'height'=>'100', 'class'=>'img-responsive'])?>
                  <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view',  $pic->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                  <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit',  $pic->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                  <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['action' => 'delete',  $pic->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $pic->id)]) ?>
               </div>
            </div>

         <?php endforeach; ?>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="paginator">
               <ul class="pagination">
                  <?= $this->Paginator->first('<< ' . __('first')) ?>
                  <?= $this->Paginator->prev('< ' . __('previous')) ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next(__('next') . ' >') ?>
                  <?= $this->Paginator->last(__('last') . ' >>') ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<?=$this->Html->script('admin/Pics/index', ['block'=>'scriptBottom'])?>
