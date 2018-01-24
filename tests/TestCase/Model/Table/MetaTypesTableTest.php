<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetaTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetaTypesTable Test Case
 */
class MetaTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MetaTypesTable
     */
    public $MetaTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meta_types',
        'app.metas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MetaTypes') ? [] : ['className' => 'App\Model\Table\MetaTypesTable'];
        $this->MetaTypes = TableRegistry::get('MetaTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MetaTypes);

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
