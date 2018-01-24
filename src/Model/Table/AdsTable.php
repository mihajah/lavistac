<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AdTypes
 * @property \Cake\ORM\Association\BelongsTo $Contracts
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Ad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ad findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdsTable extends Table
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

        $this->table('ads');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
          // You can configure as many upload fields as possible,
          // where the pattern is `field` => `config`
          //
          // Keep in mind that while this plugin does not have any limits in terms of
          // number of files uploaded per request, you should keep this down in order
          // to decrease the ability of your users to block other requests.
          'pic_url' => [
             'path' => 'webroot{DS}',
             'nameCallback' => function(array $data, array $settings) {
                $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
                return "/files/uploads/".uniqid().'.'.$ext;
             },
             'keepFilesOnDelete'=>false
          ]
       ]);
       $this->addBehavior('ClearCache',['cache'=>['short', 'day']]);

       $this->searchManager()
       ->add('q', 'Search.Like', [
          'before' => true,
          'after' => true,
          'mode' => 'or',
          'comparison' => 'LIKE',
          'wildcardAny' => '*',
          'wildcardOne' => '?',
          'field' => ['url']
       ]);

        $this->belongsTo('AdTypes', [
            'foreignKey' => 'ad_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Contracts', [
            'foreignKey' => 'contract_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
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
            ->requirePresence('pic_url', 'create')
            ->notEmpty('pic_url')
            ->allowEmpty('pic_url','update');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->allowEmpty('alt');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('no_follow')
            ->allowEmpty('no_follow');

        $validator
            ->integer('clicked')
            ->allowEmpty('clicked');

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
        $rules->add($rules->existsIn(['ad_type_id'], 'AdTypes'));
        $rules->add($rules->existsIn(['contract_id'], 'Contracts'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
