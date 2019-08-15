<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FieldsProfile Entity
 *
 * @property int $id
 * @property int $profile_id
 * @property int $field_id
 * @property bool|null $visible
 * @property bool|null $readonly
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Profile $profile
 * @property \App\Model\Entity\Field $field
 */
class FieldsProfile extends Entity
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
        'profile_id' => true,
        'field_id' => true,
        'visible' => true,
        'writing' => true,
        'modified' => true,
        'created' => true,
        'profile' => true,
        'field' => true
    ];
}
