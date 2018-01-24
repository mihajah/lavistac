<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\Mailer\MailerAwareTrait;
use Cake\Utility\Inflector;


/**
* Announces Controller
*
* @property \App\Model\Table\AnnouncesTable $Announces
*/
class AnnouncesController extends AppController
{
  use MailerAwareTrait;

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'freeIndex', 'view', 'freeView', 'add', 'getCities', 'preview', 'oldView', 'oldFreeView']);
  }
  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index($cat, $state = null, $city = null)
  {
    //adjust limit for egp only, too much request
    $here  = trim(str_replace('/', '', $this->request->here));
    $limit = 200; 
    if($here == 'escort-girl-paris')
    {
      $limit = 200;
    }

    $cat = $this->Announces->Categories->findBySlug($cat)->first();
    if (empty($cat)) {
      throw new NotFoundException(__('Page not found'));
    }
    if(!empty($city)){
      $city = $this->Announces->Cities->findBySlug($city,[
        'contain'=>['Cities']
        ])->first();
        if (empty($city)) {
          throw new NotFoundException(__('Page not found'));
        }
      }

      if(empty($state) && empty($city)){
        $announces_connected = $this->Announces->find('all',[
          'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
          'conditions'=>[
            'Announces.type'=>'PAYING',
            'Announces.status' => 'ONLINE',
            'Announces.connected >' => new Time('3 hours ago'),
            'Categories.slug' => $cat->slug,
          ],
          'limit'=>$limit
        ])
        ->cache('connected_'.$cat->slug, 'short')
        ->order('rand()');

        $announces_online = $this->Announces->find('all',[
          'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
          'conditions'=>[
            'Announces.type'=>'PAYING',
            'Announces.status' => 'ONLINE',
            'OR' => [
              'Announces.connected <'=> new Time('3 hours ago'),
              'Announces.connected IS'=> NULL
            ],
            'Categories.slug' => $cat->slug,
            'Contracts.contract_type_id'=>8
          ],
          'limit'=>$limit
        ])
        ->cache('online_'.$cat->slug, 'short')
        ->order('rand()');

        /*
        $announces_turbo = $this->Announces->find('all',[
        'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
        'conditions'=>[
        'Announces.type'=>'PAYING',
        'Announces.status' => 'ONLINE',
        'Categories.slug' => $cat->slug,
        'Contracts.contract_type_id'=>6
      ],
      'limit'=>200
    ])
    ->cache('turbo_'.$cat->slug, 'short')
    ->order('rand()');
    */

    $announces_vista = $this->Announces->find('all',[
      'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
      'conditions'=>[
        'Announces.type'=>'PAYING',
        'Announces.status' => 'ONLINE',
        'Categories.slug' => $cat->slug,
        'Contracts.contract_type_id'=>4
      ],
      'limit'=>$limit
    ])
    ->order('rand()');

    $announces_paying = $this->Announces->find('all',[
      'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
      'conditions'=>[
        'Announces.type'=>'PAYING',
        'Announces.status' => 'ONLINE',
        'Categories.slug' => $cat->slug,
        'Contracts.contract_type_id'=>2
      ],
      'limit'=>$limit
    ])
    ->cache('paying_'.$cat->slug, 'short')
    ->order('rand()');

    if($announces_paying->isEmpty() && $announces_vista->isEmpty() && $announces_online->isEmpty() && $announces_connected->isEmpty()){
      $announces_free = $this->Announces->find('all',[
        'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
        'conditions'=>[
          'Announces.type'=>'FREE',
          'Announces.status' => 'ONLINE',
          'Categories.slug' => $cat->slug
        ],
        'limit'=>$limit
      ])
      ->cache('free_'.$cat->slug, 'short')
      ->order('rand()');
    }

    //->cache('index_cat_'.$cat_id, 'short');
  } elseif(empty($city)){
    $announces_connected = $this->Announces->find('all',[
      'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
      'conditions'=>[
        'Announces.type'=>'PAYING',
        'Announces.status' => 'ONLINE',
        'Announces.connected >'=> new Time('3 hours ago'),
        'Categories.slug' => $cat->slug,
        'States.slug' => $state
        //'Contracts.contract_type_id'=>8
      ],
      'limit'=>$limit
    ])
    ->cache('connected_'.$cat->slug."_".$state, 'short')
    ->order('rand()');

    $announces_online = $this->Announces->find('all',[
      'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
      'conditions'=>[
        'Announces.type'=>'PAYING',
        'Announces.status' => 'ONLINE',
        'Categories.slug' => $cat->slug,
        'States.slug' => $state,
        'Contracts.contract_type_id'=>8,
        'OR' => [
          'Announces.connected <'=> new Time('3 hours ago'),
          'Announces.connected IS'=> NULL
        ],
      ],
      'limit'=>$limit
    ])
    ->cache('online_'.$cat->slug."_".$state, 'short')
    ->order('rand()');

    /*
    $announces_turbo = $this->Announces->find('all',[
    'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
    'conditions'=>[
    'Announces.type'=>'PAYING',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state,
    'Contracts.contract_type_id'=>6
  ],
  'limit'=>200
])
->cache('turbo_'.$cat->slug."_".$state, 'short')
->order('rand()');
*/

$announces_vista = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
    'Announces.type'=>'PAYING',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state,
    'Contracts.contract_type_id'=>4
  ],
  'limit'=>$limit
])
->cache('vista_'.$cat->slug."_".$state, 'short')
->order('rand()');

