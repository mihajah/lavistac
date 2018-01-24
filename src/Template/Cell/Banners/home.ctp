<?php foreach ($ads as $ad):?>
   <?php if (!empty($ad)): ?>
   	<div itemscope itemid="<?php echo $ad->url?>">
   	<p itemprop="desc" class="hide"><?php echo $ad->alt?></p>
      <a href="<?=$ad->url?>" rel="<?=($ad->rel) ? 'nofollow' : 'follow'?>" target="<?=$ad->target?>" class="thumbnail banner">
         <figure>
            <?=$this->Html->image($ad->pic_url, ['width'=>'100%','alt'=>$ad->alt, 'itemprop'=>'img'])?>
         </figure>
      </a>
    </div>
   <?php endif; ?>
<?php endforeach;?>
