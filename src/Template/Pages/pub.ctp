<div class="row">
   <div class="col-sm-8">
      <?= $this->cell('Pages::top', [$this->request->here],[
         'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
   </div>
   <div class="col-sm-4 online">
      <h1>Online</h1>
      <?=$this->cell('Onlines')?>
   </div>
</div>
