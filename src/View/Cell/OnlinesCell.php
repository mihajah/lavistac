<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\I18n\Time;

/**
* Onlines cell
*/
class OnlinesCell extends Cell
{

   /**
   * List of valid options that can be passed into this
   * cell's constructor.
   *
   * @var array
   */
   protected $_validCellOptions = [];

   public function carousel(){
      $this->loadModel('Announces');
      //$online_time = new Time('2 hours ago');

      $onlines = $this->Announces->find('all',[

         'contain' => ['States', 'Categories', 'Pics', 'Cities'],
         'conditions'=>[
            'Announces.type'=>'PAYING',
            'Announces.status' => 'ONLINE',
            'Announces.category_id' => 1,
            'Announces.connected >'=> new Time('3 hours ago')
         ],
         'limit'=>200
      ])
      ->order('rand()')
      ->cache('online_carousel', 'short');

      $slides = [];
      $i= 0;
      $y = 0;
      foreach ($onlines as $announce) {
         $slides[$y][] = $announce;
         $i++;
         if($i== 4){$y++;}
      }
      $this->set('slides', $slides);

   }

   /**
   * Default display method.
   *
   * @return void
   */
   public function display()
   {
      $this->loadModel('Announces');
      //$online_time = new Time('2 hours ago');

      $onlines = $this->Announces->find('all',[

         'contain' => ['States', 'Categories', 'Pics', 'Cities'],
         'conditions'=>[
            'Announces.type'=>'PAYING',
            'Announces.status' => 'ONLINE',
            'Announces.category_id' => 1,
            'Announces.connected >'=> new Time('3 hours ago')
         ],
         'limit'=>200
      ])
      ->order('rand()')
      ->cache('online_banner', 'short');

      //debug($onlines);
      $this->set('announces', $onlines);
   }
}
