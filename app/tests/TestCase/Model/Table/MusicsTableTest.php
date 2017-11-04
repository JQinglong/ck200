<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MusicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MusicsTable Test Case
 */
class MusicsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MusicsTable
     */
    public $Musics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.musics',
        'app.singers',
        'app.lylics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Musics') ? [] : ['className' => 'App\Model\Table\MusicsTable'];
        $this->Musics = TableRegistry::get('Musics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Musics);

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
