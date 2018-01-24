<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractsTable Test Case
 */
class ContractsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractsTable
     */
    public $Contracts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contracts',
        'app.contract_types',
        'app.users',
        'app.groups',
        'app.announces',
        'app.states',
        'app.categories',
        'app.pics',
        'app.cities',
        'app.announces_cities',
        'app.toplists',
        'app.ads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contracts') ? [] : ['className' => 'App\Model\Table\ContractsTable'];
        $this->Contracts = TableRegistry::get('Contracts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contracts);

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
