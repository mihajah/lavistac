<div class="col-sm-6">
   <div class="card">
      <div class="content">
         <h1 class="text-center"><?= h($announce->title) ?></h1>
         <?php if (empty($announce->pics)): ?>
            <p class="text-center">
               <?= $this->Html->link('Add Pic', ['controller'=>'pics', 'action'=>'addToAnnounce', $announce->id], ['class'=>'btn btn-primary '])?>
            </p>
         <?php else: ?>
            <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'100'],['class'=>'center-block'])?>
         <?php endif; ?>
         <h2><?= h($announce->firstname) ?></h2>
         <div class="row">
            <div class="col-md-8">
               <p>
                  <?= $announce->presentation?>
               </p>
            </div>
            <div class="col-md-4">
               <br>
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
                        <dt>Téléphone</dt>
                        <dd><i class="fa fa-phone" aria-hidden="true"></i> <?=$announce->phone?></dd>
                        <dt>Rencontre</dt>
                        <dd> <?=  $announce->out_in?></dd>
                        <?php if (!empty($announce->website)): ?>
                           <dt>Site internet</dt>
                           <dd><?=$announce->website?></dd>
                        <?php endif; ?>
                     </dl>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
