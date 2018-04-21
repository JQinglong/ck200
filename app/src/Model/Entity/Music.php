<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Music Entity
 *
 * @property int $id
 * @property string $music_nm
 * @property string $lylicstr
 * @property int $singer_id
 * @property int $cnt_lylics
 * @property int $cnt_dist
 *
 * @property \App\Model\Entity\Singer $singer
 * @property \App\Model\Entity\Lylic[] $lylics
 * @property \App\Model\Entity\MusicHskcount[] $music_hskcounts
 */
class Music extends Entity
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
