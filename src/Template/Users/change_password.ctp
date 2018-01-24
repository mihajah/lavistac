<div class="row">
   <div class="col-sm-4 col-sm-offset-4">
      <div class="login">
         <?= $this->Flash->render() ?>
         <?= $this->Form->create('User', ['novalidate']) ?>
         <?= $this->Form->input('password', ['required' => true,'class' => 'form-control', 'label'=>__('New Password')]) ?>
         <hr>
         <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']) ?>
         <?= $this->Form->end() ?>
      </div>
   </div>
</div>