$announces_paying = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
    'Announces.type'=>'PAYING',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state,
    'Contracts.contract_type_id'=>2
  ],
  'limit'=>$limit
])
->cache('paying_'.$cat->slug."_".$state, 'short')
->order('rand()');


$announces_free = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
    'Announces.type'=>'FREE',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state
  ],
  'limit'=>$limit
])
->cache('free_'.$cat->slug."_".$state, 'short')
->order('rand()');
}

else{
  $announces_connected = $this->Announces->find('all',[
    'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
    'conditions'=>[
      'Announces.type'=>'PAYING',
      'Announces.status' => 'ONLINE',
      'Announces.connected >'=> new Time('3 hours ago'),
      'Categories.slug' => $cat->slug,
      'States.slug' => $state
      //'Contracts.contract_type_id'=>8
    ],
    'limit'=>$limit
  ])
  ->matching('Cities', function ($q) use ($city){return $q->where(['Cities.slug' => $city->slug]);})
  ->cache('connected_'.$cat->slug."_".$state."_".$city->slug, 'short')
  ->order('rand()');

  $announces_online = $this->Announces->find('all',[
    'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
    'conditions'=>[
      'Announces.type'=>'PAYING',
      'Announces.status' => 'ONLINE',
      'Categories.slug' => $cat->slug,
      'States.slug' => $state,
      'Contracts.contract_type_id'=>8,
      'OR' => [
        'Announces.connected <'=> new Time('3 hours ago'),
        'Announces.connected IS'=> NULL
      ],
    ],
    'limit'=>$limit
  ])
  ->matching('Cities', function ($q) use ($city){return $q->where(['Cities.slug' => $city->slug]);})
  ->cache('online_'.$cat->slug."_".$state."_".$city->slug, 'short')
  ->order('rand()');

  /*
  $announces_turbo = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
  'Announces.type'=>'PAYING',
  'Announces.status' => 'ONLINE',
  'Categories.slug' => $cat->slug,
  'States.slug' => $state,
  'Contracts.contract_type_id'=>6
],
'limit'=>200
])
->matching('Cities', function ($q) use ($city){return $q->where(['Cities.slug' => $city->slug]);})
->cache('turbo_'.$cat->slug."_".$state."_".$city->slug, 'short')
->order('rand()');
*/

$announces_vista = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
    'Announces.type'=>'PAYING',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state,
    'Contracts.contract_type_id'=>4
  ],
  'limit'=>$limit
])
->matching('Cities', function ($q) use ($city){return $q->where(['Cities.slug' => $city->slug]);})
->cache('vista_'.$cat->slug."_".$state."_".$city->slug, 'short')
->order('rand()');

