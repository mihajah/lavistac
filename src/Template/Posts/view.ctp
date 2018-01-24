<div class="row">
   <div class="col-sm-12">
      <?= $this->element('breadcrumb', ['urls'=>[
         $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
         $this->Html->link(__('Post-libres'), ['controller'=>'Posts', 'action'=>'index']),
         $this->Html->link($this->Text->truncate($post->title, 80, array('ellipsis' => '...', 'exact' => false)), ['controller'=>'Posts', 'action'=>'view', $post->slug])
      ]
      ]) ?>
   </div>
</div>
<div class="row">
   <div class="col-sm-12">
         <?=  $this->cell('Banners::header'); ?>
   </div>
   <div class="col-sm-2 hidden-xs">
      <?=  $this->cell('Banners::vista', [false]); ?>
   </div>
   <div class="col-sm-6 col-sm-offset-1 annouce_detail">
      <h1 class="text-center"><?= h($post->title) ?></h1>
      <?=$this->Html->image($post->img, ['class'=>'img-responsive announce_pic center-block', "data-toggle"=>"modal", "data-target"=>"#photos"])?>
      <h2><?= $this->Text->autoParagraph(h($post->subtitle)); ?></h2>
      <?=$post->body?>
   </div>
   <div class="col-sm-2 col-sm-offset-1  hidden-xs">
      <?=  $this->cell('Banners::vista', [true]); ?>
   </div>
</div>
