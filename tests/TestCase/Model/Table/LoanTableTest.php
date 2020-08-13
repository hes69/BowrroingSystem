<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoanTable Test Case
 */
class LoanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoanTable
     */
    public $Loan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loan',
        'app.items',
        'app.categories',
        'app.users',
        'app.role'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loan') ? [] : ['className' => 'App\Model\Table\LoanTable'];
        $this->Loan = TableRegistry::get('Loan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loan);

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
