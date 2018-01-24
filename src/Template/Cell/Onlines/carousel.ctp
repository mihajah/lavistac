<div id="myCarousel" class="carousel slide">
   <!-- Carousel items -->
   <div class="carousel-inner">
      <div class="item active">
         <div class="row">
            <?php foreach ($slides[0] as $announce): ?>
               <div class="col-sm-3">
                  <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view', $announce->slug])?>" class="thumbnail">
                     <span class="label label-success"><i class="fa fa-bell" aria-hidden="true"></i> ONLINE </span>
                     <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'height'=>'200', 'cropratio'=> "6:4",'class'=>'img-responsive'])?>
                     <h4><?=$announce->title?></h4>
                  </a>
               </div>
            <?php endforeach; ?>
         </div>
         <!--/row-->
      </div>
      <?php for ($i=1; $i < count($slides); $i++):?>
         <div class="item">
            <div class="row">
               <?php foreach ($slides[$i] as $announce): ?>
                  <div class="col-sm-3">
                     <a href="<?=$this->Url->build(['controller'=>'Announces', 'action'=>'view', $announce->slug])?>" class="thumbnail">
                        <span class="label label-success"><i class="fa fa-bell" aria-hidden="true"></i> ONLINE </span>
                        <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'height'=>'200','cropratio'=> "6:4", 'class'=>'img-responsive'])?>
                        <h4><?=$announce->title?></h4>
                     </a>
                  </div>
               <?php endforeach; ?>
            </div>
            <!--/row-->
         </div>
      <?php endfor; ?>
   </div>
   <!--/carousel-inner-->
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
   <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>
