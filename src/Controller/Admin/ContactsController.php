<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* Contacts Controller
*
* @property \App\Model\Table\ContactsTable $Contacts
*/
class ContactsController extends AppController
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
      $query = $this->Contacts
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query])
      ->order(['Contacts.id'=>'DESC']);
      $this->set('contacts', $this->paginate($query));
   }


   /**
   * View method
   *
   * @param string|null $id Contact id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $contact = $this->Contacts->get($id, [
         'contain' => []
      ]);

      $this->set('contact', $contact);
      $this->set('_serialize', ['contact']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $contact = $this->Contacts->newEntity();
      if ($this->request->is('post')) {
         $contact = $this->Contacts->patchEntity($contact, $this->request->data);
         if ($this->Contacts->save($contact)) {
            $this->Flash->success(__('The contact has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('contact'));
      $this->set('_serialize', ['contact']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Contact id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $contact = $this->Contacts->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $contact = $this->Contacts->patchEntity($contact, $this->request->data);
         if ($this->Contacts->save($contact)) {
            $this->Flash->success(__('The contact has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('contact'));
      $this->set('_serialize', ['contact']);
   }

   /**
   * Delete method
   *
   * @param string|null $id Contact id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $contact = $this->Contacts->get($id);
      if ($this->Contacts->delete($contact)) {
         $this->Flash->success(__('The contact has been deleted.'));
      } else {
         $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
