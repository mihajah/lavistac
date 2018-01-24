<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Toplists Controller
 *
 * @property \App\Model\Table\ToplistsTable $Toplists
 */
class ToplistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $toplists = $this->paginate($this->Toplists);

        $this->set(compact('toplists'));
        $this->set('_serialize', ['toplists']);
    }

    /**
     * View method
     *
     * @param string|null $id Toplist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $toplist = $this->Toplists->get($id, [
            'contain' => ['Users']
        ]);

        $this->loadModel('Banners');
        $banners = $this->Banners->find('all');
        $this->set('banners', $banners);

        $this->set('toplist', $toplist);
        $this->set('_serialize', ['toplist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $toplist = $this->Toplists->newEntity();
        if ($this->request->is('post')) {
            $toplist = $this->Toplists->patchEntity($toplist, $this->request->data);
            if ($this->Toplists->save($toplist)) {
                $this->Flash->success(__('The toplist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The toplist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('toplist'));
        $this->set('_serialize', ['toplist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Toplist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $toplist = $this->Toplists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $toplist = $this->Toplists->patchEntity($toplist, $this->request->data);
            if ($this->Toplists->save($toplist)) {
                $this->Flash->success(__('The toplist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The toplist could not be saved. Please, try again.'));
            }
        }
        $users = $this->Toplists->Users->find('list');
        $this->set(compact('toplist', 'users'));
        $this->set('_serialize', ['toplist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Toplist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $toplist = $this->Toplists->get($id);
        if ($this->Toplists->delete($toplist)) {
            $this->Flash->success(__('The toplist has been deleted.'));
        } else {
            $this->Flash->error(__('The toplist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
