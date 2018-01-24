<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ad Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $pic_url
 * @property string $url
 * @property string $alt
 * @property bool $active
 * @property bool $no_follow
 * @property int $clicked
 * @property int $ad_type_id
 * @property int $contract_id
 * @property int $state_id
 * @property int $category_id
 *
 * @property \App\Model\Entity\AdType $ad_type
 * @property \App\Model\Entity\Contract $contract
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Category $category
 */
class Ad extends Entity
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
