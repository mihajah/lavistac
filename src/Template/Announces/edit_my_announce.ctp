<div class="row">
   <div class="col-sm-12">
      <div class="content">
         <?= $this->Form->create($announce, ['novalidate']) ?>
         <div class="row">
            <div class="col-sm-8">
               <?php
               echo $this->Form->input('firstname', ['class'=>'form-control']);
               echo $this->Form->input('title', ['class'=>'form-control']);
               echo $this->Form->input('presentation', ['class'=>'form-control']);
               ?>
            </div>
            <div class="col-sm-4">
               <?php
               echo $this->Form->input('phone', ['class'=>'form-control']);
               echo $this->Form->input('out_in', ['class'=>'form-control']);
               echo $this->Form->input('website', ['class'=>'form-control']);
               echo $this->Form->input('state_id', ['options' => $states,  'class'=>'form-control', 'empty'=>'--select--']);
               if($connected['group_id']==4){
                  echo $this->Form->input('cities._ids', ['class'=>'form-control', 'type'=>'select', 'options'=>$cities]);
               }else{
                  echo $this->Form->input('cities._ids', ['class'=>'form-control', 'type'=>'select', 'options'=>$cities, 'multiple'=>"multiple"]);
               }
               ?>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <hr>
               <div class="btn-group  pull-right">
                  <?=$this->Html->link(__('Cancel'), $referer, ['class'=>'btn btn-danger btn-fill'])?>
                  <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']) ?>
               </div>
               <?= $this->Form->end() ?>
            </div>

         </div>
      </div>
   </div>
</div>

<?= $this->element('trumbowyg') ?>
<?= $this->Html->script('front/Announces/add.js',  ['block' => 'scriptBottom'])?>
