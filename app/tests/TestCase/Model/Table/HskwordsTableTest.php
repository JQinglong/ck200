<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HskwordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HskwordsTable Test Case
 */
class HskwordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HskwordsTable
     */
    public $Hskwords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hskwords'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hskwords') ? [] : ['className' => 'App\Model\Table\HskwordsTable'];
        $this->Hskwords = TableRegistry::get('Hskwords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hskwords);

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
