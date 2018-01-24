<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Utility\Inflector;

/**
* Pages cell
*/
class PagesCell extends Cell
{

   /**
   * List of valid options that can be passed into this
   * cell's constructor.
   *
   * @var array
   */
   protected $_validCellOptions = [];

   public function top($url){
      $this->loadModel('PageInfos');
      if($url != "/"){
         $url = rtrim($url, '/');
      }
      if(isset($this->request->query['page'])){
         $url = $url."?page=".$this->request->query['page'];
      }
      $top = $this->PageInfos->find('all', [
         'conditions'=>[
            'PageInfos.url'=>$url,
            'PageInfos.position'=>'BEFORE'
         ]
      ])
      ->cache('text_top_'.Inflector::variable($url), 'month')
      ->first();

      $this->set('top', $top);
   }

   public function bottom($url){
      $this->loadModel('PageInfos');
      if($url != "/"){
         $url = rtrim($url, '/');
      }

      if(isset($this->request->query['page'])){
         $url = $url."?page=".$this->request->query['page'];
      }

      $bottom = $this->PageInfos->find('all', [
         'conditions'=>[
            'PageInfos.url'=>$url,
            'PageInfos.position'=>'AFTER'
         ]
      ])
      ->cache('text_bottom_'.Inflector::slug($url), 'month')
      ->first();
      $this->set('bottom', $bottom);
   }

   public function footer($url){
      $this->loadModel('PageInfos');
      if($url != "/"){
         $url = rtrim($url, '/');
      }
      if(isset($this->request->query['page'])){
         $url = $url."?page=".$this->request->query['page'];
      }
      $footer = $this->PageInfos->find('all', [
         'conditions'=>[
            'PageInfos.url'=>$url,
            'PageInfos.position'=>'FOOTER'
         ]
      ])
      ->cache('text_bottom_footer_'.Inflector::variable($url), 'month')
      ->first();
      $this->set('footer', $footer);
   }
}
