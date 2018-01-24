<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Metas Model
*
* @property \Cake\ORM\Association\BelongsTo $MetaTypes
*
* @method \App\Model\Entity\Meta get($primaryKey, $options = [])
* @method \App\Model\Entity\Meta newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Meta[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Meta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Meta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Meta[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Meta findOrCreate($search, callable $callback = null, $options = [])
*/
class MetasTable extends Table
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
      $this->addBehavior('ClearCache',['cache'=>['month']]);


      $this->searchManager()
      ->add('q', 'Search.Like', [
         'before' => true,
         'after' => true,
         'mode' => 'or',
         'comparison' => 'LIKE',
         'wildcardAny' => '*',
         'wildcardOne' => '?',
         'field' => ['url', 'content']
      ]);

      $this->table('metas');
      $this->displayField('id');
      $this->primaryKey('id');

      $this->belongsTo('MetaTypes', [
         'foreignKey' => 'meta_type_id',
         'joinType' => 'INNER'
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
      ->requirePresence('content', 'create')
      ->notEmpty('content');

      $validator
      ->requirePresence('url', 'create')
      ->notEmpty('url');

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
      $rules->add($rules->existsIn(['meta_type_id'], 'MetaTypes'));

      return $rules;
   }
}
