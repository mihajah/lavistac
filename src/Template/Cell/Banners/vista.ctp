<?php foreach ($ads as $ad):?>
   <?php if (!empty($ad)): ?>
      <a href="<?=$ad->url?>" rel="<?=($ad->rel) ? 'nofollow' : 'follow'?>" target="<?=$ad->target?>" class="thumbnail banner">
         <figure>
            <?=$this->Html->image($ad->pic_url, ['width'=>'100%','alt'=>$ad->alt])?>
         </figure>
      </a>
   <?php endif ?>
<?php endforeach;?>
