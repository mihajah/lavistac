<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Auth\LegacyPasswordHasher;

/**
* User Entity
*
* @property int $id
* @property \Cake\I18n\Time $created
* @property string $email
* @property string $password
* @property string $ip_address
* @property int $group_id
*
* @property \App\Model\Entity\Group $group
* @property \App\Model\Entity\Announce[] $announces
* @property \App\Model\Entity\Contract[] $contracts
* @property \App\Model\Entity\Toplist[] $toplists
*/
class User extends Entity
{

   /**
   * Fields that can be mass assigned using newEntity() or patchEntity().
   *
   * Note that when '*' is set to true, this allows all unspecified fields to
   * be mass assigned. For security purposes, it is advised to set '*' to false
   * (or remove it), and explicitly make individual fields accessible as needed.
   *
   * @var array
   */
   protected $_accessible = [
      '*' => true,
      'id' => false
   ];

   /**
   * Fields that are excluded from JSON versions of the entity.
   *
   * @var array
   */
   protected $_hidden = [
      'password'
   ];

   protected function _setPassword($password)
   {
      return (new LegacyPasswordHasher)->hash($password);
   }

}
