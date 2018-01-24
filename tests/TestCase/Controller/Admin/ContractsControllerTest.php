<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\ContractsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\ContractsController Test Case
 */
class ContractsControllerTest extends IntegrationTestCase
{

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
        'app.ads',
        'app.ad_types',
        'app.categories',
        'app.cities',
        'app.announces_cities',
        'app.pics',
        'app.toplists'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}