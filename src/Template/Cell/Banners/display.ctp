<?php foreach ($ads as $ad):?>
   <a href="<?=$ad->url?>" rel="<?=($ad->rel) ? 'nofollow' : 'follow'?>" target="<?=$ad->target?>">
      <?=$this->Html->image($ad->pic_url)?>
   </a>
<?php endforeach;?>
