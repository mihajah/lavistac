<div class="row">
   <?php if ($announce->type == 'FREE'): ?>
      <?= $this->element('free_announce_view') ?>
   <?php else: ?>
      <?= $this->element('paying_announce_view') ?>
   <?php endif; ?>
   <div class="col-sm-3">
      <div class="annouce_detail_options">
         <h3><span class="label label-<?=$announce->status?>"><?= $announce->status ?></span></h3>
         <dl>
            <dt> <?= __('Created') ?></dt>
            <dd> <?= $announce->created ?></dd>
            <dt> <?= __('Modified') ?></dt>
            <dd> <?= $announce->modified ?></dd>
         </dl>
         <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> '.__('Edit Text'), ['controller' => 'Announces', 'action' => 'editMyAnnounce'], ['class'=>'btn btn-default', 'escape'=>false]) ?>
         <?= $this->Html->link('<i class="fa fa-picture-o" aria-hidden="true"></i> '.__('Edit Pics'), ['controller' => 'Pics', 'action' => 'myPics'], ['class'=>'btn btn-default', 'escape'=>false]) ?>
         <?php if (isset($connected_till)): ?>
            <br>
            <h3><span class="label label-success"><?= __('Connected till : ').$connected_till;?></span></h3>
         <?php else: ?>
            <?= $this->Html->link('<i class="fa fa-bell-o" aria-hidden="true"></i> '.__('Be Online'), ['controller' => 'Announces', 'action' => 'beOnline'], ['class'=>'btn btn-default btn-success', 'escape'=>false]) ?>
         <?php endif; ?>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <?php foreach ($announce->pics as $pic): ?>
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <?=$this->Html->image($pic->url, ['class'=>'img-responsive announce_pic center-block'])?>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>

<?= $this->Html->script("vendor/jquery.watermark.min",  ['block' => 'scriptBottom'])?>
<?= $this->Html->scriptBlock("$('.announce_pic').watermark({
   text: 'LOveSita',
   textWidth: 100,
   gravity: 'l',
   opacity: 1,
   margin: 12
});",  ['block' => 'scriptBottom'])?>
