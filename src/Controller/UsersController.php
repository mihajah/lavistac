<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
{


   use MailerAwareTrait;
   /**
   * Edit method
   *
   * @param string|null $id User id.
   * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id = null)
   {
      $user = $this->Users->get($id, [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $user = $this->Users->patchEntity($user, $this->request->data);
         if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
         } else {
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }
      }
      $groups = $this->Users->Groups->find('list', ['limit' => 200]);
      $this->set(compact('user', 'groups'));
      $this->set('_serialize', ['user']);
   }


   public function login()
   {
      if ($this->request->is('post')) {
         $user = $this->Auth->identify();
         if ($user) {
            $this->Auth->setUser($user);
            if($user['group_id'] == 1){
               return $this->redirect(['controller'=>'dashboard', 'action' => 'index', 'prefix'=>'admin']);
            }else{
               $user_with_ip = $this->Users->get($user['id']);
               $user_with_ip->ip_address = $this->request->clientIp();
               $this->Users->save($user_with_ip);
               return $this->redirect(['controller'=>'Announces', 'action' => 'myAnnounce']);
            }
         } else {
            $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect"), [
               'key' => 'auth'
            ]);
         }
      }
      //debug($this->Auth->user());
   }


   public function logout()
   {
      return $this->redirect($this->Auth->logout());
   }

   public function recover()
   {
      if ($this->request->is('post')) {
         $test_user = $this->Users->findByEmail($this->request->data['email']);
         if (!empty($test_user->first())) {
            //set new password
            $user = $this->Users->get($test_user->first()->id);
            $new_password = $this->_generatePassword(5);
            $user->password = $new_password;
            $this->Users->save($user);
            $this->getMailer('User')->send('resetPassword', [$user, $new_password]);
            $this->Flash->success('New password sent !');
            return $this->redirect(array('action' => 'login'));
         } else {
            $this->Flash->error(__('User not found :-/'));
            return $this->redirect(array('action' => 'login'));
         }
      }
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

   public function changePassword(){
      $user = $this->Users->get($this->Auth->user('id'), [
         'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $user = $this->Users->patchEntity($user, $this->request->data);
         if ($this->Users->save($user)) {
            $this->Flash->success(__('The password has been saved.'));
         } else {
            $this->Flash->error(__('The password could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
   }

}
