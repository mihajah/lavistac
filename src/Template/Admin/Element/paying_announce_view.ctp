<div class="col-sm-6">
   <div class="card">
      <div class="content">
         <div class="annouce_detail announce_detail_paying">
            <h1 class="text-center"> <?= h($announce->title) ?></h1>
            <div class="row">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-sm-8">
                        <div class="thumbnail">
                           <?php if (empty($announce->pics)): ?>
                              <p class="text-center">
                                 <?= $this->Html->link('Add Pic', ['controller'=>'pics', 'action'=>'addToAnnounce', $announce->id], ['class'=>'btn btn-danger btn-fill '])?>
                              </p>
                           <?php else: ?>
                              <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'600'],['class'=>'img-responsive announce_pic center-block',  "data-toggle"=>"modal", "data-target"=>"#photos"])?>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-sm-4 hidden-xs">
                        <?php for ($i=1; $i < count($announce->pics) ; $i++) :?>
                           <div class="thumbnail">
                              <?=$this->Image->image(['image'=>$announce->pics[$i]->url, 'height'=>'180', 'cropratio'=>'4:6'],['class'=>'img-responsive',  "data-toggle"=>"modal", "data-target"=>"#photos"])?>
                           </div>
                        <?php endfor; ?>
                        <?php if (count($announce->pics) < 4): ?>
                           <?= $this->Html->link('Add Pic', ['controller'=>'pics', 'action'=>'addToAnnounce', $announce->id], ['class'=>'btn btn-danger btn-fill'])?>

                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-8">
                  <div class="panel panel-danger">
                     <div class="panel-heading"><h2 class="text-center"><?= h($announce->firstname) ?></h2></div>
                     <div class="panel-body">
                        <?= $announce->presentation?>
                     </div>
                  </div>

               </div>
               <div class="col-md-4">
                  <div class="panel panel-info">
                     <div class="panel-heading">Info</div>
                     <div class="panel-body">
                        <dl class="">
                           <dt>Arrondissements - Périphérie</dt>
                           <dd><?=$announce->state->name?></dd>
                           <dt>Quartiers</dt>
                           <?php foreach ($announce->cities as $city): ?>
                              <dd><?=$city->name?></dd>
                           <?php endforeach;?>
                           <dt>Rencontre</dt>
                           <dd> <?=  $announce->out_in?></dd>
                           <?php if (!empty($announce->website)): ?>
                              <dt>Site internet</dt>
                              <dd><?=$announce->website?></dd>
                           <?php endif; ?>
                           <dt>Téléphone</dt>
                           <dd class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <?=$this->html->link($announce->phone, "tel:".$announce->phone)?></dd>
                        </dl>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->Html->script("vendor/jquery.watermark.min",  ['block' => 'scriptBottom'])?>
<?= $this->Html->scriptBlock("$('.announce_pic').watermark({
   text: 'LOveSita',
   textWidth: 100,
   gravity: 'l',
   opacity: 1,
   margin: 12
});",  ['block' => 'scriptBottom'])?>
