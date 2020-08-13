<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $title
 * @property int $quantity
 * @property int $category_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $Photo
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Loan[] $loan
 */


class Item extends Entity
{
    
        public $actsAs = array(
    'Upload.Upload' => array(
        'photo'
    )
);

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
