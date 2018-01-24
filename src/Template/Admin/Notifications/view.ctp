<nav class="navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-minimize">
         <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
         </button>
      </div>
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Notification - <?=h($notification->id) ?></a>
      </div>
      <div class="collapse navbar-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $notification->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?> </li>
            <li><?= $this->Html->link(__('New'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List'), ['action' => 'index']) ?></li>
         </ul>
      </div>
   </div>
</nav>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-8">
            <div class="card">
               <div class="header">
                  <h3><?= h($notification->subject) ?></h3>
               </div>
               <div class="content">

                  <table class="table table-striped">
                  </table>
                  <div class="row">
                     <div class="col-sm-12">
                        <h4><?= __('Message') ?></h4>
                        <?= $notification->message; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card">
               <div class="header">
                  <h4>Test</h4>
               </div>
               <div class="content">
                  <?php echo $this->Form->create($notification, ['url' => ['action' => 'testSend'], 'class'=>'form-inline', 'type'=>'POST']);?>
                  <div class="form-group">
                     <?php echo $this->Form->input('to', ['div'=>false, 'class'=>false,'placeholder'=>'jane.doe@example.com', 'label'=>false, 'class'=>'form-control', 'type'=>'email']) ?>
                  </div>
                  <?php echo $this->Form->input('notification_id', ['type'=>'hidden', 'value'=>$notification->id])?>
                  <?= $this->Form->button(__('Send Test'), ['class'=>'btn btn-default']) ?>
                  <?php echo $this->Form->end()  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
