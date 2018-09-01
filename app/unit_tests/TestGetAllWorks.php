<?php
namespace app\unitests;
require_once(dirname(__FILE__).'/../init.php');
require_once(dirname(__FILE__).'/../models/Index.php');
use PHPUnit\Framework\TestCase;

class TestGetAllWorks extends TestCase
{
    protected $db;
    public function setUp()
    {
        $this->db = new Index();
    }
    public function testGetAllData()
    {
        $works = $this->db->all();
        $this->assertInternalType('array', $works);
    }
}