$announces_paying = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
    'Announces.type'=>'PAYING',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state,
    'Contracts.contract_type_id'=>2
  ],
  'limit'=>$limit
])
->matching('Cities', function ($q) use ($city){return $q->where(['Cities.slug' => $city->slug]);})
->cache('paying_'.$cat->slug."_".$state."_".$city->slug, 'short')
->order('rand()');

$announces_free = $this->Announces->find('all',[
  'contain' => ['States', 'Categories', 'Pics', 'Cities', 'Contracts'],
  'conditions'=>[
    'Announces.type'=>'FREE',
    'Announces.status' => 'ONLINE',
    'Categories.slug' => $cat->slug,
    'States.slug' => $state
  ],
  'limit'=>$limit
])
->matching('Cities', function ($q) use ($city){return $q->where(['Cities.slug' => $city->slug]);})
->cache('free_'.$cat->slug."_".$state."_".$city->slug, 'short')
->order('rand()');

};

if(empty($announces_free)){
  $announces_free = [];
}

if(!empty($state)){
  $state = $this->Announces->States->findBySlug($state)->first();
  if (empty($state)) {
    throw new NotFoundException(__('Page not found'));
  }
  $this->set('state', $state);
  $cities = $this->Announces->Cities->find('list',['conditions'=>['Cities.state_id'=>$state->id], 'keyField' => 'slug','valueField' => 'name', 'order'=>['Cities.name'=>'ASC']]);
}else{
  $cities = [];
}

$states = $this->Announces->States->find('list',['keyField' => 'slug','valueField' => 'name', 'order'=>['States.name'=>'ASC']]);
$this->set(compact('states','cities', 'announces_online', 'announces_paying', 'announces_vista', 'announces_connected', 'announces_free'));
$this->set('cat', $cat);
$this->set('city', $city ?? '');
$this->render('index');
}



public function freeIndex()
{
  $this->paginate = [
    'contain' => ['States', 'Categories', 'Pics', 'Cities'],
    'conditions'=>[
      'Announces.type'=>'FREE',
      'Announces.status' => 'ONLINE'
    ],
    'order'=>['Announces.modified'=>'DESC']
  ];
  $announces = $this->paginate($this->Announces, ['limit'=>60]);

  $this->set(compact('announces'));
  $this->set('_serialize', ['announces']);
}

/**
* View method
*
* @param string|null $id Announce id.
* @return \Cake\Network\Response|null
* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
*/
public function freeView($slug = null)
{
  //$announce = $this->Announces->find($slug)->first()->cache($slug, 'day');

  $announce = $this->Announces->find('all',[
    'contain'=>[
      'Pics', 'Cities', 'States', 'Categories'
    ],
    'conditions'=>[
      'Announces.status' => 'ONLINE',
      'Announces.slug' => $slug,
      'Announces.type'=>'FREE'
    ]
  ])
  ->cache($slug, 'day')
  ->first();

  if (empty($announce)) {
    $this->Flash->error(__('Cette annonce n\'existe plus !'));
    return $this->redirect(['action' => 'freeIndex'], '301');
  }

  switch ($announce->status) {
    case 'WAITING':
    $this->Flash->error(__('This announce is waiting for validation !'));
    return $this->redirect(['action' => 'index', $announce->category->slug], '302');
    break;

    case 'ARCHIVED':
    $this->Flash->error(__('This announce is expired !'));
    return $this->redirect(['action' => 'index', $announce->category->slug], '301');
    break;

    default:
    $this->set('announce', $announce);
    $this->set('_serialize', ['announce']);
    break;
  }

}


