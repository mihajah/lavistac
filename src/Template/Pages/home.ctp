<?=$this->cell('Banners::header')?>
<div class="row">
   <div class="col-sm-12 hidden-sm hidden-md hidden-lg visible-xs">
      <div class="btn-group">
            <?= $this->Html->link(__('Libertines'), ['controller'=>'Announces', 'action'=>'index', 'escort-girl-paris'], ['class'=>"btn btn-danger"])?>
            <?= $this->Html->link(__('Libertins'), ['controller'=>'Announces', 'action'=>'index', 'escort-gay-hetero'], ['class'=>"btn btn-danger"])?>
            <?= $this->Html->link(__('BDSM'), ['controller'=>'Announces', 'action'=>'index', 'bdsm'], ['class'=>"btn btn-danger"])?>
            <?= $this->Html->link(__('Transgenres'), ['controller'=>'Announces', 'action'=>'index', 'escort-trans-paris'], ['class'=>"btn btn-danger"])?>

      </div>
      <br><br>
   </div>
   <div class="col-sm-2 hidden-xs">
      <?=$this->cell('Banners::home')?>

   </div>
   <div class="col-sm-8">
      <?= $this->cell('Pages::top', [$this->request->here],[
         'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
   </div>
   <div class="col-sm-2  hidden-xs">
      <?=$this->cell('Banners::home',['right'=>true])?>
   </div>
</div>
