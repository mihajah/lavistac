<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'LOveSita';
?>
<!DOCTYPE html>
<html>
<head>
   <?= $this->Html->charset() ?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="language" content="fr">
   <?= $this->cell('Metas::title', [$this->request->here, $this->request['?']])?>
   <?= $this->cell('Metas', [$this->request->here, $this->request['?']])?>
   <?= $this->Html->meta('icon') ?>
   <?= $this->Html->css(['vendor/bootstrap.min','front.min']) ?>
   <?= $this->fetch('meta') ?>
   <?= $this->fetch('css') ?>
   <?= $this->fetch('script') ?>
   <meta name="google-site-verification" content="6B23A_CGrbRXkNmNJ7KI87gPTyNwgNwWupFsrGSM3_8" />
</head>
<body>
   <header>
      <?=$this->element('menu')?>
   </header>
   <div class="container">
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
      <div id="main">
         <?= $this->fetch('content') ?>
      </div>
   </div>
   <footer>
      <?=$this->element('footer')?>
   </footer>
   <div class="scroll-top-wrapper ">
      <span class="scroll-top-inner">
         <i class="fa fa-2x fa-arrow-circle-up"></i>
      </span>
   </div>
   <?= $this->Html->css(['vendor/font-awesome.min','vendor/select2.min']) ?>
   <?=$this->Html->script(['vendor/jquery-3.1.1.min.js', 'vendor/bootstrap.min','vendor/imagesloaded','vendor/isotope.pkgd.min', 'vendor/select2.full.min', 'front/app'])?>
   <?= $this->fetch('scriptBottom');?>
   <!-- Google analytics -->
     <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-70474459-1', 'auto');
         ga('send', 'pageview');
      </script>
</body>
</html>
