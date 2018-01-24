<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Contracts Model
*
* @property \Cake\ORM\Association\BelongsTo $ContractTypes
* @property \Cake\ORM\Association\BelongsTo $Users
* @property \Cake\ORM\Association\HasMany $Ads
* @property \Cake\ORM\Association\HasMany $Announces
*
* @method \App\Model\Entity\Contract get($primaryKey, $options = [])
* @method \App\Model\Entity\Contract newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Contract[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Contract|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Contract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Contract[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Contract findOrCreate($search, callable $callback = null, $options = [])
*/
class ContractsTable extends Table
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
      $this->addBehavior('Timestamp');


      $this->searchManager()
      ->add('q', 'Search.Like', [
         'before' => true,
         'after' => true,
         'mode' => 'or',
         'comparison' => 'LIKE',
         'wildcardAny' => '*',
         'wildcardOne' => '?',
         'field' => ['label']
      ]);

      $this->table('contracts');
      $this->displayField('label');
      $this->primaryKey('id');

      $this->belongsTo('ContractTypes', [
         'foreignKey' => 'contract_type_id',
         'joinType' => 'INNER'
      ]);
      $this->belongsTo('Users', [
         'foreignKey' => 'user_id',
         'joinType' => 'INNER'
      ]);
      $this->hasMany('Ads', [
         'foreignKey' => 'contract_id'
      ]);
      $this->hasMany('Announces', [
         'foreignKey' => 'contract_id'
      ]);
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
      ->allowEmpty('label');

      $validator
      ->date('start')
      ->requirePresence('start', 'create')
      ->notEmpty('start');

      $validator
      ->date('end')
      ->requirePresence('end', 'create')
      ->notEmpty('end');

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
      $rules->add($rules->existsIn(['contract_type_id'], 'ContractTypes'));
      $rules->add($rules->existsIn(['user_id'], 'Users'));

      return $rules;
   }
}
