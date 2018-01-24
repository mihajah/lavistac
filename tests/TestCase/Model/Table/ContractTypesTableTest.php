<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractTypesTable Test Case
 */
class ContractTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractTypesTable
     */
    public $ContractTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contract_types',
        'app.contracts',
        'app.users',
        'app.groups',
        'app.announces',
        'app.states',
        'app.ads',
        'app.ad_types',
        'app.categories',
        'app.cities',
        'app.announces_cities',
        'app.pics',
        'app.toplists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContractTypes') ? [] : ['className' => 'App\Model\Table\ContractTypesTable'];
        $this->ContractTypes = TableRegistry::get('ContractTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContractTypes);

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
}
