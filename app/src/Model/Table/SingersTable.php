<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Singers Model
 *
 * @property \Cake\ORM\Association\HasMany $Musics
 *
 * @method \App\Model\Entity\Singer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Singer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Singer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Singer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Singer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Singer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Singer findOrCreate($search, callable $callback = null, $options = [])
 */
class SingersTable extends Table
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

        $this->table('singers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Musics', [
            'foreignKey' => 'singer_id'
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
            ->requirePresence('singer_nm', 'create')
            ->notEmpty('singer_nm');

        $validator
            ->requirePresence('img_url', 'create')
            ->notEmpty('img_url');

        return $validator;
    }
}
