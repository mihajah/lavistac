<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* States Model
*
* @property \Cake\ORM\Association\HasMany $Ads
* @property \Cake\ORM\Association\HasMany $Announces
* @property \Cake\ORM\Association\HasMany $Cities
*
* @method \App\Model\Entity\State get($primaryKey, $options = [])
* @method \App\Model\Entity\State newEntity($data = null, array $options = [])
* @method \App\Model\Entity\State[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\State|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\State patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\State[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\State findOrCreate($search, callable $callback = null, $options = [])
*/
class StatesTable extends Table
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
      $this->addBehavior('Sluggable', ['field' => 'name','translate' => true]);

      $this->searchManager()
      ->add('q', 'Search.Like', [
         'before' => true,
         'after' => true,
         'mode' => 'or',
         'comparison' => 'LIKE',
         'wildcardAny' => '*',
         'wildcardOne' => '?',
         'field' => ['name']
      ]);

      $this->table('states');
      $this->displayField('name');
      $this->primaryKey('id');

      $this->hasMany('Ads', [
         'foreignKey' => 'state_id'
      ]);
      $this->hasMany('Announces', [
         'foreignKey' => 'state_id'
      ]);
      $this->hasMany('Cities', [
         'foreignKey' => 'state_id'
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
      ->requirePresence('name', 'create')
      ->notEmpty('name');

      return $validator;
   }
}
