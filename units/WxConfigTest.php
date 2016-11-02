<?php
require '../vendor/autoload.php';
use Service\Config\WxConfig;
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 17:02
 */
class WxConfigTest extends PHPUnit_Framework_TestCase
{
    public function testEmpty(){
        $this->assertEmpty(WxConfig::$AppId);
    }
}
