<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* Pics Controller
*
* @property \App\Model\Table\PicsTable $Pics
*/
class PicsController extends AppController
{

   /**
   * Index method
   *
   * @return \Cake\Network\Response|null
   */
   public function myPics()
   {
      $pics = $this->Pics->find('all', [
         'contain'=>['Announces'],
         'conditions'=>[
            'Announces.user_id'=>$this->Auth->user('id')
         ]
      ]);
      $this->set(compact('pics'));
      $this->set('_serialize', ['pics']);
   }

   public function replace($id)
   {
      $pic = $this->Pics->get($id, [
         'contain' => ['Announces'],
         'conditions'=>['Announces.user_id'=>$this->Auth->user('id')]
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $pic = $this->Pics->patchEntity($pic, $this->request->data);
         if ($this->Pics->save($pic)) {
            $announce = $this->Pics->Announces->get($pic->announce_id);
            if ($announce->status == 'ONLINE') {
               $announce->status = 'WAITING';
               $this->Pics->Announces->save($announce);
            }
            $this->Flash->success(__('The pic has been saved.'));
            return $this->redirect(['action' => 'myPics']);
         } else {
            if($pic->errors()){
               $error_msg = [];
               foreach( $pic->errors() as $errors){
                  if(is_array($errors)){
                     foreach($errors as $error){
                        $error_msg[]    =   $error;
                     }
                  }else{
                     $error_msg[]    =   $errors;
                  }
               }
            }
            if(!empty($error_msg)){
               $this->Flash->error(
                  __("Please fix the following error(s): ".implode("\n \r", $error_msg))
               );
            }
         }
      }
      $announces = $this->Pics->Announces->find('list', ['limit' => 200]);
      $this->set(compact('pic', 'announces'));
      $this->set('_serialize', ['pic']);
      $this->render('add_replace');
   }

   /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
   public function add($announce_id)
   {
      $pic = $this->Pics->newEntity();
      if ($this->request->is('post')) {
         $pic = $this->Pics->patchEntity($pic, $this->request->data);
         $pic->announce_id = $announce_id;
         if ($this->Pics->save($pic)) {
            $announce = $this->Pics->Announces->get($pic->announce_id);
            if ($announce->status == 'ONLINE') {
               $announce->status = 'WAITING';
               $this->Pics->Announces->save($announce);
            }
            $this->Flash->success(__('The pic has been saved.'));
            return $this->redirect(['action' => 'myPics']);
         } else {
            $this->Flash->error(__('The pic could not be saved. Please, try again.'));
         }
      }
      $this->set(compact('pic'));
      $this->set('_serialize', ['pic']);
      $this->render('add_replace');
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
      $pic = $this->Pics->get($id, [
         'contain' => ['Announces'],
         'conditions'=>['Announces.user_id'=>$this->Auth->user('id')]
      ]);
      if ($this->Pics->delete($pic)) {
         $this->Flash->success(__('The pic has been deleted.'));
      } else {
         $this->Flash->error(__('The pic could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'myPics']);
   }
}
