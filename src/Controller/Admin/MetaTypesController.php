<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MetaTypes Controller
 *
 * @property \App\Model\Table\MetaTypesTable $MetaTypes
 */
class MetaTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $metaTypes = $this->paginate($this->MetaTypes);

        $this->set(compact('metaTypes'));
        $this->set('_serialize', ['metaTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Meta Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metaType = $this->MetaTypes->get($id, [
            'contain' => ['Metas']
        ]);

        $this->set('metaType', $metaType);
        $this->set('_serialize', ['metaType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metaType = $this->MetaTypes->newEntity();
        if ($this->request->is('post')) {
            $metaType = $this->MetaTypes->patchEntity($metaType, $this->request->data);
            if ($this->MetaTypes->save($metaType)) {
                $this->Flash->success(__('The meta type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The meta type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('metaType'));
        $this->set('_serialize', ['metaType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meta Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metaType = $this->MetaTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metaType = $this->MetaTypes->patchEntity($metaType, $this->request->data);
            if ($this->MetaTypes->save($metaType)) {
                $this->Flash->success(__('The meta type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The meta type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('metaType'));
        $this->set('_serialize', ['metaType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meta Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $metaType = $this->MetaTypes->get($id);
        if ($this->MetaTypes->delete($metaType)) {
            $this->Flash->success(__('The meta type has been deleted.'));
        } else {
            $this->Flash->error(__('The meta type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
