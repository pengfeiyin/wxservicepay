<?php
require '../vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 17:30
 */
use Service\Struct\UnifiedOrderStruct;
use Service\Tools\Xml;
class UnifiedOrderStructTest extends PHPUnit_Framework_TestCase
{

    public function testException(){
        $this->expectException('InvalidArgumentException');
        $Struct = new UnifiedOrderStruct();
        $Struct->SetBody('Pay Test');
        $Struct->SetNotifyurl('http://www.baidu.com');
        $Struct->SetOuttradeno('123456');
        $Struct->SetSubappid('123');
        $Struct->SetSubmchid('000');
        $Struct->SetTotalfee('1');
        $Struct->GetParams();
    }

    public function testNotEmpty(){
        $Struct = new UnifiedOrderStruct();
        $Struct->SetBody('Pay Test');
        $Struct->SetNotifyurl('http://www.baidu.com');
        $Struct->SetOuttradeno('123456');
        $Struct->SetSubmchid('000');
        $Struct->SetTotalfee('1');
        $Parasm = $Struct->GetParams();
        $this->assertNotEmpty($Parasm);
    }
}
