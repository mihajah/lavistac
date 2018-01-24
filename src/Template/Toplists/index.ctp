<div class="row">
   <div class="col-sm-12">
      <?= $this->element('breadcrumb', ['urls'=>[
         $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
         $this->Html->link(__('Toplists'), ['controller'=>'Toplists', 'action'=>'index'])
      ]
      ]) ?>
   </div>
</div>
<div class="row">
   <div class="col-sm-8">
      <?php foreach ($toplists as $toplist): ?>
         <a href="<?=$this->Url->build(['controller'=>'Toplists', 'action'=>'out', $toplist->id])?>" class="thumbnail">
            <h3 class="text-center"><?= $toplist->title ?></h3>
            <?=$this->Image->image(['image'=>$toplist->pic_url, 'height'=>'100'], ['class'=>'img-responsive', 'alt'=>$toplist->alt])?>
            <br>
            <p class="text-center"><?= $toplist->description ?></p>
            <p class="pull-right"><span class="label label-danger">IN : <?= $toplist->in ?></span> <span class="label label-success">OUT : <?= $toplist->out ?></span></p>
         </a>
      <?php endforeach; ?>
   </div>
   <div class="col-sm-4">
      <?= $this->cell('Pages::bottom', [$this->request->here])?>
   </div>
</div>
