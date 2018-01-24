<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;



/**
* Posts Controller
*
* @property \App\Model\Table\PostsTable $Posts
*/
class PostsController extends AppController
{

   public function beforeFilter(Event $event)
   {
      parent::beforeFilter($event);
      $this->Auth->allow(['index','view', 'oldView']);
   }
   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function index()
   {
      $this->paginate = [
         'conditions'=>['Posts.active'=>true],
         'order' => [
            'Posts.id' => 'desc'
         ]
      ];
      $posts = $this->paginate($this->Posts);

      $this->set(compact('posts'));
      $this->set('_serialize', ['posts']);
   }

   /**
   * View method
   *
   * @param string|null $id Post id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($slug)
   {
      $post = $this->Posts->findBySlug($slug)->first();

      if (empty($post)) {
         throw new NotFoundException(__('Page not found'));
      }


      $this->set('post', $post);
      $this->set('_serialize', ['post']);
   }


   public function oldView($id = null , $slug= null){
      $post = $this->Posts->findById($id)->first();
      return $this->redirect(['action' => 'view', $post->slug], '301');
   }
}
