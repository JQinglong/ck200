<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MusicHskcounts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Musics
 *
 * @method \App\Model\Entity\MusicHskcount get($primaryKey, $options = [])
 * @method \App\Model\Entity\MusicHskcount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MusicHskcount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MusicHskcount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MusicHskcount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MusicHskcount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MusicHskcount findOrCreate($search, callable $callback = null, $options = [])
 */
class MusicHskcountsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('music_hskcounts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Musics', [
            'foreignKey' => 'music_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->integer('level')
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->integer('cnt_lylics')
            ->requirePresence('cnt_lylics', 'create')
            ->notEmpty('cnt_lylics');

        $validator
            ->integer('cnt_dist')
            ->requirePresence('cnt_dist', 'create')
            ->notEmpty('cnt_dist');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['music_id'], 'Musics'));

        return $rules;
    }
}
