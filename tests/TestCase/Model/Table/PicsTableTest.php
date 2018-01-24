<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PicsTable Test Case
 */
class PicsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PicsTable
     */
    public $Pics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pics',
        'app.announces',
        'app.users',
        'app.groups',
        'app.contracts',
        'app.contract_types',
        'app.ads',
        'app.ad_types',
        'app.states',
        'app.cities',
        'app.categories',
        'app.toplists',
        'app.announces_cities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pics') ? [] : ['className' => 'App\Model\Table\PicsTable'];
        $this->Pics = TableRegistry::get('Pics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pics);

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
