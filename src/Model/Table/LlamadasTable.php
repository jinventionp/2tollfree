<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Llamadas Model
 *
 * @method \App\Model\Entity\Llamadas get($primaryKey, $options = [])
 * @method \App\Model\Entity\Llamadas newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Llamadas[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Llamadas|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Llamadas|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Llamadas patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Llamadas[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Llamadas findOrCreate($search, Llamadasable $Llamadasback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LlamadasTable extends Table
{

    public static function defaultConnectionName() {
        return 'defaultCalls';
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('llamadas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('codeCountryA')
            ->maxLength('codeCountryA', 10)
            ->allowEmpty('codeCountryA');

        $validator
            ->scalar('phoneA')
            ->maxLength('phoneA', 20)
            ->allowEmpty('phoneA');

        $validator
            ->scalar('codeCountryB')
            ->maxLength('codeCountryB', 10)
            ->allowEmpty('codeCountryB');

        $validator
            ->scalar('phoneB')
            ->maxLength('phoneB', 20)
            ->allowEmpty('phoneB');

        $validator
            ->scalar('phoneId')
            ->maxLength('phoneId', 3)
            ->allowEmpty('phoneId');

        $validator
            ->scalar('customerId')
            ->maxLength('customerId', 3)
            ->allowEmpty('customerId');

        $validator
            ->integer('duration')
            ->allowEmpty('duration');

        $validator
            ->dateTime('dateCall')
            ->allowEmpty('dateCall');

        $validator
            ->time('hour')
            ->allowEmpty('hour');

        $validator
            ->boolean('status')
            ->allowEmpty('status');
            
        $validator
            ->boolean('callfile')
            ->allowEmpty('callfile');

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
        
    }
}
