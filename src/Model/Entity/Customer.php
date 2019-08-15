<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $observations
 * @property string $email
 * @property string|null $website
 * @property \Cake\I18n\FrozenTime|null $start_time
 * @property \Cake\I18n\FrozenTime|null $end_time
 * @property string|null $opening_days
 * @property bool|null $sponsor
 * @property string|null $url_youtube
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Audio[] $audios
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\Phone[] $phones
 */
class Customer extends Entity
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
        'user_id' => true,
        'name' => true,
        'observations' => true,
        'email' => true,
        'website' => true,
        'start_time' => true,
        'end_time' => true,
        'opening_days' => true,
        'sponsor' => true,
        'url_youtube' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'audios' => true,
        'images' => true,
        'phones' => true
    ];
}
