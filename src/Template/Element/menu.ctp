<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
   <div class="container">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="<?=$this->Url->build("/")?>"><?=$this->Html->image('logo.png', ['alt'=>'Annonces Libertines Paris France : escort call girl, dominatrice, escort boy gay, transsexuel'])?></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
            <li class="dropdown <?= !empty($cat) ? 'active' : '' ?>">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $cat->name ?? 'Sex<i class="fa fa-venus-mars" aria-hidden="true"></i>' ?> <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><?= $this->Html->link('<i class="fa fa-venus" aria-hidden="true"></i> '.__('Libertines'), ['controller'=>'Announces', 'action'=>'index', 'escort-girl-paris'], ['escape'=>false])?></li>
                  <li><?= $this->Html->link('<i class="fa fa-mars" aria-hidden="true"></i> '.__('Libertins'), ['controller'=>'Announces', 'action'=>'index', 'escort-gay-hetero'], ['escape'=>false])?></li>
                  <li><?= $this->Html->link('<i class="fa fa-link" aria-hidden="true"></i> '.__('BDSM'), ['controller'=>'Announces', 'action'=>'index', 'bdsm'], ['escape'=>false])?></li>
                  <li><?= $this->Html->link('<i class="fa fa-transgender-alt" aria-hidden="true"></i> '.__('Transgenres'), ['controller'=>'Announces', 'action'=>'index', 'escort-trans-paris'], ['escape'=>false])?></li>
               </ul>
            </li>
            <li class="<?= $this->request->here == "/annonces-gratuites" ? 'active' : '' ?>"><?= $this->Html->link(__('Missives'), ['controller'=>'Announces', 'action'=>'freeIndex'])?></li>
            <li class="<?= $this->request->here == "/publier-une-annonce" ? 'active' : '' ?>"><?= $this->Html->link(__('Publier une annonce'), ['controller'=>'Announces', 'action'=>'add'], ['data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Publicar un anuncio gratuito / Publish a free announcement"])?></li>
            <li class="<?= $this->request->here == "/post-libres" ? 'active' : '' ?>"><?= $this->Html->link(__('POST-LIBRES'), ['controller'=>'Posts', 'action'=>'index'], ['data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Free Posts / Posts libre"])?></li>
            <li class="<?= $this->request->here == "/toplist" ? 'active' : '' ?>"><?= $this->Html->link(__('TOPLIST'), ['controller'=>'Toplists', 'action'=>'index'])?></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <?php if ($connected): ?>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= h($connected['email']) ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><?= $this->Html->link(__('My Announces'), ['controller'=>'Announces', 'action'=>'myAnnounce'])?></li>
                     <li><?= $this->Html->link(__('Change Password'), ['controller'=>'Users', 'action'=>'changePassword'])?></li>
                     <li><?= $this->Html->link(__('Logout'), ['controller'=>'Users', 'action'=>'logout'])?></li>
                  </ul>
               </li>
            <?php else: ?>
               <li><?= $this->Html->link(__('Connexion'), ['controller'=>'Users', 'action'=>'login'])?></li>
            <?php endif; ?>
         </ul>
      </div><!--/.nav-collapse -->
   </div>
</nav>
