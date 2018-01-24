<form class="form-inline">
   <div class="form-group">
      <?= $this->Form->input('keyword', [
         'class'=>'form-control',
         'placeholder'=>'Mot clé',
         'label'=>false
      ]);?>
   </div>
   <div class="form-group">
      <?= $this->Form->input('state_id', [
         'options' => $states,
         'class'=>'form-control',
         'default'=>$this->request->params['state_slug'] ?? '',
         'empty'=>'-- Arrondissements - Périphérie --',
         'label'=>false,
         'onchange'=>"reloadIndex(document.getElementById('state-id').value,'".$cat."');"
      ]);?>
   </div>
   <div class="form-group">
      <?= $this->Form->input('city_id', [
         'options' => $cities,
         'class'=>'form-control',
         'default'=>$this->request->params['city_slug'] ?? '',
         'label'=>false,
         'onchange'=>"reloadIndexCity(document.getElementById('city-id').value,document.getElementById('state-id').value,'".$cat."');",
         'empty'=>'-- Quartiers --'
      ]);?>
   </div>
</form>
<br>
<?= $this->Html->script('front/Announces/index',['block' => 'scriptBottom']);?>
