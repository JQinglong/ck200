<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SingersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SingersTable Test Case
 */
class SingersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SingersTable
     */
    public $Singers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.singers',
        'app.musics',
        'app.lylics',
        'app.music_hskcounts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Singers') ? [] : ['className' => 'App\Model\Table\SingersTable'];
        $this->Singers = TableRegistry::get('Singers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Singers);

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
