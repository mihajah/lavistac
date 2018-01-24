<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Posts Model
*
* @method \App\Model\Entity\Post get($primaryKey, $options = [])
* @method \App\Model\Entity\Post newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Post findOrCreate($search, callable $callback = null, $options = [])
*
* @mixin \Cake\ORM\Behavior\TimestampBehavior
*/
class PostsTable extends Table
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

      $this->searchManager()
      ->add('q', 'Search.Like', [
         'before' => true,
         'after' => true,
         'mode' => 'or',
         'comparison' => 'LIKE',
         'wildcardAny' => '*',
         'wildcardOne' => '?',
         'field' => ['title', 'subtitle']
      ]);
      $this->addBehavior('Josegonzalez/Upload.Upload', [
        // You can configure as many upload fields as possible,
        // where the pattern is `field` => `config`
        //
        // Keep in mind that while this plugin does not have any limits in terms of
        // number of files uploaded per request, you should keep this down in order
        // to decrease the ability of your users to block other requests.
        'img' => [
           'path' => 'webroot{DS}',
           'nameCallback' => function(array $data, array $settings) {
             $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
             return "/files/uploads/".uniqid().'.'.$ext;
           },
           'keepFilesOnDelete'=>false
        ]
     ]);

      $this->table('posts');
      $this->displayField('title');
      $this->primaryKey('id');

      $this->addBehavior('Timestamp');
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
      ->boolean('active')
      ->allowEmpty('active');

      $validator
      ->requirePresence('title', 'create')
      ->notEmpty('title');

      $validator
      ->requirePresence('subtitle', 'create')
      ->notEmpty('subtitle');

      $validator
      ->requirePresence('body', 'create')
      ->notEmpty('body');

      $validator
      ->allowEmpty('img');

      $validator
      ->allowEmpty('alt');

      return $validator;
   }
}
