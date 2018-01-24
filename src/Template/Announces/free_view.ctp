<div class="row">
   <div class="col-sm-12">
      <?= $this->element('breadcrumb', ['urls'=>[
         $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
         $this->Html->link(__('Missives'), ['controller'=>'Announces', 'action'=>'freeIndex']),
         $this->Html->link($this->Text->truncate($announce->title, 80, array('ellipsis' => '...', 'exact' => false)), ['controller'=>'Announces', 'action'=>'view',$announce->slug ]),
         ]]) ?>
      </div>
   </div>
   <?=$this->cell('Banners::header')?>
   <div class="row">
      <div class="col-sm-2 hidden-xs">
         <?=  $this->cell('Banners::vista'); ?>
      </div>
      <div class="col-sm-6 col-sm-offset-1 annouce_detail">
         <div class="hidden-sm hidden-md hidden-lg">
            <button type="button" name="button" onclick="window.history.back();" class="btn btn-sm btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Retour</button>
         </div>
         <h1 class="text-center"><?= h($announce->title) ?></h1>
         <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'100'],['class'=>'center-block', 'alt'=>$announce->pics[0]->alt])?>
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
                        <dt>Rencontre</dt>
                        <dd> <?=  $announce->out_in?></dd>
                        <?php if (!empty($announce->website)): ?>
                           <dt>Site internet</dt>
                           <dd>
                              <?=$this->Html->link('Voir le site', $announce->website,['target'=>'_blank', 'rel'=>"nofollow"])?>
                           </dd>
                        <?php endif; ?>
                        <dt>Téléphone</dt>
                        <dd><i class="fa fa-phone" aria-hidden="true"></i> <?=$announce->phone?></dd>
                     </dl>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-2 col-sm-offset-1  hidden-xs">
         <?=  $this->cell('Banners::vista', ['right'=>true]); ?>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <?= $this->cell('Pages::bottom', [$this->request->here]);?>
      </div>

   </div>
