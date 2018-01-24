<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* PageInfos Controller
*
* @property \App\Model\Table\PageInfosTable $PageInfos
*/
class PageInfosController extends AppController
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
      $query = $this->PageInfos
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query]);
      $this->set('pageInfos', $this->paginate($query));
   }



   /**
   * View method
   *
   * @param string|null $id Page Info id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $pageInfo = $this->PageInfos->get($id, [
         'contain' => []
      ]);

      $this->set('pageInfo', $pageInfo);
      $this->set('_serialize', ['pageInfo']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $pageInfo = $this->PageInfos->newEntity();
      if ($this->request->is('post')) {
         $pageInfo = $this->PageInfos->patchEntity($pageInfo, $this->request->data);
         if ($this->PageInfos->save($pageInfo)) {
            $this->Flash->success(__('The page info has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The page info could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('pageInfo'));
      $this->set('_serialize', ['pageInfo']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Page Info id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $pageInfo = $this->PageInfos->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $pageInfo = $this->PageInfos->patchEntity($pageInfo, $this->request->data);
         if ($this->PageInfos->save($pageInfo)) {
            $this->Flash->success(__('The page info has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The page info could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('pageInfo'));
      $this->set('_serialize', ['pageInfo']);
   }

   /**
   * Delete method
   *
   * @param string|null $id Page Info id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $pageInfo = $this->PageInfos->get($id);
      if ($this->PageInfos->delete($pageInfo)) {
         $this->Flash->success(__('The page info has been deleted.'));
      } else {
         $this->Flash->error(__('The page info could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
