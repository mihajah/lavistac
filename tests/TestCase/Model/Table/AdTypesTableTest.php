<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdTypesTable Test Case
 */
class AdTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdTypesTable
     */
    public $AdTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ad_types',
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
        $config = TableRegistry::exists('AdTypes') ? [] : ['className' => 'App\Model\Table\AdTypesTable'];
        $this->AdTypes = TableRegistry::get('AdTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdTypes);

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
