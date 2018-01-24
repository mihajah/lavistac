<div class="row">
   <div class="col-sm-6">
      <div class="content">
         <?= $this->Form->create($pic, ['enctype' => 'multipart/form-data']); ?>
         <?php
         echo $this->Form->file('url', ['class'=>'form-control']);
         echo "<br>";
         echo $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']);
         echo $this->Form->end();
         ?>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-sm-6">

   </div>
</div>
