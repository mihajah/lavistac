<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 */
class AdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdTypes', 'Contracts', 'States', 'Categories']
        ];
        $ads = $this->paginate($this->Ads);

        $this->set(compact('ads'));
        $this->set('_serialize', ['ads']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => ['AdTypes', 'Contracts', 'States', 'Categories']
        ]);

        $this->set('ad', $ad);
        $this->set('_serialize', ['ad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }
        $adTypes = $this->Ads->AdTypes->find('list', ['limit' => 200]);
        $contracts = $this->Ads->Contracts->find('list', ['limit' => 200]);
        $states = $this->Ads->States->find('list', ['limit' => 200]);
        $categories = $this->Ads->Categories->find('list', ['limit' => 200]);
        $this->set(compact('ad', 'adTypes', 'contracts', 'states', 'categories'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }
        $adTypes = $this->Ads->AdTypes->find('list', ['limit' => 200]);
        $contracts = $this->Ads->Contracts->find('list', ['limit' => 200]);
        $states = $this->Ads->States->find('list', ['limit' => 200]);
        $categories = $this->Ads->Categories->find('list', ['limit' => 200]);
        $this->set(compact('ad', 'adTypes', 'contracts', 'states', 'categories'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        if ($this->Ads->delete($ad)) {
            $this->Flash->success(__('The ad has been deleted.'));
        } else {
            $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
