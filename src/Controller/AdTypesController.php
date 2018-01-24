<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdTypes Controller
 *
 * @property \App\Model\Table\AdTypesTable $AdTypes
 */
class AdTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $adTypes = $this->paginate($this->AdTypes);

        $this->set(compact('adTypes'));
        $this->set('_serialize', ['adTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adType = $this->AdTypes->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('adType', $adType);
        $this->set('_serialize', ['adType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adType = $this->AdTypes->newEntity();
        if ($this->request->is('post')) {
            $adType = $this->AdTypes->patchEntity($adType, $this->request->data);
            if ($this->AdTypes->save($adType)) {
                $this->Flash->success(__('The ad type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad type could not be saved. Please, try again.'));
        }
        $this->set(compact('adType'));
        $this->set('_serialize', ['adType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adType = $this->AdTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adType = $this->AdTypes->patchEntity($adType, $this->request->data);
            if ($this->AdTypes->save($adType)) {
                $this->Flash->success(__('The ad type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad type could not be saved. Please, try again.'));
        }
        $this->set(compact('adType'));
        $this->set('_serialize', ['adType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adType = $this->AdTypes->get($id);
        if ($this->AdTypes->delete($adType)) {
            $this->Flash->success(__('The ad type has been deleted.'));
        } else {
            $this->Flash->error(__('The ad type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
