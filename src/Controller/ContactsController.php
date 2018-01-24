<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
* Contacts Controller
*
* @property \App\Model\Table\ContactsTable $Contacts
*/
class ContactsController extends AppController
{

   use MailerAwareTrait;

   public function beforeFilter(Event $event)
   {
      parent::beforeFilter($event);
      $this->Auth->allow(['add']);
   }
   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add()
   {
      $contact = $this->Contacts->newEntity();
      if ($this->request->is('post')) {
         $contact = $this->Contacts->patchEntity($contact, $this->request->data);
         if ($this->Contacts->save($contact)) {
            $this->Flash->success(__('Merci pour votre message, nous vous contacterons prochainement.'));
            $this->getMailer('User')->send('message', ['Nouveau message depuis le site', $contact]);
            return $this->redirect(['controller'=>'pages', 'action'=>'display', 'home']);
         } else {
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('contact'));
      $this->set('_serialize', ['contact']);
   }
}
