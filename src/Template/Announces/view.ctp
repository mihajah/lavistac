<div class="row">
  <div class="col-sm-12">
    <?= $this->element('breadcrumb', ['urls'=>[
      $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']),
      $this->Html->link($announce->category->name, ['controller'=>'Announces', 'action'=>'index', $announce->category->slug], ['escape'=>false]),
      $this->Html->link($announce->state->name, ['controller'=>'Announces', 'action'=>'index', $announce->category->slug, $announce->state->slug]),
      $this->Html->link($this->Text->truncate($announce->title, 80, array('ellipsis' => '...', 'exact' => false)), ['controller'=>'Announces', 'action'=>'view',$announce->slug ]),
      ]]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-9">
      <div class="annouce_detail announce_detail_paying">
        <div class="hidden-sm hidden-md hidden-lg">
          <button type="button" name="button" onclick="window.history.back();" class="btn btn-sm btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Retour</button>
        </div>
        <h1 class="text-center"> <?= h($announce->title) ?></h1>
        <div class="row">
          <div class="col-sm-12 detail_pics">
            <div class="row">
              <div class="col-sm-8">
                <div class="thumbnail big_pic_detail">
                  <?=$this->Image->image(['image'=>$announce->pics[0]->url, 'height'=>'600'],['class'=>'img-responsive announce_pic center-block',  "data-toggle"=>"modal", "data-target"=>"#photos", 'alt'=>$announce->pics[0]->alt])?>
                </div>
                <?php if (count($announce->pics) > 1): ?>
                  <div class="hidden-sm hidden-md hidden-lg">
                    <button type="button" name="button" data-toggle="modal" data-target="#photos" class="btn btn-default btn-sm"><i class="fa fa-plus"> Photos</i></button>
                    <br><br>
                  </div>
                <?php endif; ?>
              </div>
              <div class="col-sm-4 hidden-xs">
                <?php for ($i=1; $i < count($announce->pics) ; $i++) :?>
                  <div class="thumbnail small_pics_detail">
                    <?=$this->Image->image(['image'=>$announce->pics[$i]->url, 'height'=>'180', 'cropratio'=>'4:6'],['class'=>'img-responsive',  "data-toggle"=>"modal", "data-target"=>"#photos", 'alt'=>$announce->pics[0]->alt])?>
                  </div>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-danger">
              <div class="panel-heading"><h2 class="text-center"><?= h($announce->firstname) ?></h2></div>
              <div class="panel-body">
                <?= $announce->presentation?>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            <div class="panel panel-info">
              <div class="panel-heading">Info</div>
              <div class="panel-body">
                <dl class="">
                  <dt>Arrondissements - Périphérie</dt>
                  <dd><?=$announce->state->name?></dd>
                  <dt>Quartiers</dt>
                  <?php foreach ($announce->cities as $city): ?>
                    <dd><?=$city->name?></dd>
                  <?php endforeach;?>
                  <dt>Rencontre</dt>
                  <dd> <?=  $announce->out_in?></dd>
                  <?php if (!empty($announce->website)): ?>
                    <dt>Site internet</dt>
                    <dd>
                      <?=$this->Html->link('Voir le site', $announce->website,['target'=>'_blank', 'rel'=>"nofollow"])?>
                    </dd>
                  <?php endif; ?>
                  <dt>Téléphone</dt>
                  <dd class="tel"><i class="fa fa-phone" aria-hidden="true"></i> <?=$this->html->link($announce->phone, "tel:".$announce->phone)?></dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-3   hidden-xs">
      <?=  $this->cell('Banners::vista_detail_paying', ['cat_id'=>$announce->category_id]); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <?= $this->cell('Pages::bottom', [$this->request->here],[
        'cache' => ['config' => 'month', 'key' => 'page_info_'.$this->request->here]
      ]);?>
    </div>

  </div>



  <div class="modal fade" tabindex="-1" role="dialog" id="photos">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4><?= h($announce->title) ?></h4>
        </div>
        <div class="modal-body">
          <?php foreach ($announce->pics as $pic): ?>
            <figure>
              <?=$this->Html->image($pic->url, ['class'=>'img-responsive announce_pic center-block img-thumbnail'])?>
            </figure>
          <?php endforeach; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal -->

  <?= $this->Html->script("vendor/jquery.watermark.min",  ['block' => 'scriptBottom'])?>
  <?= $this->Html->scriptBlock("$('.announce_pic').watermark({
    text: 'LOveSita',
    textWidth: 100,
    gravity: 'l',
    opacity: 1,
    margin: 12
  });",  ['block' => 'scriptBottom'])?>
