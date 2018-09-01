<?php
namespace app\unitests;
require_once(dirname(__FILE__).'/../init.php');

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testConnection()
    {
        $database = new Database();
        $this->assertInstanceOf('Database', $database);
    }
}
