<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModulesProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModulesProfilesTable Test Case
 */
class ModulesProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModulesProfilesTable
     */
    public $ModulesProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ModulesProfiles',
        'app.Profiles',
        'app.Modules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ModulesProfiles') ? [] : ['className' => ModulesProfilesTable::class];
        $this->ModulesProfiles = TableRegistry::getTableLocator()->get('ModulesProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModulesProfiles);

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
