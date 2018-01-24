<?php foreach ($ads as $ad):?>
   <a href="<?=$ad->url?>" rel="<?=($ad->rel) ? 'nofollow' : 'follow'?>" target="<?=$ad->target?>" class="thumbnail">
      <?=$this->Html->image($ad->pic_url, ['width'=>'100%'],['alt'=>$ad->alt])?>
   </a>
<?php endforeach;?>
