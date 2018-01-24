<div class="row">
   <div class="col-sm-6 col-sm-offset-3">
      <div class="login">
         <legend> <?= __('Enter your email and we send you a new password') ?></legend>
         <?= $this->Flash->render() ?>
         <?= $this->Form->create('User', ['novalidate']) ?>
         <?= $this->Form->input('email', ['required' => true,'class' => 'form-control', 'label'=>__('Your email')]) ?>
         <hr>
         <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']) ?>
         <?= $this->Form->end() ?>
      </div>
   </div>
</div>
