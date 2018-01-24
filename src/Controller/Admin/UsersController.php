<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
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
      $query = $this->Users
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query])
      ->contain(['Groups']);
      $this->set('users', $this->paginate($query));
   }

   public function changePassword($id){
      $user = $this->Users->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $user = $this->Users->patchEntity($user, $this->request->data);
         if ($this->Users->save($user)) {
            $this->Flash->success(__('The password has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The password could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
   }



   public function autoComplete(){

      //$this->autoRender = false;
      $name = $this->request->query['q'];
      $users = $this->Users->find()
      ->where(['email LIKE' => $name."%"])
      ->toArray();

      foreach($users as &$user){
         $user->text = $user->email;
      }

      $this->set('users', $users);
      $this->response->type('application/json');
      $this->set('_serialize', ['users']);

   }


   /**
   * View method
   *
   * @param string|null $id User id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $user = $this->Users->get($id, [
         'contain' => ['Groups', 'Announces', 'Contracts', 'Toplists']
      ]);

      $this->set('user', $user);
      $this->set('_serialize', ['user']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $user = $this->Users->newEntity();
      if ($this->request->is('post')) {
         $user = $this->Users->patchEntity($user, $this->request->data);
         if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }
      }
      $groups = $this->Users->Groups->find('list', ['limit' => 200]);
      $this->set(compact('user', 'groups'));
      $this->set('_serialize', ['user']);
   }

   /**
   * Edit method
   *
   * @param string|null $id User id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $user = $this->Users->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $user = $this->Users->patchEntity($user, $this->request->data);
         if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }
      }
      $groups = $this->Users->Groups->find('list', ['limit' => 200]);
      $this->set(compact('user', 'groups'));
      $this->set('_serialize', ['user']);
   }

   /**
   * Delete method
   *
   * @param string|null $id User id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $user = $this->Users->get($id);
      if ($this->Users->delete($user)) {
         $this->Flash->success(__('The user has been deleted.'));
      } else {
         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
