<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MetaTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Metas
 *
 * @method \App\Model\Entity\MetaType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MetaType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MetaType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MetaType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MetaType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MetaType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MetaType findOrCreate($search, callable $callback = null, $options = [])
 */
class MetaTypesTable extends Table
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

        $this->table('meta_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Metas', [
            'foreignKey' => 'meta_type_id'
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
