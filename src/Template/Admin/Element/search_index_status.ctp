<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="content">
            <form class="form-inline">
               <div class="form-group">
                  <?= $this->Form->input('q', ['class'=>'form-control', 'placeholder'=>__('Search...'), 'label'=>false]) ?>
               </div>
               <div class="form-group">
                  <?= $this->Form->input('status', ['class'=>'form-control', 'type'=>'select', 'options'=>['NEW'=>'NEW', 'WAITING'=>'WAITING', 'EXPIRED'=>'EXPIRED', 'ONLINE'=>'ONLINE', 'ARCHIVED'=>'ARCHIVED', 'REFUSED'=>'REFUSED'], 'label'=>false, 'empty'=>'--status--']) ?>
               </div>

               <button type="submit" class="btn btn-default">Search</button>
            </form>
         </div>
      </div>
   </div>
</div>
