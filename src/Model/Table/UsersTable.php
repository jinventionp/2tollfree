<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Customers', [
            'foreignKey' => 'user_id'
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false, 'El campo Nombre es Obligatorio');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false)
            ->add('email', 'unique', [
                'rule' => 'validateUnique', 
                'provider' => 'table', 
                'message' => 'El Correo electrónico ya existe, intente con otro Correo electrónico'
            ])
            ->add('email', 'validFormat', [
                'rule'    => 'email',
                'message' => 'Email no válido',
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 150)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', 'update', 'El campo Contraseña es Obligatorio');

        $validator
            ->requirePresence('confirm_password', 'create')
            ->allowEmptyString('confirm_password', 'update', 'El campo Confirmar contraseña es Obligatorio')
            ->add('confirm_password', 'custom', ['rule' => function ($value, $context) {
                if (isset($context['data']['password']) && $value == $context['data']['password']) {
                    return true;
                }
                return false;
            },
                'message' => 'Lo sentimos, las contraseñas no coinciden',
            ]);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 100)
            ->allowEmptyString('phone');

        $validator
            ->scalar('token')
            ->maxLength('token', 150)
            ->allowEmptyString('token');

        $validator
            ->boolean('active')
            ->allowEmptyString('active');

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
        $rules->add($rules->isUnique(['email']));
		$rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        //['Users.id', 'Users.name', 'Users.email', 'Users.password', 'Users.phone', 'Users.role_id', 'Users.active', 'Roles.id', 'Roles.name']
        $query
            ->select()
            ->contain([
                'Roles' => ['Profiles' => [
                    'Modules'
                    ]
                ]
            ])
            ->where(['Users.active' => 1]);

        return $query;
    }
}
