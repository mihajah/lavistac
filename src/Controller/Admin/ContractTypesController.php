<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ContractTypes Controller
 *
 * @property \App\Model\Table\ContractTypesTable $ContractTypes
 */
class ContractTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $contractTypes = $this->paginate($this->ContractTypes);

        $this->set(compact('contractTypes'));
        $this->set('_serialize', ['contractTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Contract Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractType = $this->ContractTypes->get($id, [
            'contain' => ['Contracts']
        ]);

        $this->set('contractType', $contractType);
        $this->set('_serialize', ['contractType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractType = $this->ContractTypes->newEntity();
        if ($this->request->is('post')) {
            $contractType = $this->ContractTypes->patchEntity($contractType, $this->request->data);
            if ($this->ContractTypes->save($contractType)) {
                $this->Flash->success(__('The contract type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contract type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contractType'));
        $this->set('_serialize', ['contractType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractType = $this->ContractTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractType = $this->ContractTypes->patchEntity($contractType, $this->request->data);
            if ($this->ContractTypes->save($contractType)) {
                $this->Flash->success(__('The contract type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contract type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contractType'));
        $this->set('_serialize', ['contractType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractType = $this->ContractTypes->get($id);
        if ($this->ContractTypes->delete($contractType)) {
            $this->Flash->success(__('The contract type has been deleted.'));
        } else {
            $this->Flash->error(__('The contract type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
