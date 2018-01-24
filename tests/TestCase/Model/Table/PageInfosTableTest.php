<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PageInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PageInfosTable Test Case
 */
class PageInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PageInfosTable
     */
    public $PageInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.page_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PageInfos') ? [] : ['className' => 'App\Model\Table\PageInfosTable'];
        $this->PageInfos = TableRegistry::get('PageInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PageInfos);

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
