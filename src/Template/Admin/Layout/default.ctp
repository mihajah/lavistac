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

$cakeDescription = 'LOveSita - admin';
?>
<!DOCTYPE html>
<html>
<head>
   <?= $this->Html->charset() ?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      <?= $cakeDescription ?>:
      <?= $this->fetch('title') ?>
   </title>
   <?= $this->Html->meta('icon') ?>
   <?= $this->Html->css(['vendor/bootstrap.min', 'vendor/light-bootstrap-dashboard', 'vendor/pe-icon-7-stroke.css',
   'vendor/font-awesome.min.css', 'vendor/select2.min','../js/vendor/Trumbowyg/ui/trumbowyg.min',
   '../js/vendor/Trumbowyg/plugins/colors/ui/trumbowyg.colors.min',
   'admin']) ?>
    <?= $this->fetch('meta') ?>
   <?= $this->fetch('css') ?>
   <?= $this->fetch('script') ?>

</head>
<body>
   <div class="wrapper">
      <?= $this->element('sidebar')?>
      <div class="main-panel">
         <?= $this->Flash->render() ?>
         <?= $this->fetch('content') ?>
         <?= $this->element('footer') ?>
      </div>
   </div>
   <?=$this->Html->script(['vendor/jquery-3.1.1.min.js', 'vendor/jquery-ui.min',
   'vendor/bootstrap.min', 'vendor/light-bootstrap-dashboard','vendor/imagesloaded','vendor/isotope.pkgd.min',
   'vendor/select2.full.min', 'vendor/Trumbowyg/trumbowyg.min', 'vendor/Trumbowyg/plugins/colors/trumbowyg.colors.min'])?>
   <?= $this->fetch('scriptBottom');?>
</body>
</html>
