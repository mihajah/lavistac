<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* Pics Controller
*
* @property \App\Model\Table\PicsTable $Pics
*/
class PicsController extends AppController
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

   public function addToAnnounce($announce_id)
   {
      $pic = $this->Pics->newEntity();
      $pic->announce_id = $announce_id;
      if ($this->request->is('post')) {
         $pic = $this->Pics->patchEntity($pic, $this->request->data);
         if ($this->Pics->save($pic)) {
            $this->Flash->success(__('The pic has been saved.'));
            return $this->redirect(['controller'=>'announces','action' => 'view', $announce_id]);
         } else {
            $this->Flash->error(__('The pic could not be saved. Please, try again.'));
         }
      }
      $announces = $this->Pics->Announces->find('list', ['limit' => 200]);
      $this->set(compact('pic', 'announces'));
      $this->set('_serialize', ['pic']);
   }

   public function editToAnnounce($id, $announce_id)
   {
      $pic = $this->Pics->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $pic = $this->Pics->patchEntity($pic, $this->request->data);
         if ($this->Pics->save($pic)) {
            $this->Flash->success(__('The pic has been saved.'));

            return $this->redirect(['controller'=>'announces','action' => 'view', $announce_id]);
         } else {
            $this->Flash->error(__('The pic could not be saved. Please, try again.'));
         }
      }
      $announces = $this->Pics->Announces->find('list');
      $this->set(compact('pic', 'announces'));
      $this->set('_serialize', ['pic']);
      $this->render('edit');
   }

   public function deleteToAnnounce($id, $announce_id)
   {

      $this->request->allowMethod(['post', 'delete']);
      $pic = $this->Pics->get($id);
      if ($this->Pics->delete($pic)) {
         $this->Flash->success(__('The pic has been deleted.'));
      } else {
         $this->Flash->error(__('The pic could not be deleted. Please, try again.'));
      }

      return $this->redirect(['controller'=>'announces','action' => 'view', $announce_id]);
   }

   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function index()
   {
      //debug($this->request->query);
      $query = $this->Pics
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query])
      ->contain(['Announces'])
      ->order(['Pics.modified' => 'DESC'])
      ->limit(['limit'=>100]);
      $this->set('pics', $this->paginate($query, ['limit'=>24]));
   }


   /**
   * View method
   *
   * @param string|null $id Pic id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $pic = $this->Pics->get($id, [
         'contain' => ['Announces']
      ]);

      $this->set('pic', $pic);
      $this->set('_serialize', ['pic']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $pic = $this->Pics->newEntity();
      if ($this->request->is('post')) {
         $pic = $this->Pics->patchEntity($pic, $this->request->data);
         if ($this->Pics->save($pic)) {
            $this->Flash->success(__('The pic has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The pic could not be saved. Please, try again.'));
         }
      }
      $announces = $this->Pics->Announces->find('list', ['limit' => 200]);
      $this->set(compact('pic', 'announces'));
      $this->set('_serialize', ['pic']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Pic id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $pic = $this->Pics->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $pic = $this->Pics->patchEntity($pic, $this->request->data);
         if ($this->Pics->save($pic)) {
            $this->Flash->success(__('The pic has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The pic could not be saved. Please, try again.'));
         }
      }
      $announces = $this->Pics->Announces->find('list');
      $this->set(compact('pic', 'announces'));
      $this->set('_serialize', ['pic']);
   }

   /**
   * Delete method
   *
   * @param string|null $id Pic id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $pic = $this->Pics->get($id);
      if ($this->Pics->delete($pic)) {
         $this->Flash->success(__('The pic has been deleted.'));
      } else {
         $this->Flash->error(__('The pic could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
