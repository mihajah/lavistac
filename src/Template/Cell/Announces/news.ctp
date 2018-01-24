<div class="card">
   <div class="header">
      <span class="label label-NEW">NEWS  <span class="badge"> <?= $news->count() ?></span></span>
   </div>
   <div class="content">
      <div class="table-full-width">
         <table class="table">
            <tbody>
               <?php foreach ($news as $announce): ?>
                  <tr>
                     <td><?=$this->Image->image(['image'=>$announce->pics[0]->url, 'height'=>'50', 'cropratio'=> "4:3", 'class'=>'img-responsive'])?></td>
                     <td><?= $announce->title ?></td>
                     <td><?= $announce->title ?></td>
                     <td><?= $announce->modified ?></td>
                     <td><?= $announce->type ?></td>
                     <td class="td-actions text-right">
                        <?= $this->Html->link('View', ['controller'=>'announces', 'action'=>'view', $announce->id], ['class'=>'btn btn-xs']) ?>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <div class="footer">
   </div>
</div>
