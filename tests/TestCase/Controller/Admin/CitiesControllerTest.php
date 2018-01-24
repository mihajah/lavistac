<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\CitiesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\CitiesController Test Case
 */
class CitiesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cities',
        'app.states',
        'app.ads',
        'app.ad_types',
        'app.contracts',
        'app.contract_types',
        'app.users',
        'app.groups',
        'app.announces',
        'app.categories',
        'app.pics',
        'app.announces_cities',
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
