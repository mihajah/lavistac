<footer class="hidden-xs">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-sm-6 footerleft ">
            <div class="logofooter">
               <?=$this->Html->image('logo.png', ['class'=>'img-responsive', 'alt'=>'escort girl paris'])?>
            </div>
            </div>
            <div class="col-md-2 col-sm-6 paddingtop-bottom">
               <h6 class="heading7">LIENS</h6>
               <ul class="footer-ul">
                  <li><?= $this->Html->link(__('Sites de rencontre'), ['controller' => 'Pages', 'action' => 'display', 'site_de_rencontre'], ['data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Páginas web de citas / Online dating"])?></li>
                  <li><?= $this->Html->link(__('Sites remarquables'), ['controller' => 'Pages', 'action' => 'display', 'sites_remarquables'], ['data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>""])?></li>
                  <li><?= $this->Html->link(__('Echange de liens'), ['controller'=>'Pages', 'action'=>'display', 'echange_de_liens'], ['data-toggle'=>"tooltip", 'data-placement'=>"left", 'title'=>"Intercambio de enlaces / Links exchange"])?></li>
                  <li><?= $this->Html->link(__('FAQs'), ['controller'=>'Pages', 'action'=>'display', 'faqs'])?></li>
                  <li><?= $this->Html->link(__('Contact'), ['controller'=>'Contacts', 'action'=>'add'])?></li>
               </ul>
            </div>
            <div class="col-md-6 col-sm-6 paddingtop-bottom">
               <h6 class="heading7">RACCOURCIS</h6>
               <div class="post">
                  <?= $this->cell('Pages::footer', [$this->request->here],[
                     'cache' => ['config' => 'month', 'key' => 'footer_'.$this->request->here]
                  ]);?>

               </div>
            </div>
         </div>
      </div>
   </footer>
   <!--footer start from here-->

   <div class="copyright">
      <div class="container">
         <div class="col-md-6">
            <p>Copyright © LOveSita <?= date('Y') ?>. All right reserved.</p>
         </div>
         <div class="col-md-6">
            <ul class="bottom_ul">
               <li><?= $this->Html->link('Avis Légal - Politique de Confidentialité - Conditions Contractuelles', ['controller'=>'Pages', 'action'=>'display', 'avis_legal'])?></li>
            </ul>
         </div>
      </div>
   </div>
