<div class="row">
  <div class="col-sm-12">
    <?= $this->element('breadcrumb', ['urls'=>[
      $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
      $this->Html->link(__('Post-libres'), ['controller'=>'Posts', 'action'=>'index'])
    ]
    ]) ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <?=  $this->cell('Banners::header'); ?>
  </div>
  <div class="col-sm-2 hidden-xs">
    <?=  $this->cell('Banners::sponsor', ['right'=>false]); ?>
  </div>
  <div class="col-sm-8">
    <div class="row">
      <?php foreach ($posts as $post): ?>
        <div class="col-sm-12">
          <a href="<?= $this->Url->build(['action' => 'view', $post->slug])?>">
            <div class="media">
              <div class="media-left">
                <?=$this->Image->image(['image'=>$post->img, 'height'=>'80', 'cropratio'=> "4:3", 'class'=>'media-object'])?>
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?= h($post->title) ?></h4>
                <p>
                  <?php echo $this->Text->truncate($post->subtitle, 50, array('ellipsis' => '...', 'exact' => false)); ?>
                </p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="paginator">
          <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
          </ul>
          <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
      </div>
    </div>
    <?= $this->cell('Pages::bottom', [$this->request->here],[
       'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
    ]);?>
  </div>
  <div class="col-sm-2  hidden-xs">
    <?=  $this->cell('Banners::sponsor', ['right'=>true]); ?>
  </div>
</div>
