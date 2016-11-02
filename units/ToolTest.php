<?php
require '../vendor/autoload.php';
use  Service\Tools\Tool;
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 16:47
 */
class ToolTest extends PHPUnit_Framework_TestCase
{
    public function testLength(){
        $str = Tool::RandStr(32);
        $this->assertEquals(32,strlen($str));
    }

    public function testEmpty(){
        $str = Tool::RandStr(0);
        $this->assertEmpty($str);
    }
}