/**
* View method
*
* @param string|null $id Announce id.
* @return \Cake\Network\Response|null
* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
*/
public function view($slug)
{
  //$announce = $this->Announces->find($slug)->first()->cache($slug, 'day');


  $announce = $this->Announces->find('all',[
    'contain'=>[
      'Pics', 'Cities', 'States', 'Categories'
    ],
    'conditions'=>[
      'Announces.slug' => $slug,
      'Announces.type'=>'PAYING'
    ]
  ])
  ->cache($slug, 'day')
  ->first();

  if (empty($announce)) {
    $this->Flash->error(__('Cette annonce n\'existe plus !'));
    return $this->redirect(['action' => 'index', 'escort-girl-paris'], '301');
  }

  switch ($announce->status) {
    case 'WAITING':
    $this->Flash->error(__('This announce is waiting for validation !'));
    return $this->redirect(['action' => 'index', $announce->category->slug], '302');
    break;

    case 'EXPIRED':
    $this->Flash->error(__('This announce is expired !'));
    return $this->redirect(['action' => 'index', $announce->category->slug], '302');
    break;

    case 'ARCHIVED':
    $this->Flash->error(__('This announce is no more online !'));
    return $this->redirect(['action' => 'index', $announce->category->slug], '301');
    break;

    default:
    $this->set('announce', $announce);
    $this->set('_serialize', ['announce']);
    break;
  }

}

public function oldView($id = null, $slug = null){
  $announce = $this->Announces->findById($id)->first();
  if($announce){
    return $this->redirect(['action' => 'view', $announce->slug], '301');
  }else{
    $this->Flash->error(__('Cette annonce n\'existe plus !'));
    return $this->redirect(['action' => 'index', 'escort-girl-paris'], '301');
  }
}

public function oldFreeView($id = null, $slug = null){
  $announce = $this->Announces->findById($id)->first();
  if ($announce) {
    return $this->redirect(['action' => 'freeView', $announce->slug], '301');
  }else{
    $this->Flash->error(__('Cette annonce n\'existe plus !'));
    return $this->redirect(['action' => 'freeIndex'], '301');
  }
}



/**
* Add method
*
* @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
*/
public function add()
{
  $announce = $this->Announces->newEntity();
  if ($this->request->is('post')) {
    $announce = $this->Announces->patchEntity($announce, $this->request->data, ['validate' => 'subscribe']);
    $announce->type = 'FREE';
    $announce->status = 'NEW';
    $announce->ip_address = $this->request->clientIp();
    //$announce->slug = ;
    //debug($announce);
    if ($this->Announces->save($announce)) {
      $this->Flash->success(__('The announce has been saved. You have to wait our validation !'));
      $this->getMailer('User')->send('admin_notif', ['Nouvelle annonce ID '.$announce->id, $announce]);
      $this->request->session()->write('NewAnnounceSlug', $announce->slug);
      return $this->redirect(['action' => 'preview']);
    }
    $this->Flash->error(__('The announce could not be saved. Please, try again.'));
  }
  $states = $this->Announces->States->find('list', ['limit' => 200])->order(['States.name'=>'ASC']);
  $categories = $this->Announces->Categories->find('list', ['limit' => 200]);
  $cities = $this->Announces->Cities->find('list', ['limit' => 200]);
  $this->set(compact('announce', 'states', 'categories', 'cities'));
  $this->set('_serialize', ['announce']);
}


/**
* View method
*
* @param string|null $id Announce id.
* @return \Cake\Network\Response|null
* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
*/
public function preview()
{

  $slug = $this->request->session()->read('NewAnnounceSlug');
  if (empty($slug)) {
    throw new NotFoundException(__('Page not found'));
  }


  $announce = $this->Announces->find('all',[
    'contain'=>[
      'Pics', 'Cities', 'States', 'Categories'
    ],
    'conditions'=>[
      'Announces.status' => 'NEW',
      'Announces.slug' => $slug
    ]
  ])
  ->first();

  $this->set('announce', $announce);
  $this->set('_serialize', ['announce']);
}

