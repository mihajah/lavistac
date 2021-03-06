<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
* AdTypes cell
*/
class AdTypesCell extends Cell
{

   /**
   * List of valid options that can be passed into this
   * cell's constructor.
   *
   * @var array
   */
   protected $_validCellOptions = [];

   /**
   * Default display method.
   *
   * @return void
   */
   public function display()
   {
      $this->loadModel('AdTypes');
      $types = $this->AdTypes->find('list');
      $this->set('types', $types);
   }
}
