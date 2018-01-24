<div class="row">
   <div class="col-sm-12">
      <?php if(!empty($cat)){
         $cat_link = $this->Html->link($cat->name, ['controller'=>'Announces', 'action'=>'index', $cat->slug], ['escape'=>false]);
      }
      if(!empty($state)){
         $state_link = $this->Html->link($state->name, ['controller'=>'Announces', 'action'=>'index', $cat->slug, $state->slug]);
      }
      if(!empty($city)){
         $city_link = $this->Html->link($city->name, ['controller'=>'Announces', 'action'=>'index', $cat->slug, $state->slug, $city->slug]);
      }
      ?>
      <?= $this->element('breadcrumb', ['urls'=>[
         $this->Html->link(__('Home'), ["/"]),
         $cat_link ?? '',
         $state_link ?? '',
         $city_link ?? ''
      ]
   ])
   ?>
</div>
</div>
<div class="row">
   <div class="col-sm-12">
      <?= $this->element('search_index', ['cat'=>$cat->slug]) ?>
   </div>
</div>
<div class="row" id="isotope">
   <?php foreach ($announces_connected as $announce): ?>
      <div class="col-sm-6 col-md-3 col-xs-6">
         <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view',$announce->slug ])?>" class="thumbnail announce announce_connected">
            <div class="index_firstname">
               <?= $this->Text->truncate($announce->firstname, 30,['ellipsis' => '...','exact' => false]) ?>
            </div>
            <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'255', 'cropratio'=>'4:6'],['class'=>'img-responsive', 'alt'=>$announce->pics[0]->alt])?>
            <?=$this->Html->image('online.gif', ['class'=>'connected', 'alt'=>'LOveSita.Com'])?>
            <div class="index_description">
               <p><?= $this->Text->truncate($announce->title, 70,['ellipsis' => '...','exact' => false]) ?></p>
               <span class="label label-default"> <?= $announce->state->name ?></span>
            </div>
         </a>
      </div>
   <?php endforeach;?>
   <?php foreach ($announces_online as $announce): ?>
      <div class="col-sm-6 col-md-3 col-xs-6">
         <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view',$announce->slug ])?>" class="thumbnail announce announce_online">
            <div class="index_firstname">
               <?= $this->Text->truncate($announce->firstname, 30,['ellipsis' => '...','exact' => false]) ?>
            </div>
            <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'255', 'cropratio'=>'4:6'],['class'=>'img-responsive', 'alt'=>$announce->pics[0]->alt])?>
            <div class="index_description">
               <p><?= $this->Text->truncate($announce->title, 70,['ellipsis' => '...','exact' => false]) ?></p>
               <span class="label label-default"> <?= $announce->state->name ?></span>
            </div>
         </a>
      </div>
   <?php endforeach;?>
   <?php foreach ($announces_vista as $announce): ?>
      <div class="col-md-3  col-xs-6">
         <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view',$announce->slug ])?>" class="thumbnail announce announce_vista">
            <div class="index_firstname">
               <?= $this->Text->truncate($announce->firstname, 30,['ellipsis' => '...','exact' => false]) ?>
            </div>
            <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'255', 'cropratio'=>'4:6'],['class'=>'img-responsive', 'alt'=>$announce->pics[0]->alt])?>
            <div class="index_description">
               <p><?= $this->Text->truncate($announce->title, 70,['ellipsis' => '...','exact' => false]) ?></p>
               <span class="label label-default"> <?= $announce->state->name ?></span>
            </div>
         </a>
      </div>
   <?php endforeach;?>
   <?php foreach ($announces_paying as $announce): ?>
      <div class="col-md-3 col-xs-6 ">
         <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view',$announce->slug ])?>" class="thumbnail announce announce_paying">
            <div class="index_firstname">
               <?= $this->Text->truncate($announce->firstname, 30,['ellipsis' => '...','exact' => false]) ?>
            </div>
            <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'155', 'cropratio'=>'4:6'],['class'=>'img-responsive', 'alt'=>$announce->pics[0]->alt])?>
            <div class="index_description">
               <p><?= $this->Text->truncate($announce->title, 70,['ellipsis' => '...','exact' => false]) ?></p>
               <span class="label label-default"> <?= $announce->state->name ?></span>
            </div>
         </a>
      </div>
   <?php endforeach;?>
   <?php 
      //show announce free only from search box
      $here = trim(str_replace('/', '', $this->request->here));
      if($here != 'escort-girl-paris')
      {
   ?>
      <?php foreach ($announces_free as $announce): ?>
         <div class="col-md-3">
            <a href="<?= $this->Url->build(['action' => 'freeView', $announce->slug])?>">
               <div class="media free_index">
                  <div class="media-left">
                     <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'40', 'cropratio' => '4:6'],['class'=>'media-object', 'alt'=>$announce->pics[0]->alt])?>
                  </div>
                  <div class="media-body">
                     <?php echo $this->Text->truncate($announce['title'], 40); ?>
                     <br>
                     <?php echo $this->Text->truncate($announce['firstname'], 40); ?>
                  </div>
               </div>
            </a>
         </div>
      <?php endforeach;?>
   <?php } ?>
</div>
<div class="row hidden-xs">
   <div class="col-sm-12">
      <?= $this->cell('Pages::bottom', [$this->request->here]);?>
   </div>
</div>
