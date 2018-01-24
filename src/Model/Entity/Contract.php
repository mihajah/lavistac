<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property string $label
 * @property \Cake\I18n\Time $start
 * @property \Cake\I18n\Time $end
 * @property int $contract_type_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\ContractType $contract_type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Ad[] $ads
 * @property \App\Model\Entity\Announce[] $announces
 */
class Contract extends Entity
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
