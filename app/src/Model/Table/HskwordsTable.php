<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hskwords Model
 *
 * @method \App\Model\Entity\Hskword get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hskword newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hskword[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hskword|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hskword patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hskword[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hskword findOrCreate($search, callable $callback = null, $options = [])
 */
class HskwordsTable extends Table
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

        $this->table('hskwords');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('word', 'create')
            ->notEmpty('word');

        return $validator;
    }
}
