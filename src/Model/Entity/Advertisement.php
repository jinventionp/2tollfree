<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Advertisement Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string|null $image
 * @property string|null $image_dir
 * @property string|null $image_size
 * @property string|null $image_type
 * @property string|null $dimensions
 * @property bool|null $is_active
 * @property string|null $url_youtube
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Advertisement extends Entity
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
        'image' => true,
        'image_dir' => true,
        'image_size' => true,
        'image_type' => true,
        'dimensions' => true,
        'active' => true,
        'url_youtube' => true,
        'created' => true,
        'modified' => true,
        'customer' => true
    ];
}
