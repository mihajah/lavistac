<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;


/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 */
class AdsController extends AppController
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
   public function index($type_id)
   {
      //debug($this->request->query);
      $query = $this->Ads
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query])
      ->contain(['AdTypes'])
      ->where(['Ads.ad_type_id'=>$type_id])
      ->order(['Ads.modified'=>'DESC']);

       $this->set('type', $this->Ads->AdTypes->get($type_id));
      $this->set('ads', $this->paginate($query));
   }


    /*
    public function index($type_id)
    {
        $this->paginate = [
            'contain' => ['AdTypes', 'Contracts', 'States', 'Categories'],
            'conditions'=>['Ads.ad_type_id'=>$type_id],
            'order'=>['Ads.modified'=>'DESC']
        ];
        $ads = $this->paginate($this->Ads);
        $this->set('type', $this->Ads->AdTypes->get($type_id));
        $this->set(compact('ads'));
        $this->set('_serialize', ['ads']);
    }
    **/

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
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($contract_id = null)
    {
        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));
                if($contract_id){
                   return $this->redirect(['controller'=>'contracts','action' => 'view',$contract_id]);
                }else{
                   return $this->redirect(['action' => 'view', $ad->id]);
                }
            } else {
                $this->Flash->error(__('The ad could not be saved. Please, try again.'));
            }
        }
        $adTypes = $this->Ads->AdTypes->find('list', ['limit' => 200]);
        if($contract_id){
           $contracts = $this->Ads->Contracts->find('list')->where(['Contracts.active'=>true, 'Contracts.id'=>$contract_id])->order(['label'=>'ASC']);
           $contract = $this->Ads->Contracts->find('all',[
             'contain'=>['Announces'],
             'conditions'=>['Contracts.id'=>$contract_id]
          ])
          ->first();
          $this->set('default_url' , Configure::read('site_url')."escort/".$contract->announces[0]->slug);
        }else{
           $contracts = $this->Ads->Contracts->find('list')->where(['Contracts.active'=>true])->order(['label'=>'ASC']);
        }
        $states = $this->Ads->States->find('list', ['limit' => 200]);
        $categories = $this->Ads->Categories->find('list', ['limit' => 200]);
        $this->set(compact('ad', 'adTypes', 'contracts', 'states', 'categories'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
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

                return $this->redirect(['action' => 'view', $ad->id]);
            } else {
                $this->Flash->error(__('The ad could not be saved. Please, try again.'));
            }
        }
        $adTypes = $this->Ads->AdTypes->find('list', ['limit' => 200]);
        $contracts = $this->Ads->Contracts->find('list')->where(['Contracts.active'=>true])->order(['label'=>'ASC']);
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
        return $this->redirect(['action' => 'index', $ad->ad_type_id]);
    }
}
