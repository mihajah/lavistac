<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Announces Model
*
* @property \Cake\ORM\Association\BelongsTo $Users
* @property \Cake\ORM\Association\BelongsTo $Contracts
* @property \Cake\ORM\Association\BelongsTo $States
* @property \Cake\ORM\Association\BelongsTo $Categories
* @property \Cake\ORM\Association\HasMany $Pics
* @property \Cake\ORM\Association\BelongsToMany $Cities
*
* @method \App\Model\Entity\Announce get($primaryKey, $options = [])
* @method \App\Model\Entity\Announce newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Announce[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Announce|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Announce patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Announce[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Announce findOrCreate($search, callable $callback = null, $options = [])
*
* @mixin \Cake\ORM\Behavior\TimestampBehavior
*/
class AnnouncesTable extends Table
{

   /**
   * Initialize method
   *
   * @param array $config The configuration for the Table.
   * @return void
   */
   public function initialize(array $config)
   {
      parent::initialize($config);

      $this->addBehavior('Search.Search');
      $this->addBehavior('Sluggable', ['field' => 'title','translate' => false]);
      $this->addBehavior('ClearCache',['cache'=>['short', 'day']]);


      $this->searchManager()
      ->add('q', 'Search.Like', [
         'before' => true,
         'after' => true,
         'mode' => 'or',
         'comparison' => 'LIKE',
         'wildcardAny' => '*',
         'wildcardOne' => '?',
         'field' => ['slug','firstname', 'title', 'phone']
      ]);

      $this->table('announces');
      $this->displayField('title');
      $this->primaryKey('id');

      $this->addBehavior('Timestamp');

      $this->belongsTo('Users', [
         'foreignKey' => 'user_id',
         'joinType' => 'LEFT'
      ]);
      $this->belongsTo('Contracts', [
         'foreignKey' => 'contract_id',
         'joinType' => 'LEFT'
      ]);
      $this->belongsTo('States', [
         'foreignKey' => 'state_id',
         'joinType' => 'INNER'
      ]);
      $this->belongsTo('Categories', [
         'foreignKey' => 'category_id',
         'joinType' => 'INNER'
      ]);
      $this->hasMany('Pics', [
         'foreignKey' => 'announce_id',
         'dependent'=>true
      ]);
      $this->belongsToMany('Cities', [
         'foreignKey' => 'announce_id',
         'targetForeignKey' => 'city_id',
         'joinTable' => 'announces_cities'
      ]);
   }


   public function validationSubscribe(Validator $validator){
      $validator
      ->integer('id')
      ->allowEmpty('id', 'create');

      $validator
      ->dateTime('connected')
      ->allowEmpty('connected');

      $validator
      ->requirePresence('type', 'create')
      ->notEmpty('type');

      $validator
      ->requirePresence('status', 'create')
      ->notEmpty('status');

      $validator
      ->requirePresence('firstname', 'create')
      ->notEmpty('firstname');

      $validator
      ->date('birthday')
      ->allowEmpty('birthday');

      $validator
      ->email('email')
      ->requirePresence('email', 'create')
      ->notEmpty('email');

      $validator->add('email', [
         'unique' => [
            'message'   => 'This value is already used',
            'provider'  => 'table',
            'rule'      => 'validateUnique'
         ]
      ]);

      $validator
      ->requirePresence('phone', 'create')
      ->notEmpty('phone');

      $validator
      ->requirePresence('out_in', 'create')
      ->notEmpty('out_in');

      $validator
      ->allowEmpty('website');

      $validator
      ->requirePresence('title', 'create')
      ->notEmpty('title');

      $validator
      ->requirePresence('presentation', 'create')
      ->notEmpty('presentation');


      $validator->add('presentation', [
         'notBlank' => [
            'rule' => 'notBlank',
            'message' => 'Not empty !',
            'last' => true
         ],
         'minLength' => [
            'rule' => ['minLength', 150],
            'last' => true,
            'message' => 'Min 150 characters',
         ],
      ]);

      $validator
      ->requirePresence('slug', 'create')
      ->notEmpty('slug');

      return $validator;
   }


   /**
   * Default validation rules.
   *
   * @param \Cake\Validation\Validator $validator Validator instance.
   * @return \Cake\Validation\Validator
   */
   public function validationDefault(Validator $validator)
   {
      $validator
      ->integer('id')
      ->allowEmpty('id', 'create');

      $validator
      ->dateTime('connected')
      ->allowEmpty('connected');

      $validator
      ->requirePresence('type', 'create')
      ->notEmpty('type');

      $validator
      ->requirePresence('status', 'create')
      ->notEmpty('status');

      $validator
      ->requirePresence('firstname', 'create')
      ->notEmpty('firstname');

      $validator
      ->date('birthday')
      ->allowEmpty('birthday');

      $validator
      ->email('email')
      ->requirePresence('email', 'create')
      ->notEmpty('email');

      $validator
      ->requirePresence('phone', 'create')
      ->notEmpty('phone');

      $validator
      ->requirePresence('out_in', 'create')
      ->notEmpty('out_in');

      $validator
      ->allowEmpty('website');

      $validator
      ->requirePresence('title', 'create')
      ->notEmpty('title');

      $validator
      ->requirePresence('presentation', 'create')
      ->notEmpty('presentation');


      $validator
      ->requirePresence('slug', 'create')
      ->notEmpty('slug');

      return $validator;
   }

   /**
   * Returns a rules checker object that will be used for validating
   * application integrity.
   *
   * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
   * @return \Cake\ORM\RulesChecker
   */
   public function buildRules(RulesChecker $rules)
   {
      $rules->add($rules->isUnique(['slug']));
      $rules->add($rules->existsIn(['state_id'], 'States'));
      $rules->add($rules->existsIn(['category_id'], 'Categories'));

      return $rules;
   }
}
