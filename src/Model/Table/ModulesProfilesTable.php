<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModulesProfiles Model
 *
 * @property \App\Model\Table\ProfilesTable|\Cake\ORM\Association\BelongsTo $Profiles
 * @property \App\Model\Table\ModulesTable|\Cake\ORM\Association\BelongsTo $Modules
 *
 * @method \App\Model\Entity\ModulesProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModulesProfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ModulesProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModulesProfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModulesProfile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModulesProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModulesProfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModulesProfile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModulesProfilesTable extends Table
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

        $this->setTable('modules_profiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Profiles', [
            'foreignKey' => 'profile_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modules', [
            'foreignKey' => 'module_id',
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
            ->allowEmptyString('id', 'create');

        $validator
            ->boolean('active')
            ->allowEmptyString('active');

        $validator
            ->boolean('see')
            ->allowEmptyString('see');

        $validator
            ->boolean('new')
            ->allowEmptyString('new');

        $validator
            ->boolean('edit')
            ->allowEmptyString('edit');

        $validator
            ->boolean('erase')
            ->allowEmptyString('erase');

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
        $rules->add($rules->existsIn(['profile_id'], 'Profiles'));
        $rules->add($rules->existsIn(['module_id'], 'Modules'));

        return $rules;
    }
}
