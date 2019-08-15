<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Audio Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string|null $audio
 * @property string|null $audio_dir
 * @property string|null $audio_size
 * @property string|null $audio_type
 * @property bool|null $is_active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Audio extends Entity
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
        'customer_id' => true,
        'name' => true,
        'audio' => true,
        'audio_dir' => true,
        'audio_size' => true,
        'audio_type' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'customer' => true
    ];
}
