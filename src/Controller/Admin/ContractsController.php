<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\I18n\Time;


/**
* Contracts Controller
*
* @property \App\Model\Table\ContractsTable $Contracts
*/
class ContractsController extends AppController
{
   use MailerAwareTrait;


   public function initialize()
   {
      parent::initialize();
      $this->loadComponent('Search.Prg', [
         // This is default config. You can modify "actions" as needed to make
         // the PRG component work only for specified methods.
         'actions' => ['index']
      ]);
   }

   public function autoComplete(){

      //$this->autoRender = false;
      $name = $this->request->query['q'];
      $contracts = $this->Contracts->find()
      ->where(['label LIKE' => $name."%"])
      ->toArray();

      foreach($contracts as &$contract){
         $contract->text = $contract->label;
      }

      $this->set('contracts', $contracts);
      $this->response->type('application/json');
      $this->set('_serialize', ['contracts']);

   }


   public function checkValidity(){
      $contracts = $this->Contracts->find('all', [
         'contain'=>[
            'Ads'=>['States', 'Categories', 'Contracts'], 'Announces'=>['Pics', 'Users', 'Contracts', 'States', 'Categories']
         ],
         'conditions'=>[
            'Contracts.active'=>true
         ]
      ]);

      $announces_not_right = [];
      $ads_not_right = [];

      $now = new Time();

      foreach ($contracts as $contract) {

         if($contract->end < $now){
            foreach ($contract->announces as $announce) {
               if($announce->status == 'ONLINE'){
                  $announces_not_right[] = $announce;
               }
            }

            foreach ($contract->ads as $ads) {
               if($ads->active == true){
                  $ads_not_right[] = $ads;
               }
            }
         }

         $this->set('announces', $announces_not_right);
         $this->set('ads', $ads_not_right);
      }
   }

   public function management($announce_id)
   {
      $this->loadModel('Announces');
      $announce = $this->Announces->get($announce_id);

      if(empty($announce->contract_id)){
         return $this->redirect(['action' => 'setContractAndUser', $announce_id]);
      }else{
         return $this->redirect(['action' => 'edit', $announce->contract_id]);
      }
   }


   public function setContractAndUser($announce_id){
      $this->loadModel('Notifications');
      $this->loadModel('Announces');
      $announce = $this->Announces->get($announce_id);
      $contract = $this->Contracts->newEntity();
      if ($this->request->is('post')) {

         //user creation
         //$user = $this->Contracts->Users->newEntity();
         $pass = $this->_generatePassword(6);
         $this->request->data['user']['active'] = true;
         $this->request->data['user']['password'] = $pass;
         $this->request->data['label'] = 'label';

         $contract = $this->Contracts->patchEntity($contract, $this->request->data);
         $start =$this->request->data['start']['day']."/".$this->request->data['start']['month']."/".$this->request->data['start']['year'];
         $end =  $this->request->data['end']['day']."/".$this->request->data['end']['month']."/".$this->request->data['end']['year'];

         $contract->label = $announce->email." | ".$start." - ".$end;

         if ($this->Contracts->save($contract)) {
            $announce->status = $this->request->data['announce']['status'];
            $announce->user_id = $contract->user_id;
            $announce->contract_id = $contract->id;
            $this->Announces->save($announce);
            $this->Flash->success(__('The contract & the user has been saved.'));

            //notifications
            if(!empty($this->request->data['notification_id'])){
               $notification = $this->Notifications->findById($this->request->data['notification_id'])->first();
               if($notification->id == 3){
                  $this->getMailer('User')->send('welcome', [$announce->email, $notification->subject, $notification->message, $announce->email, $pass]);
               }else{
                  $this->getMailer('User')->send('notification', [$announce->email, $notification->subject, $notification->message]);
               }
            }
            return $this->redirect(['controller'=>'announces','action' => 'view', $announce_id]);
         } else {
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
         }


      }
      $contractTypes = $this->Contracts->ContractTypes->find('list', ['limit' => 200]);
      //$contract->user->email = $announce->email;
      $notifications = $this->Notifications->find('list', ['limit' => 200])->order(['Notifications.subject'=>'ASC']);
      $groups = $this->Contracts->Users->Groups->find('list', ['limit' => 200])->where(['Groups.id <>'=> 1]);

      $this->set(compact('contract', 'contractTypes', 'announce', 'notifications', 'groups'));
      $this->set('_serialize', ['contract']);
   }


