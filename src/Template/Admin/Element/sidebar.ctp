<?php
use Cake\Core\Configure;

// see http://themes-pixeden.com/font-demos/7-stroke/ for icons
$menu = [
   '<i class="pe-7s-graph"></i><p>'.__('Dashboard').'</p>' => ['controller' => 'Dashboard', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-bookmarks"></i><p>'.__('Announces').'<b class="caret"></b></p>' => [
      'collapse' => [
         __('Premium') => ['controller' => 'Announces', 'action' => 'index', 'PAYING', 'prefix' => 'admin', 'plugin' => false],
         __('Free') => ['controller' => 'Announces', 'action' => 'index', 'FREE', 'prefix' => 'admin', 'plugin' => false]
      ]
   ],
   '<i class="pe-7s-mail"></i><p>'.__('Ads').'<b class="caret"></b></p>' => [
      'collapse' => [
         __('Header') => ['controller' => 'Ads', 'action' => 'index', 3, 'prefix' => 'admin', 'plugin' => false],
         __('Sponsor') => ['controller' => 'Ads', 'action' => 'index',1,'prefix' => 'admin', 'plugin' => false],
         __('Vista') => ['controller' => 'Ads', 'action' => 'index',2, 'prefix' => 'admin', 'plugin' => false],
         __('Home') => ['controller' => 'Ads', 'action' => 'index',6, 'prefix' => 'admin', 'plugin' => false],
      ]
   ],
   '<i class="pe-7s-piggy"></i><p>'.__('Contracts').'</p>' => ['controller' => 'Contracts', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-news-paper"></i><p>'.__('Posts').'</p>' => ['controller' => 'Posts', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-smile"></i><p>'.__('Partners').'</p>' => ['controller' => 'Partners', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-photo"></i><p>'.__('Pics').'</p>' => ['controller' => 'Pics', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-note"></i><p>'.__('Text blocks').'</p>' => ['controller' => 'PageInfos', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-info"></i><p>'.__('Metas').'</p>' => ['controller' => 'Metas', 'action' => 'index','prefix' => 'admin', 'plugin' => false],

   '<i class="pe-7s-way"></i><p>'.__('Toplists').'<b class="caret"></b></p>' => [
      'collapse' => [
         __('Externs') => ['controller' => 'Toplists', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('Interns') => ['controller' => 'Banners', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
      ]
   ],
   '<i class="pe-7s-map-2"></i><p>'.__('Locations').'<b class="caret"></b></p>' => [
      'collapse' => [
         __('Cities') => ['controller' => 'Cities', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('States') => ['controller' => 'States', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
      ]
   ],
   '<i class="pe-7s-users"></i><p>'.__('Users').'</p>' => ['controller' => 'Users', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-mail"></i><p>'.__('Contacts').'</p>' => ['controller' => 'Contacts', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
   '<i class="pe-7s-tools"></i><p>'.__('Configurations').'<b class="caret"></b></p>' => [
      'collapse' => [
         __('Ad Types') => ['controller' => 'AdTypes', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('Contacts Types') => ['controller' => 'ContractTypes', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('Notifications') => ['controller' => 'Notifications', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('Meta Types') => ['controller' => 'MetaTypes', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('User Groups') => ['controller' => 'Groups', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
         __('Categories') => ['controller' => 'Categories', 'action' => 'index','prefix' => 'admin', 'plugin' => false],
      ]
   ]
];
?>

<!-- SIDEBAR -->
<div class="sidebar" data-color="azure">
   <!-- Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" Tip 2: you can also add an image using data-image tag -->

   <!-- LOGO & LINK -->
   <div class="logo">
      <?= $this->Html->link($this->Html->image('logo.png', ['class' => 'img-responsive']),['controller'=>'pages', 'action'=>'display', 'home', 'prefix'=>false], ['escape'=>false, 'target'=>'_blank'])?>
   </div>
   <div class="logo logo-mini">
      <?= $this->Html->link('LS', ['controller'=>'pages', 'action'=>'display', 'home', 'prefix'=>false], ['class' => 'logo-text']) ?>
   </div>

   <!-- MENU -->
   <div class="sidebar-wrapper">

      <!-- USER -->
      <div class="user">

         <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false">
               <?= $connected['email'] ?>
               <b class="caret"></b>
            </a>
            <div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
               <ul class="nav">
                  <li><?=$this->Html->link(__('Logout'), ['controller'=>'Users', 'action'=>'logout', 'prefix'=>false])?></li>
               </ul>
            </div>
         </div>
      </div>

      <!-- MENU LIST -->
      <ul class="nav">
         <?php
         $menuCount = 0;
         foreach($menu as $header => $m )
         {
            if(is_array($m) && array_key_exists('collapse', $m))
            {
               $menuCount++;
               $html = '<li>'."\n";
               $html .= '<a data-toggle="collapse" href="#menu-item-'.$menuCount.'" aria-expanded="false">'.$header.'</a>'."\n";
               $html .= '<div class="collapse" id="menu-item-'.$menuCount.'" aria-expanded="false">'."\n";

               // check active
               if(array_search($this->request->params['controller'], array_column($m['collapse'], 'controller')) !== false )
               {
                  if( array_search($this->request->params['action'], array_column($m['collapse'], 'action')) !== false )
                  {
                     $in = $this->request->session()->read('Settings.css.sidebar-mini') == '' ? 'in' : '';
                     $html = '<li class="active">'."\n";
                     $html .= '<a data-toggle="collapse" href="#menu-item-'.$menuCount.'" aria-expanded="true">'.$header.'</a>'."\n";
                     $html .= '<div class="collapse '.$in.'" id="menu-item-'.$menuCount.'" aria-expanded="true">'."\n";
                  }
               }

               echo $html;
               echo '<ul class="nav">'."\n";
               foreach($m['collapse'] as $subMenuLabel => $subMenu)
               {
                  $active = (!empty($subMenu['controller']))? (
                     $this->request->params['controller'] == $subMenu['controller'] &&
                     $this->request->params['action'] == $subMenu['action']
                     )? 'active' : '' : '';
                     echo $this->Html->tag('li',$this->Html->link($subMenuLabel, $subMenu, ['escape' => false]),['class' => $active." submenu"]);
                  }
                  echo '</ul>'."\n";
                  echo '</div>'."\n";
                  echo '</li>'."\n";
               }else
               {
                  $active = (!empty($m['controller']))? (
                     $this->request->params['controller'] == $m['controller'] &&
                     $this->request->params['action'] == $m['action']
                     )? 'active' : '' : '';
                     echo $this->Html->tag('li',$this->Html->link($header, $m, ['escape' => false]),['class' => $active]);
                  }
               }
               ?>
            </ul>
         </div>
         <div class="sidebar-background"></div>
      </div>
