<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfilesRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfilesRolesTable Test Case
 */
class ProfilesRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfilesRolesTable
     */
    public $ProfilesRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProfilesRoles',
        'app.Roles',
        'app.Profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProfilesRoles') ? [] : ['className' => ProfilesRolesTable::class];
        $this->ProfilesRoles = TableRegistry::getTableLocator()->get('ProfilesRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProfilesRoles);

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
