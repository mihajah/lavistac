<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Metas cell
 */
class MetasCell extends Cell
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
    public function display($here, $page)
    {
      $this->loadModel('Metas');
      if($here != "/"){
         $here = rtrim($here, '/');
      }
      if($page){
         $here = $here."?page=".$page['page'];
      }
      $metas = $this->Metas->find('all',[
         'contain'=>['MetaTypes'],
         'conditions'=>[
            'Metas.url'=>$here,
            'MetaTypes.name <>'=>  'title'
         ]
      ])->cache('metas_'.$here, 'month');
      $this->set('metas', $metas);
    }


    public function title($here, $page){
      $this->loadModel('Metas');
      if($here != "/"){
         $here = rtrim($here, '/');
      }
      if($page){
         $here = $here."?page=".$page['page'];
      }
      $title = $this->Metas->find('all',[
         'contain'=>['MetaTypes'],
         'conditions'=>[
            'Metas.url'=>$here,
            'MetaTypes.name' => 'title'
         ]
      ])
      ->cache('title_'.$here, 'month')
      ->first();
      if(empty($title)){
         $this->set('title', "LOveSita | Annonces libertines.");
      }else{
         $this->set('title', $title->content);
      }
   }
}
