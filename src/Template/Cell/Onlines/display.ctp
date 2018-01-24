<div class="row">
   <?php foreach ($announces as $announce): ?>
      <div class="col-md-12">
         <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view',$announce->slug ])?>" class="thumbnail announce">
            <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'width'=>'200', 'cropratio'=>'4:3','class'=>'img-responsive'])?>
            <h4><?=$announce->title?></h4>
            <h5><?=$announce->label?></h5>
            <p><?=$announce->state->name?></p>
         </a>
      </div>
   <?php endforeach;?>
</div>
