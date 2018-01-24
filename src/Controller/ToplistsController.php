<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
* Toplists Controller
*
* @property \App\Model\Table\ToplistsTable $Toplists
*/
class ToplistsController extends AppController
{


   public function beforeFilter(Event $event)
   {
      parent::beforeFilter($event);
      $this->Auth->allow(['index', 'out', 'in']);
   }
   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function index()
   {
      $this->paginate = [
         'contain' => ['Users'],
         'conditions' => ['Toplists.status' => 'ONLINE'],
         'order'=>['Toplists.in'=>'DESC']
      ];
      $toplists = $this->paginate($this->Toplists);
      $this->set(compact('toplists'));
      $this->set('_serialize', ['toplists']);
   }

   public function out($id) {
      $toplist = $this->Toplists->get($id);
      $toplist->out++;
      $this->Toplists->save($toplist);
      return $this->redirect($toplist->url);
   }

   public function in($id) {
      $toplist = $this->Toplists->get($id);
      $toplist->in++;
      $this->Toplists->save($toplist);
      return $this->redirect("/");
   }
}
