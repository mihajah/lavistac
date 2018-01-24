<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Toplist Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $pic_url
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $status
 * @property bool $no_follow
 * @property int $in
 * @property int $out
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Toplist extends Entity
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
