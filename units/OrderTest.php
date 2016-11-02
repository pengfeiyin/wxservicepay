<?php
require '../vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 17:48
 */
use Service\Order;
use Service\Struct\UnifiedOrderStruct;
class OrderTest extends PHPUnit_Framework_TestCase
{
    public function testUnifiedOrder(){
        \Service\Config\WxConfig::GetInstance()->setAppId('xxx');
        \Service\Config\WxConfig::GetInstance()->setMchId('xxxxxxxx');
        \Service\Config\WxConfig::GetInstance()->setKey('xxxxxxxx');
        $Order = new Order();
        $OrderStruct = new UnifiedOrderStruct();
        $OrderStruct->SetTotalfee(1);
        $OrderStruct->SetSubmchid('1401471002');
        $OrderStruct->SetBody('PayTest');
        $OrderStruct->SetNotifyurl('http://www.baidu.com');
        $OrderStruct->SetOuttradeno('qqqqqqqqq');
        $OrderStruct->SetSubappid('wxafc75d81282df574');
        $OrderStruct->SetSubopenid('o1AQjwr9kri_klTn5upgI7p23XYQ');
        $Response = $Order->UnifiedOrder($OrderStruct);
        $this->assertArrayHasKey('return_code',$Response);
    }

    public function testQueryOrder(){
        $Struct = new \Service\Struct\QueryOrderStruct();
        $Struct->setNonceStr(\Service\Tools\Tool::RandStr(32));
        $Struct->setOutTradeNo(\Service\Tools\Tool::RandStr(32));
        $Struct->setSubMchId('1401471002');
        $Struct->setTransactionId('qweqweasd');
        $Order = new Order();
        $Response = $Order->QueryOrder($Struct);
        $this->assertArrayHasKey('return_code',$Response);
    }

    public function testCloseOrder(){
        $struct = new \Service\Struct\CloseOrderStruct();
        $struct->setSubAppid('wxafc75d81282df574');
        $struct->setOutTradeNo('qweqweasd');
        $struct->setSubMchId('1401471002');
        $Order = new Order();
        $Response = $Order->CloseOrder($struct);
        $this->assertArrayHasKey('return_code',$Response);
    }
}
