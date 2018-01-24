<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="row">
   <div class="col-sm-12">
      <?= $this->element('breadcrumb', ['urls'=>[
         $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
         $this->Html->link(__('Publier une annonce'), ['controller'=>'Announces', 'action'=>'add'])
      ]
      ]) ?>
   </div>
</div>
<div class="row">
   <div class="col-sm-4">
      <?= $this->cell('Pages::top', [$this->request->here],[
         'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
   </div>
   <div class="col-sm-8">
      <div class="content">
         <?= $this->Form->create($announce, ['novalidate', 'enctype' => 'multipart/form-data']) ?>
         <?php
         echo $this->Form->input('pics.0.url', ['type'=>'file', 'label'=>'Photo']);
         echo $this->Form->input('category_id', ['options' => $categories,  'class'=>'form-control', 'escape'=>false]);
         echo $this->Form->input('title', ['class'=>'form-control']);
         echo $this->Form->input('firstname', ['class'=>'form-control']);
         echo $this->Form->input('email', ['class'=>'form-control']);
         echo $this->Form->input('phone', ['class'=>'form-control']);
         echo $this->Form->input('out_in', [
            'type'=>'select',
            'options'=>[
               'Reçoit'=>'Reçoit',
               'Se déplace'=>'Se déplace',
               'Reçoit et se déplace' => 'Reçoit et se déplace'
            ],
            'class'=>'form-control'
         ]);
         echo $this->Form->input('website', ['class'=>'form-control']);
         echo $this->Form->input('presentation', ['class'=>'form-control']);
         echo $this->Form->input('state_id', ['options' => $states,  'class'=>'form-control', 'empty'=>'--select--']);
         echo $this->Form->input('cities._ids', ['class'=>'form-control', 'type'=>'select', 'options'=>[]]);
         ?>
         <br>
         <div class="g-recaptcha" data-sitekey="6LfQ-hcUAAAAAC7f-EaEmW9VlbICa-MVkheJ4NWJ"></div>
         <hr>
         <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']) ?>
         <?= $this->Form->end() ?>
      </div>

   </div>
</div>
<?= $this->element('trumbowyg_public') ?>
<?= $this->Html->script('front/Announces/add.js',  ['block' => 'scriptBottom'])?>
