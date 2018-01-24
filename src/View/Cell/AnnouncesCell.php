<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
* Announces cell
*/
class AnnouncesCell extends Cell
{

   /**
   * List of valid options that can be passed into this
   * cell's constructor.
   *
   * @var array
   */
   protected $_validCellOptions = [];


   public function wainting(){
      $this->loadModel('Announces');
      $waintings = $this->Announces->find('all', [
         'contain'=>['Pics'],
         'conditions'=>['Announces.status' => 'WAITING']
      ]);
      $this->set('waintings',$waintings);

   }

   public function news(){
      $this->loadModel('Announces');
      $news = $this->Announces->find('all', [
         'contain'=>['Pics'],
         'conditions'=>['Announces.status' => 'NEW']
      ]);
      $this->set('news',$news);
   }
}
