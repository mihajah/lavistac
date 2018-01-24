<div class="row">
   <?php foreach ($pics as $pic): ?>
      <div class="col-sm-3">
         <div class="thumbnail">
            <?=$this->Image->image(['image'=>$pic->url, 'width'=>'200', 'class'=>'img-responsive'])?>
            <p>
               <br>
               <div class="btn-group btn-group-sm">
                  <?= $this->Html->link('<i class="fa fa-repeat" aria-hidden="true"></i> '.__('Replace'), ['controller'=>'Pics','action' => 'replace',  $pic->id], ['class'=>'btn btn-primary btn-sm', 'escape' => false]) ?>
                 <?= $this->Form->postLink( '<i class="fa fa-trash" aria-hidden="true"></i> '.__('Delete') , ['controller'=>'Pics','action' => 'delete',  $pic->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false,'confirm' => __('Are you sure you want to delete # {0}?',  $pic->id)]) ?>
               </div>

            </p>
         </div>
      </div>
   <?php endforeach; ?>
   <?php if($pics->count() < 4): ?>
      <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> '.__('Add Pic'), ['controller'=>'Pics', 'action'=>'add', $pic->announce_id], ['class'=>'btn btn-success', 'escape'=>false]) ?>
   <?php endif;?>
</div>
<hr>
<div class="row">
   <div class="col-sm-12">
      <?= $this->Html->link('<i class="fa fa-chevron-left" aria-hidden="true"></i> '.__('Back'), ['controller'=>'Announces', 'action'=>'myAnnounce'], ['class'=>'btn btn-default btn-sm', 'escape'=>false]) ?>
   </div>

</div>
