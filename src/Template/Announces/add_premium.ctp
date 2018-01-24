<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="row content">
   <div class="">
      <?= $this->Form->create($announce, ['novalidate', 'enctype' => 'multipart/form-data']) ?>
      <div class="col-sm-8">
         <?php
         echo $this->Form->input('firstname', ['class'=>'form-control']);
         echo $this->Form->input('title', ['class'=>'form-control']);
         echo $this->Form->input('presentation', ['class'=>'form-control']);
         ?>
      </div>
      <div class="col-sm-4">
         <?php
         echo $this->Form->input('pics.0.url', ['type'=>'file', 'label'=>'Photo']);
         echo $this->Form->input('pics.1.url', ['type'=>'file', 'label'=>'Photo']);
         echo $this->Form->input('pics.2.url', ['type'=>'file', 'label'=>'Photo']);
         echo $this->Form->input('pics.3.url', ['type'=>'file', 'label'=>'Photo']);
         echo $this->Form->input('category_id', ['options' => $categories,  'class'=>'form-control']);
         echo $this->Form->input('email', ['class'=>'form-control']);
         echo $this->Form->input('phone', ['class'=>'form-control']);
         echo $this->Form->input('out-in', [
            'type'=>'select',
            'options'=>[
               'Reçoit'=>'Reçoit',
               'Se déplace'=>'Se déplace',
               'Reçoit et se déplace' => 'Reçoit et se déplace'
            ],
            'class'=>'form-control'
         ]);          
         echo $this->Form->input('website', ['class'=>'form-control']);
         echo $this->Form->input('state_id', ['options' => $states,  'class'=>'form-control']);
         echo $this->Form->input('cities._ids', ['options' => $cities, 'class'=>'form-control', 'type'=>'select']);
         ?>
         <br>
         <div class="g-recaptcha" data-sitekey="6LfQ-hcUAAAAAC7f-EaEmW9VlbICa-MVkheJ4NWJ"></div>
         <hr>
         <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']) ?>
      </div>
      <?= $this->Form->end() ?>
   </div>
</div>
<?= $this->element('trumbowyg') ?>
