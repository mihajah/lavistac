<!-- // Begin Template Body \\ -->
<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
   <tr>
      <td valign="top" class="bodyContent">

         <!-- // Begin Module: Standard Content \\ -->
         <table border="0" cellpadding="20" cellspacing="0" width="100%">
            <tr>
               <td valign="top">
                  <div mc:edit="std_content00">
                     <h1> <?= $announce->title ?></h1>
                     <h2><?= $announce->firstname ?></h2>
                     <p><?= $announce->presentation ?></p>
                     <p>
                        <?= $this->Html->link('Voir dans l\'admin', ['controller'=>'announces', 'action'=>'view', $announce->id, 'prefix'=>'admin', '_full' => true])?>
                     </p>
                  </div>
               </td>
            </tr>
         </table>
         <!-- // End Module: Standard Content \\ -->
      </td>
   </tr>
</table>
<!-- // End Template Body \\ -->
