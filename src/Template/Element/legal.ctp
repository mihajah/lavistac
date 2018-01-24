<?= $this->Html->script('front/legal',  ['block' => 'scriptBottom'])?>
<div class="modal fade" id="legal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Avis de non-responsabilité</h4>
         </div>
         <div class="modal-body">
            <p>
               <?= $this->cell('Pages::top', ['/legal'],[
                  'cache' => ['config' => 'month', 'key' => 'page_info_legal']
               ]);?>
            </p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default btn-success" data-dismiss="modal" onclick="accept();">ENTRER</button>
            <button type="button" class="btn btn-default btn-danger" onclick="refuse();">SORTIR</button>
         </div>
      </div>
   </div>
</div>
