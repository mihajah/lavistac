<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AdsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AdsController Test Case
 */
class AdsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ads',
        'app.ad_types',
        'app.contracts',
        'app.contract_types',
        'app.users',
        'app.groups',
        'app.announces',
        'app.states',
        'app.cities',
        'app.announces_cities',
        'app.categories',
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
