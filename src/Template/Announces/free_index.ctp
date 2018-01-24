<div class="row">
   <div class="col-sm-12">
      <?= $this->element('breadcrumb', ['urls'=>[
         $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
         $this->Html->link(__('Annonces gratuites'), ['controller'=>'Announces', 'action'=>'freeIndex'])
      ]
      ]) ?>
   </div>
</div>
<?=$this->cell('Banners::header')?>

<div class="row">
   <div class="col-sm-2 hidden-xs">
      <?php  //echo $this->cell('Banners::vista_missives', ['right'=>false, 'limitR' => 16, 'limitL' => 23]); ?>
      <?=  $this->cell('Banners::vista_missives', ['right'=>false]); ?>
   </div>
   <div class="col-sm-8">
      <div class="row">
         <?php $i=1 ?>
         <?php foreach ($announces as $announce): ?>
            <div class="col-sm-6">
               <a href="<?= $this->Url->build(['action' => 'freeView', $announce->slug])?>">
                  <div class="media">
                     <div class="media-left">
                        <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'60', 'cropratio' => '4:6','class'=>'media-object'])?>
                     </div>
                     <div class="media-body">
                        <?php echo $this->Text->truncate($announce['title'], 40); ?>
                        <br>

                        <?php echo $this->Text->truncate($announce['firstname'], 40); ?>
                        <br>
                        <span class="label label-default"><?php echo $this->Text->truncate($announce->state->name, 55); ?></span>
                     </div>
                  </div>
               </a>
            </div>
            <?php $i++ ?>
            <?php if ($i % 2): ?>
               <div class="clearfix"></div>
            <?php endif; ?>
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
               <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-2 hidden-xs">
      <?php //echo  $this->cell('Banners::vista_missives', ['right'=>true, 'limitR' => 8]); ?>
      <?=  $this->cell('Banners::vista_missives', ['right'=>true]); ?>
   </div>
</div>
<div class="row hidden-xs">
   <div class="col-sm-12">
      <?= $this->cell('Pages::bottom', [$this->request->here]);?>
   </div>
</div>
