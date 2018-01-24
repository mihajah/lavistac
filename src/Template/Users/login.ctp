<div class="row">
   <div class="col-sm-6">
      <?= $this->cell('Pages::top', [$this->request->here],[
         'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
   </div>
   <div class="col-sm-6">
      <div class="login">
         <?= $this->Flash->render() ?>
         <?= $this->Form->create('User', ['novalidate']) ?>
         <?= $this->Form->input('email', ['required' => true,'class' => 'form-control']) ?>
         <?= $this->Form->input('password', ['required' => true,'class' => 'form-control']) ?>
         <?=$this->Html->link(__('Forgot your password'), ['controller'=>'Users', 'action'=>'recover'])?>
         <hr>
         <?= $this->Form->button(__('Connexion'), ['class'=>'btn btn-info btn-fill']) ?>
         <?= $this->Form->end() ?>
      </div>
   </div>
</div>
