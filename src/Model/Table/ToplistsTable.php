<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Toplists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Toplist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Toplist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Toplist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Toplist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Toplist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Toplist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Toplist findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ToplistsTable extends Table
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

        $this->table('toplists');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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


        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('pic_url');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->boolean('no_follow')
            ->allowEmpty('no_follow');

        $validator
            ->integer('in')
            ->allowEmpty('in');

        $validator
            ->integer('out')
            ->allowEmpty('out');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
