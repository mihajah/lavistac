<?php
   foreach($metas as $meta){
      if($meta->meta_type_id == 12){
            echo '<link rel="canonical" href="'.$meta->content.'" />';
      }else{
         echo $this->Html->meta(array('name' => $meta->meta_type->name, 'content' => $meta->content));
      }
   }
 ?>
