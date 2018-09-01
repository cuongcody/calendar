<?php
namespace app\unitests;

require_once(dirname(__FILE__).'/../init.php');
require_once(dirname(__FILE__).'/../models/Index.php');
use PHPUnit\Framework\TestCase;

class TestInsertWork extends TestCase
{
    protected $db;
    public function setUp()
    {
        $this->db = new Index();
        $this->db->beginTransaction();
    }

    public function tearDown()
    {
        $this->db->rollBackTransaction();
    }
    public function testInsertData()
    {
        $work = $this->db->insert(['title' => 'Tess333st', 'start_date' => time(), 'end_date' => time()]);
        $this->assertTrue($work);
    }
}
