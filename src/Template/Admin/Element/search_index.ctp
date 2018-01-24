<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="content">
            <?= $this->Form->create('Search', ['novalidate', 'class'=>'', 'role'=>'search']) ?>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-search"></i></span>
               <?= $this->Form->input('q', ['class'=>'form-control', 'placeholder'=>__('Search...'), 'label'=>false]) ?>
            </div>
            <?=$this->Form->end()?>
         </div>
      </div>
   </div>
</div>
