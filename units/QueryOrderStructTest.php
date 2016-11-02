<?php
require '../vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/31
 * Time: 16:42
 */
class QueryOrderStructTest extends PHPUnit_Framework_TestCase
{
    public function testNotEmpty(){
        $Struct = new \Service\Struct\QueryOrderStruct();
        $Struct->setNonceStr(\Service\Tools\Tool::RandStr(32));
        $Struct->setOutTradeNo(\Service\Tools\Tool::RandStr(32));
        $Struct->setSubMchId('1231qeqe122');
        $Struct->setTransactionId('qweqweasd');
        $Params = $Struct->GetParams();
        $Sign = \Service\Tools\WechatTool::Sign($Params,\Service\Config\WxConfig::$Key);
        $this->assertNotEmpty($Params);
    }
}
