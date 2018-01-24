<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Pics Model
*
* @property \Cake\ORM\Association\BelongsTo $Announces
*
* @method \App\Model\Entity\Pic get($primaryKey, $options = [])
* @method \App\Model\Entity\Pic newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Pic[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Pic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Pic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Pic[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Pic findOrCreate($search, callable $callback = null, $options = [])
*/
class PicsTable extends Table
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

      $this->searchManager()
      ->add('q', 'Search.Like', [
         'before' => true,
         'after' => true,
         'mode' => 'or',
         'comparison' => 'LIKE',
         'wildcardAny' => '*',
         'wildcardOne' => '?',
         'field' => ['alt', 'announce_id', 'Announces.title']
      ]);

      $this->addBehavior('Josegonzalez/Upload.Upload', [
         // You can configure as many upload fields as possible,
         // where the pattern is `field` => `config`
         //
         // Keep in mind that while this plugin does not have any limits in terms of
         // number of files uploaded per request, you should keep this down in order
         // to decrease the ability of your users to block other requests.
         'url' => [
            'path' => 'webroot{DS}',
            'nameCallback' => function(array $data, array $settings) {
               $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
               return "/files/uploads/".uniqid().'.'.$ext;
            },
            'keepFilesOnDelete'=>false
         ]
      ]);

      $this->table('pics');
      $this->displayField('id');
      $this->primaryKey('id');

      $this->belongsTo('Announces', [
         'foreignKey' => 'announce_id',
         'joinType' => 'INNER'
      ]);
   }


   public function renameFile($field, $currentName, $data, $options=array())
   {
      $ext = pathinfo($currentName, PATHINFO_EXTENSION);
      $name = uniqid().'.'.mb_strtolower($ext);
      return $name;
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
      ->requirePresence('url', 'create')
      ->notEmpty('url')
      ->allowEmpty('url','update');

      $validator
      ->allowEmpty('alt');

      $validator
      ->add('url',[
         'fileSize' => [
            'rule' => ['fileSize', '<=', '500kb'],
            //'last' => true,
            'message' => __('Wrong file size. Max 500kb')
         ],
         'extension' => [
            'rule' => ['extension',array('gif','jpeg','png','jpg')],
            'message' => __('Wrong file type. Only .gif, .jpeg, .png , .jpg')
         ]
      ]);


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
      $rules->add($rules->existsIn(['announce_id'], 'Announces'));

      return $rules;
   }
}
