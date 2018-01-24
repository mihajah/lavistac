<?php if (!empty($ad)): ?>
   <div class="row">
      <div class="col-sm-12">
         <div class="header_banner">
            <a href="<?=$ad->url?>" rel="<?=($ad->rel) ? 'nofollow' : 'follow'?>" target="<?=$ad->target?>" class="thumbnail banner banner_header">
               <figure>
                  <?=$this->Html->image($ad->pic_url, ['width'=>'100%','alt'=>$ad->alt])?>
               </figure>
            </a>
         </div>
      </div>
   </div>
<?php endif; ?>
