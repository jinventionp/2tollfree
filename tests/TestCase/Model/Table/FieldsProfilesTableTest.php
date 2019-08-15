<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FieldsProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FieldsProfilesTable Test Case
 */
class FieldsProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FieldsProfilesTable
     */
    public $FieldsProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FieldsProfiles',
        'app.Profiles',
        'app.Fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FieldsProfiles') ? [] : ['className' => FieldsProfilesTable::class];
        $this->FieldsProfiles = TableRegistry::getTableLocator()->get('FieldsProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FieldsProfiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
