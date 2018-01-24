<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* Metas Controller
*
* @property \App\Model\Table\MetasTable $Metas
*/
class MetasController extends AppController
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
      $query = $this->Metas
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query])
      ->contain(['MetaTypes']);
      $this->set('metas', $this->paginate($query));
   }


   /**
   * View method
   *
   * @param string|null $id Meta id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $meta = $this->Metas->get($id, [
         'contain' => ['MetaTypes']
      ]);

      $this->set('meta', $meta);
      $this->set('_serialize', ['meta']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $meta = $this->Metas->newEntity();
      if ($this->request->is('post')) {
         $meta = $this->Metas->patchEntity($meta, $this->request->data);
         if ($this->Metas->save($meta)) {
            $this->Flash->success(__('The meta has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The meta could not be saved. Please, try again.'));
         }
      }
      $metaTypes = $this->Metas->MetaTypes->find('list', ['limit' => 200]);
      $this->set(compact('meta', 'metaTypes'));
      $this->set('_serialize', ['meta']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Meta id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $meta = $this->Metas->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $meta = $this->Metas->patchEntity($meta, $this->request->data);
         if ($this->Metas->save($meta)) {
            $this->Flash->success(__('The meta has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The meta could not be saved. Please, try again.'));
         }
      }
      $metaTypes = $this->Metas->MetaTypes->find('list', ['limit' => 200]);
      $this->set(compact('meta', 'metaTypes'));
      $this->set('_serialize', ['meta']);
   }

   /**
   * Delete method
   *
   * @param string|null $id Meta id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $meta = $this->Metas->get($id);
      if ($this->Metas->delete($meta)) {
         $this->Flash->success(__('The meta has been deleted.'));
      } else {
         $this->Flash->error(__('The meta could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
