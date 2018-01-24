<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContractTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\ContractType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContractType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContractType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContractType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContractType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContractType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContractType findOrCreate($search, callable $callback = null, $options = [])
 */
class ContractTypesTable extends Table
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

        $this->table('contract_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Contracts', [
            'foreignKey' => 'contract_type_id'
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

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
