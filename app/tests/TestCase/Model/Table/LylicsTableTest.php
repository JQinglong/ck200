<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LylicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LylicsTable Test Case
 */
class LylicsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LylicsTable
     */
    public $Lylics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lylics',
        'app.musics',
        'app.singers',
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
        $config = TableRegistry::exists('Lylics') ? [] : ['className' => 'App\Model\Table\LylicsTable'];
        $this->Lylics = TableRegistry::get('Lylics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lylics);

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