   /**
   * génération du password
   */
   private function _generatePassword($length = 8)
   {
      $password = "";
      $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
      $maxlength = strlen($possible);
      if ($length > $maxlength) {
         $length = $maxlength;
      }
      $i = 0;
      while ($i < $length) {
         $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
         if (!strstr($password, $char)) {
            $password .= $char;
            $i++;
         }
      }
      return $password;
   }

   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function index()
   {
      //debug($this->request->query);
      $query = $this->Contracts
      // Use the plugins 'search' custom finder and pass in the
      // processed query params
      ->find('search', ['search' => $this->request->query])
      ->contain(['ContractTypes', 'Users'])
      ->order(['Contracts.modified'=>'DESC']);
      $this->set('contracts', $this->paginate($query));
   }

   /**
   * View method
   *
   * @param string|null $id Contract id.
   * @return \Cake\Network\Response|null
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function view($id = null)
   {
      $contract = $this->Contracts->get($id, [
         'contain' => ['ContractTypes', 'Users', 'Ads'=>['AdTypes', 'Categories'], 'Announces'=>['Pics']]
      ]);

      $this->set('contract', $contract);
      $this->set('_serialize', ['contract']);
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $contract = $this->Contracts->newEntity();
      if ($this->request->is('post')) {
         $contract = $this->Contracts->patchEntity($contract, $this->request->data);

         $start =$this->request->data['start']['day']."/".$this->request->data['start']['month']."/".$this->request->data['start']['year'];
         $end =  $this->request->data['end']['day']."/".$this->request->data['end']['month']."/".$this->request->data['end']['year'];


         if ($this->Contracts->save($contract)) {
            $this->Flash->success(__('The contract has been saved.'));

            return $this->redirect(['action' => 'view', $contract->id]);
         } else {
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
         }

      }
      $contractTypes = $this->Contracts->ContractTypes->find('list', ['limit' => 200]);
      $users = $this->Contracts->Users->find('list', ['limit' => 200]);
      $this->set(compact('contract', 'contractTypes', 'users'));
      $this->set('_serialize', ['contract']);
   }

   /**
   * Edit method
   *
   * @param string|null $id Contract id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $this->loadModel('Notifications');
      $contract = $this->Contracts->get($id, [
         'contain' => ['Users', 'Announces', 'Ads']
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $contract = $this->Contracts->patchEntity($contract, $this->request->data);

         $start =$this->request->data['start']['day']."/".$this->request->data['start']['month']."/".$this->request->data['start']['year'];
         $end =  $this->request->data['end']['day']."/".$this->request->data['end']['month']."/".$this->request->data['end']['year'];
         $contract->label = $contract->user->email." | ".$start." - ".$end;
         if ($this->Contracts->save($contract)) {
            $this->Flash->success(__('The contract has been saved.'));

            if(!empty($this->request->data['announce_status'])){
               $this->__updateAnnouncesStatus($contract, $this->request->data['announce_status']);
            }

            if($this->request->data['ads_active']){
               $this->__updateAdsStatus($contract, true);
            }else{
               $this->__updateAdsStatus($contract, false);
            }

            if(!empty($this->request->data['notification_id'])){
               $notification = $this->Notifications->findById($this->request->data['notification_id'])->first();
               $this->getMailer('User')->send('notification', [$contract->user->email, $notification->subject, $notification->message]);
            }

            return $this->redirect(['action' => 'view', $id]);
         } else {
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
         }
      }
      $contractTypes = $this->Contracts->ContractTypes->find('list', ['limit' => 200]);
      $users = $this->Contracts->Users->find('list')->where(['Users.active'=>true])->order(['Users.email'=>'ASC']);
      $notifications = $this->Notifications->find('list', ['limit' => 200])->order(['Notifications.subject'=>'ASC']);
      $this->set(compact('contract', 'contractTypes', 'users', 'notifications'));
      $this->set('_serialize', ['contract']);
   }


   private function __updateAnnouncesStatus($contract, $status){
      foreach ($contract->announces as $announce) {
         $announce->status = $status;
         $this->Contracts->Announces->save($announce);
      }
   }

   private function __updateAdsStatus($contract, $status){
      foreach ($contract->ads as $ad) {
         $ad->active = $status;
         $this->Contracts->Ads->save($ad);
      }
   }

   /**
   * Delete method
   *
   * @param string|null $id Contract id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $contract = $this->Contracts->get($id);
      if ($this->Contracts->delete($contract)) {
         $this->Flash->success(__('The contract has been deleted.'));
      } else {
         $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
   }
}
