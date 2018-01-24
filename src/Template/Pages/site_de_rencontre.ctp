<div class="row">
   <div class="col-sm-12">
      <?= $this->cell('Pages::top', [$this->request->here],[
         'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
   </div>
</div>
