<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Images Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Image get($primaryKey, $options = [])
 * @method \App\Model\Entity\Image newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Image[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Image[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdvertisementsTable extends Table
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

        $this->setTable('advertisements');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
       

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'image' => [
                'fields' => [
                    'dir' => 'image_dir',
                    'size' => 'image_size',
                    'type' => 'image_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    return strtolower($data['name']);
                },
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(80, 80);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $data['name'],
                        $tmp => 'thumbnail-' . $data['name'],
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ]
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            //->scalar('image')
            //->maxLength('image', 255)
            ->allowEmptyFile('image')
            ->allowEmptyString('image', true);
        
        $validator
            ->scalar('image_dir')
            ->maxLength('image_dir', 255)
            ->allowEmptyFile('image_dir');

        $validator
            ->integer('image_size')
            ->allowEmptyFile('image_size');

        $validator
            ->scalar('image_type')
            ->maxLength('image_type', 255)
            ->allowEmptyFile('image_type');
        
        $validator
            ->scalar('dimensions')
            ->maxLength('dimensions', 100)
            ->allowEmptyString('dimensions');

        $validator
            ->boolean('active')
            ->allowEmptyString('active');

        $validator
            ->scalar('url_youtube')
            ->maxLength('url_youtube', 255)
            ->allowEmptyString('url_youtube');        

        return $validator;
    }

    public function validationDimensions200x200(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->provider('upload', \Josegonzalez\Upload\Validation\ImageValidation::class);

        $validator->add('image', 'fileAboveMinHeight', [
            'rule'     => ['isAboveMinHeight', 200],
            'message'  => 'Esta imagen debe ser por lo menos 200px alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxHeight', [
            'rule'     => ['isBelowMaxHeight', 200],
            'message'  => 'Esta imagen no debe ser mayor de 200px de alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileAboveMinWidth', [
            'rule'     => ['isAboveMinWidth', 200],
            'message'  => 'Esta imagen debe ser por lo menos 200px de ancho',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxWidth', [
            'rule'     => ['isBelowMaxWidth', 200],
            'message'  => 'Esta imagen no debe ser mayor de 200px de ancho',
            'provider' => 'upload',
        ]);

        return $validator;
    }


    public function validationDimensions250x250(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->provider('upload', \Josegonzalez\Upload\Validation\ImageValidation::class);

        $validator->add('image', 'fileAboveMinHeight', [
            'rule'     => ['isAboveMinHeight', 250],
            'message'  => 'Esta imagen debe ser por lo menos 250px alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxHeight', [
            'rule'     => ['isBelowMaxHeight', 250],
            'message'  => 'Esta imagen no debe ser mayor de 250px de alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileAboveMinWidth', [
            'rule'     => ['isAboveMinWidth', 250],
            'message'  => 'Esta imagen debe ser por lo menos 250px de ancho',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxWidth', [
            'rule'     => ['isBelowMaxWidth', 250],
            'message'  => 'Esta imagen no debe ser mayor de 250px de ancho',
            'provider' => 'upload',
        ]);

        return $validator;
    }

    public function validationDimensions300x250(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->provider('upload', \Josegonzalez\Upload\Validation\ImageValidation::class);

        $validator->add('image', 'fileAboveMinHeight', [
            'rule'     => ['isAboveMinHeight', 250],
            'message'  => 'Esta imagen debe ser por lo menos 250px alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxHeight', [
            'rule'     => ['isBelowMaxHeight', 250],
            'message'  => 'Esta imagen no debe ser mayor de 250px de alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileAboveMinWidth', [
            'rule'     => ['isAboveMinWidth', 300],
            'message'  => 'Esta imagen debe ser por lo menos 300px de ancho',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxWidth', [
            'rule'     => ['isBelowMaxWidth', 300],
            'message'  => 'Esta imagen no debe ser mayor de 300px de ancho',
            'provider' => 'upload',
        ]);

        return $validator;
    }

    public function validationDimensions300x600(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->provider('upload', \Josegonzalez\Upload\Validation\ImageValidation::class);

        $validator->add('image', 'fileAboveMinHeight', [
            'rule'     => ['isAboveMinHeight', 600],
            'message'  => 'Esta imagen debe ser por lo menos 600px alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxHeight', [
            'rule'     => ['isBelowMaxHeight', 600],
            'message'  => 'Esta imagen no debe ser mayor de 600px de alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileAboveMinWidth', [
            'rule'     => ['isAboveMinWidth', 300],
            'message'  => 'Esta imagen debe ser por lo menos 300px de ancho',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxWidth', [
            'rule'     => ['isBelowMaxWidth', 300],
            'message'  => 'Esta imagen no debe ser mayor de 300px de ancho',
            'provider' => 'upload',
        ]);

        return $validator;
    }

    public function validationDimensions336x280(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        $validator->provider('upload', \Josegonzalez\Upload\Validation\ImageValidation::class);

        $validator->add('image', 'fileAboveMinHeight', [
            'rule'     => ['isAboveMinHeight', 280],
            'message'  => 'Esta imagen debe ser por lo menos 280px alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxHeight', [
            'rule'     => ['isBelowMaxHeight', 280],
            'message'  => 'Esta imagen no debe ser mayor de 280px de alto',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileAboveMinWidth', [
            'rule'     => ['isAboveMinWidth', 336],
            'message'  => 'Esta imagen debe ser por lo menos 336px de ancho',
            'provider' => 'upload',
        ]);

        $validator->add('image', 'fileBelowMaxWidth', [
            'rule'     => ['isBelowMaxWidth', 336],
            'message'  => 'Esta imagen no debe ser mayor de 336px de ancho',
            'provider' => 'upload',
        ]);

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