/**
* Add method
*
* @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
*/
public function addPremium()
{
  $announce = $this->Announces->newEntity();
  if ($this->request->is('post')) {
    $announce = $this->Announces->patchEntity($announce, $this->request->data);
    $announce->type = 'PAYING';
    $announce->status = 'NEW';
    //$announce->slug = ;
    //debug($announce);
    if ($this->Announces->save($announce)) {
      $this->Flash->success(__('The announce has been saved.'));

      return $this->redirect(['action' => 'index']);
    }
    $this->Flash->error(__('The announce could not be saved. Please, try again.'));
  }
  $states = $this->Announces->States->find('list', ['limit' => 200]);
  $categories = $this->Announces->Categories->find('list', ['limit' => 200]);
  $cities = $this->Announces->Cities->find('list', ['limit' => 200]);
  $this->set(compact('announce', 'states', 'categories', 'cities'));
  $this->set('_serialize', ['announce']);
}


public function getCities($state_id){
  $cities = $this->Announces->Cities->find('list',[
    'conditions'=>['Cities.state_id'=>$state_id],
    'order'=>['Cities.name'=>'ASC']
  ]);
  $this->set(compact('cities'));
  $this->set('_serialize', ['cities']);
}


public function myAnnounce(){
  $announce = $this->Announces->find('all',[
    'contain'=>[
      'Pics', 'Cities', 'States', 'Categories'
    ],
    'conditions'=>[
      'Announces.user_id' =>$this->Auth->user('id'),
    ]
  ])
  ->first();
  //$this->Time->wasWithinLast('3 hours',$announce->connected
  if($announce->connected != null){
    if ($announce->connected->wasWithinLast('3 hours')) {
      $this->set('connected_till', $announce->connected->modify('+ 3 Hours'));
    }
  }

  $this->set('announce', $announce);
  $this->set('_serialize', ['announce']);
}

public function editMyAnnounce(){
  $announce = $this->Announces->find('all',[
    'contain'=>[
      'Cities', 'States'
    ],
    'conditions'=>[
      'Announces.user_id' =>$this->Auth->user('id'),
    ]
  ])
  ->first();
  if ($this->request->is(['patch', 'post', 'put'])) {
    $announce = $this->Announces->patchEntity($announce, $this->request->data);
    if ($announce->status == 'ONLINE') {$announce->status = 'WAITING';}
    //$announce->status = 'WAITING';
    if ($this->Announces->save($announce)) {
      $this->Flash->success(__('The announce has been saved.'));
      $this->getMailer('User')->send('admin_notif', ['Annonce ID '.$announce->id." à été modifiée !", $announce]);
      return $this->redirect(['action' => 'myAnnounce']);
    } else {
      $this->Flash->error(__('The announce could not be saved. Please, try again.'));
    }
  }
  $states = $this->Announces->States->find('list');
  $cities = $this->Announces->Cities->find('list')->where(['Cities.state_id'=>$announce->state->id])->order(['Cities.name'=>'ASC']);
  $this->set(compact('announce','states', 'cities'));
  $this->set('_serialize', ['announce']);
}

public function beOnline(){
  $announce = $this->Announces->find('all',[
    'contain'=>[
      'Pics', 'Cities', 'States', 'Categories', 'Contracts'
    ],
    'conditions'=>[
      'Announces.user_id' =>$this->Auth->user('id'),
      'Announces.status'=>'ONLINE',
      'Announces.type'=>'PAYING',
      'Contracts.contract_type_id' => 8
    ]
  ])
  ->first();
  if(empty($announce)){
    $this->Flash->error(__('You can not be online now ! Your announce have to be online or you dont have the right contract.'));
    return $this->redirect($this->referer());
  }
  $announce->connected = new Time();
  $this->Announces->save($announce);
  $this->Flash->success(__('Usted ahora está conectado por 3 horas ! - Vous êtes maintenant connecté pendant 3 heures ! - You are now connected for 3 hours !'));
  $this->redirect($this->referer());
  //debug($announce);
}
}
