<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MusicHskcountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MusicHskcountsTable Test Case
 */
class MusicHskcountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MusicHskcountsTable
     */
    public $MusicHskcounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.music_hskcounts',
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
        $config = TableRegistry::exists('MusicHskcounts') ? [] : ['className' => 'App\Model\Table\MusicHskcountsTable'];
        $this->MusicHskcounts = TableRegistry::get('MusicHskcounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MusicHskcounts);

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
