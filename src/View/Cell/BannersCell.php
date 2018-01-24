<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
* Banners cell
*/
class BannersCell extends Cell
{

   /**
   * List of valid options that can be passed into this
   * cell's constructor.
   *
   * @var array
   */
   protected $_validCellOptions = [];

   public function vista_detail_paying($cat_id){
      $this->loadModel('Ads');
      $ads = $this->Ads->find('all', [
         'conditions'=>[
            'Ads.ad_type_id'=> 2,
            'Ads.active' => 1,
            'Ads.category_id' => $cat_id
         ],
         'limit'=>4,
         'order'=>'rand()'
      ])
      ->cache('vista_detail_paying', 'short');
      $this->set('ads', $ads);
   }

   public function vista($right = false)
   {
      $this->loadModel('Ads');
      $ads = $this->Ads->find('all', [
         'conditions'=>[
            'Ads.ad_type_id'=> 2,
            'Ads.active' => 1
         ],
         'limit'=>12,
         'order'=>'rand()'
      ])
      ->cache('vista', 'short')
      ->toArray();
      if($right){
         for ($i=0; $i < 6 ; $i++) {
            $banner_right[] = $ads[$i];
         }
         $this->set('ads', $banner_right);
      }else{
         for ($i=4; $i < 10 ; $i++) {
            $banner_left[] = $ads[$i];
         }
         $this->set('ads', $banner_left);
      }
   }


   public function vista_missives($right = false, $limitR = 16, $limitL = 31)
   {
      $this->loadModel('Ads');
      $ads = $this->Ads->find('all', [
         'conditions'=>[
            'Ads.ad_type_id'=> 2,
            'Ads.active' => 1
         ],
         'limit'=>32,
         'order'=>'rand()'
      ])
      ->cache('vista_missives', 'short')
      ->toArray();
      if($right){
         for ($i=0; $i < $limitR ; $i++) {
            $banner_right[] = $ads[$i];
         }
         $this->set('ads', $banner_right);
      }else{
         for ($i=15; $i < $limitL ; $i++) {
            $banner_left[] = $ads[$i];
         }
         $this->set('ads', $banner_left);
      }
   }

   public function sponsor($right = false)
   {
      $this->loadModel('Ads');
      $ads = $this->Ads->find('all', [
         'conditions'=>[
            'Ads.ad_type_id'=> 1,
            'Ads.active' => 1
         ],
         'limit'=>12,
         'order'=>'rand()'
      ])
      ->cache('sponsor', 'short')
      ->toArray();
      if($right){
         for ($i=0; $i <= 5 ; $i++) {
            $banner_right[] = $ads[$i];
         }
         $this->set('ads', $banner_right);
      }else{
         for ($i=6; $i <= 11 ; $i++) {
            $banner_left[] = $ads[$i];
         }
         $this->set('ads', $banner_left);
      }
   }

   public function header()
   {
      $this->loadModel('Ads');
      $ad = $this->Ads->find('all', [
         'conditions'=>[
            'Ads.ad_type_id'=> 3,
            'Ads.active' => 1,
         ],
         'limit'=>1,
         'order'=>'rand()'
      ])
      ->cache('header', 'short')
      ->first();
      $this->set('ad', $ad);
   }

   public function home($right = false)
   {
      $this->loadModel('Ads');
      $ads = $this->Ads->find('all', [
         'conditions'=>[
            'Ads.ad_type_id'=> 6,
            'Ads.active' => 1,
            'Ads.category_id'=>1
         ],
         'limit'=>12,
         'order'=>'rand()'
      ])
      ->cache('home_banner', 'short')
      ->toArray();
      for ($i=0; $i < 6 ; $i++) {
         $banner_left[] = $ads[$i];
      }
      for ($i=6; $i <= 11 ; $i++) {
         $banner_right[] = $ads[$i];
      }
      if($right){
         $this->set('ads', $banner_right);
      }else{
         $this->set('ads', $banner_left);
      }

   }

}
