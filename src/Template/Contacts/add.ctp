<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="row">
   <div class="col-sm-6">
      <?= $this->cell('Pages::top', [$this->request->here],[
         'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
   </div>
   <div class="col-sm-6">
      <div class="content">
         <?php
         echo $this->Form->create($contact, ['novalidate']);
         echo $this->Form->input('firstname', ['class'=>'form-control']);
         echo $this->Form->input('email', ['class'=>'form-control']);
         echo $this->Form->input('message', ['class'=>'form-control']);
         ?>
         <br>
         <div class="g-recaptcha" data-sitekey="6LfQ-hcUAAAAAC7f-EaEmW9VlbICa-MVkheJ4NWJ"></div>
         <hr>
         <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-info btn-fill']) ?>
         <?= $this->Form->end() ?>
      </div>
   </div>
</div>
