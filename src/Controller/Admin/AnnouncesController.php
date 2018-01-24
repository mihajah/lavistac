<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
* Announces Controller
*
* @property \App\Model\Table\AnnouncesTable $Announces
*/
class AnnouncesController extends AppController
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


   public function beOnline($id){
      $announce = $this->Announces->findById($id,[
      ])
      ->first();

      $announce->connected = new Time();
      $this->Announces->save($announce);
      $this->Flash->success(__('Usted ahora está conectado por 3 horas ! - Vous êtes maintenant connecté pendant 3 heures ! - You are now connected for 3 hours !'));
      $this->redirect($this->referer());
      //debug($announce);
   }



   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function index($type, $status = null)
   {
      if(!empty($this->request->query['status'])){
         $query = $this->Announces
         ->find('search', ['search' => $this->request->query])
         ->where(['Announces.type'=>$type, 'Announces.status'=>$this->request->query['status']])
         ->contain(['Users', 'Contracts', 'States', 'Categories', 'Pics'])
         ->order(['Announces.modified'=>'DESC']);
      }else{
         $query = $this->Announces
         ->find('search', ['search' => $this->request->query])
         ->where(['Announces.type'=>$type])
         ->contain(['Users', 'Contracts', 'States', 'Categories', 'Pics'])
         ->order(['Announces.modified'=>'DESC']);
      }
      $this->set('announces', $this->paginate($query));
   }

   /**
   * View method
   *
   * @param string|null $id Announce id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $announce = $this->Announces->get($id, [
         'contain' => ['Users', 'Contracts', 'States', 'Categories', 'Cities', 'Pics']
      ]);

      $this->set('announce', $announce);
      $this->set('_serialize', ['announce']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add($contract_id = null)
   {
      $announce = $this->Announces->newEntity();
      if ($this->request->is('post')) {
         $announce = $this->Announces->patchEntity($announce, $this->request->data);
         if($contract_id){
            $contract = $this->Announces->Contracts->findById($contract_id)->first();
            $announce->user_id = $contract->user_id;
            $announce->contract_id = $contract->id;
         }
         if ($this->Announces->save($announce,  ['checkRules' => false])) {
            $this->Flash->success(__('The announce has been saved.'));

            return $this->redirect(['action' => 'view', $announce->id]);
         } else {
            $this->Flash->error(__('The announce could not be saved. Please, try again.'));
         }
      }
      $states = $this->Announces->States->find('list')->order(['States.name'=>'ASC']);
      $categories = $this->Announces->Categories->find('list', ['limit' => 200]);
      //$cities = $this->Announces->Cities->find('list');

      $this->set(compact('announce','states', 'categories', 'cities', 'contract_id'));
      $this->set('_serialize', ['announce']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Announce id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $announce = $this->Announces->get($id, [
         'contain' => ['Cities', 'Contracts', 'Users']
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $announce = $this->Announces->patchEntity($announce, $this->request->data);
         if ($this->Announces->save($announce)) {
            $this->Flash->success(__('The announce has been saved.'));

            return $this->redirect(['action' => 'view', $announce->id]);
         } else {
            $this->Flash->error(__('The announce could not be saved. Please, try again.'));
         }
      }
      $users = $this->Announces->Users->find('list');
      $contracts = $this->Announces->Contracts->find('list')->order(['Contracts.label'=>'ASC']);
      $states = $this->Announces->States->find('list')->order(['States.name'=>'ASC']);
      $categories = $this->Announces->Categories->find('list');
      $cities = $this->Announces->Cities->find('list')->where(['Cities.state_id'=>$announce->state_id]);
      $this->set(compact('announce', 'users', 'contracts', 'states', 'categories', 'cities'));
      $this->set('_serialize', ['announce']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Announce id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function archived($id)
   {
      $announce = $this->Announces->get($id, [
         'contain' => ['Cities', 'Contracts', 'Users']
      ]);
      $announce->status = 'ARCHIVED';
      $this->Announces->save($announce);
      $this->Flash->success(__('The announce has been archived.'));
      return $this->redirect(['action' => 'index', $announce->type]);
   }

   /**
   * Delete method
   *
   * @param string|null $id Announce id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $announce = $this->Announces->get($id);
      $type = $announce->type;
      if ($this->Announces->delete($announce)) {
         $this->Flash->success(__('The announce has been deleted.'));
      } else {
         $this->Flash->error(__('The announce could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index', $type]);
   }
}
