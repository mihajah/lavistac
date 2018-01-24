<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* States Controller
*
* @property \App\Model\Table\StatesTable $States
*/
class StatesController extends AppController
{

   public function initialize()
   {
      parent::initialize();
      $this->loadComponent('Search.Prg', [
         // This is default config. You can modify "actions" as needed to make
         // the PRG component work only for specified methods.
         'actions' => ['index']
      ]);
   }

   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function index()
   {
      //debug($this->request->query);
      $query = $this->States
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query]);
      $this->set('states', $this->paginate($query));
   }


   public function slug(){
      $states = $this->States->find('all');
      foreach ($states as $state) {

         $state->modified = time();
         $this->States->save($state);
         # code...
      }
   }

   /**
   * View method
   *
   * @param string|null $id State id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $state = $this->States->get($id, [
         'contain' => ['Ads', 'Announces', 'Cities']
      ]);

      $this->set('state', $state);
      $this->set('_serialize', ['state']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $state = $this->States->newEntity();
      if ($this->request->is('post')) {
         $state = $this->States->patchEntity($state, $this->request->data);
         if ($this->States->save($state)) {
            $this->Flash->success(__('The state has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('state'));
      $this->set('_serialize', ['state']);
   }

   /**
   * Edit method
   *
   * @param string|null $id State id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $state = $this->States->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $state = $this->States->patchEntity($state, $this->request->data);
         if ($this->States->save($state)) {
            $this->Flash->success(__('The state has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('state'));
      $this->set('_serialize', ['state']);
   }

   /**
   * Delete method
   *
   * @param string|null $id State id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $state = $this->States->get($id);
      if ($this->States->delete($state)) {
         $this->Flash->success(__('The state has been deleted.'));
      } else {
         $this->Flash->error(__('The state could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
