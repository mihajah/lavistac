<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link      http://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Core\Configure;
use Cake\Controller\Component\CookieComponent;
use Jaybizzle\CrawlerDetect\CrawlerDetect;


/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{

   /**
   * Initialization hook method.
   *
   * Use this method to add common initialization code like loading components.
   *
   * e.g. `$this->loadComponent('Security');`
   *
   * @return void
   */
   public function initialize()
   {
      parent::initialize();


      $this->loadComponent('RequestHandler');
      $this->loadComponent('Flash');
      $this->loadComponent('Cookie');
      $this->loadComponent('Auth',[
         'authorize' => ['Controller'],
         'authenticate' => [
            'Form' => [
               'fields' => ['username' => 'email'],
               'passwordHasher' => 'Legacy'
            ]
         ],
         'loginAction' => [
            'controller' => 'Users',
            'action' => 'login',
            'prefix'=>false
         ],
         'logoutRedirect' => [
            'controller' => 'Pages', 'action' => 'display', 'home'
         ],
         'authError' => __('You are not authorized to do this! Update your contract.'),
         'authRedirect'=>[
            'controller'=>'Users',
            'action'=>'dashboard'
         ],
         'storage' => 'Session'
      ]);

      $this->crawlerDetect = new CrawlerDetect;
      /*
      * Enable the following components for recommended CakePHP security settings.
      * see http://book.cakephp.org/3.0/en/controllers/components/security.html
      */
      //$this->loadComponent('Security');
      //$this->loadComponent('Csrf');
   }

   public function beforeFilter(Event $event)
   {
      $this->Auth->allow(['display', 'acceptLegal', 'recover']);

      if(!empty($this->Auth)){
         $this->set('connected', $this->Auth->user());
      }else{
         $this->set('connected', '');
      }

      if($this->Cookie->read('LOveSita') !== null){
         $accepted = $this->Cookie->read('LOveSita');
      }elseif ($this->crawlerDetect->isCrawler()) {
         $accepted = true;
      }else{

         //temp
         $accepted = false;
      }

      $this->set('isAccepted', $accepted);

   }


   public function acceptLegal(){
      $this->Cookie->config([
         'expires' => '+1 hours',
         'httpOnly' => false
      ]);
      $this->Cookie->write('LOveSita', true);
   }


   /**
   * Before render callback.
   *
   * @param \Cake\Event\Event $event The beforeRender event.
   * @return \Cake\Network\Response|null|void
   */
   public function beforeRender(Event $event)
   {
      if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
         $this->set('_serialize', true);
      }
      $this->set("referer", $this->referer());
   }

   public function isAuthorized($user)
   {
      if (isset($user['group_id'])){
         switch ($user['group_id']) {
            case 1:
            return true;
            break;

            case 2:
            return in_array($this->request->controller."/".$this->request->action, Configure::read('Member.allowed'));
            break;

            case 4:
            return in_array($this->request->controller."/".$this->request->action, Configure::read('FreeMember.allowed'));
            break;

            default:
            return false;
            break;
         }
      }else{
         return false;
      }
   }
}
