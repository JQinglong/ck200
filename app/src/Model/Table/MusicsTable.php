<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Musics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Singers
 * @property \Cake\ORM\Association\HasMany $Lylics
 * @property \Cake\ORM\Association\HasMany $MusicHskcounts
 *
 * @method \App\Model\Entity\Music get($primaryKey, $options = [])
 * @method \App\Model\Entity\Music newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Music[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Music|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Music patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Music[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Music findOrCreate($search, callable $callback = null, $options = [])
 */
class MusicsTable extends Table
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

        $this->table('musics');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Singers', [
            'foreignKey' => 'singer_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Lylics', [
            'foreignKey' => 'music_id'
        ]);
        $this->hasMany('MusicHskcounts', [
            'foreignKey' => 'music_id'
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
            ->requirePresence('music_nm', 'create')
            ->notEmpty('music_nm');

        $validator
            ->requirePresence('lylicstr', 'create')
            ->notEmpty('lylicstr');

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
        $rules->add($rules->existsIn(['singer_id'], 'Singers'));

        return $rules;
    }
}
