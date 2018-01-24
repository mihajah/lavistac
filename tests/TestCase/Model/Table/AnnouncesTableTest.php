<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnouncesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnouncesTable Test Case
 */
class AnnouncesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnouncesTable
     */
    public $Announces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.pics',
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
        $config = TableRegistry::exists('Announces') ? [] : ['className' => 'App\Model\Table\AnnouncesTable'];
        $this->Announces = TableRegistry::get('Announces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Announces);

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
