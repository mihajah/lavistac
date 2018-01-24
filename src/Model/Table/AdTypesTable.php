<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Ads
 *
 * @method \App\Model\Entity\AdType get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdType findOrCreate($search, callable $callback = null, $options = [])
 */
class AdTypesTable extends Table
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

        $this->table('ad_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Ads', [
            'foreignKey' => 'ad_type_id'
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
            ->integer('height')
            ->requirePresence('height', 'create')
            ->notEmpty('height');

        $validator
            ->integer('width')
            ->requirePresence('width', 'create')
            ->notEmpty('width');

        return $validator;
    }
}
