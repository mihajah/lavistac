<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ToplistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ToplistsTable Test Case
 */
class ToplistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ToplistsTable
     */
    public $Toplists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.toplists',
        'app.users',
        'app.groups',
        'app.announces',
        'app.contracts',
        'app.contract_types',
        'app.ads',
        'app.ad_types',
        'app.states',
        'app.cities',
        'app.announces_cities',
        'app.categories',
        'app.pics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Toplists') ? [] : ['className' => 'App\Model\Table\ToplistsTable'];
        $this->Toplists = TableRegistry::get('Toplists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Toplists);

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
