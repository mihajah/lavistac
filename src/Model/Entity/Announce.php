<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Announce Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $connected
 * @property string $type
 * @property string $status
 * @property string $firstname
 * @property string $label
 * @property \Cake\I18n\Time $birthday
 * @property string $email
 * @property string $phone
 * @property string $out_in
 * @property string $website
 * @property string $title
 * @property string $presentation
 * @property string $slug
 * @property int $user_id
 * @property int $contract_id
 * @property int $state_id
 * @property int $category_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contract $contract
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Pic[] $pics
 * @property \App\Model\Entity\City[] $cities
 */
class Announce extends Entity
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
}
