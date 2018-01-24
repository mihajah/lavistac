<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\AnnouncesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\AnnouncesController Test Case
 */
class AnnouncesControllerTest extends IntegrationTestCase
{

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
        'app.announces_cities',
        'app.categories',
        'app.toplists',
        'app.pics'
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
