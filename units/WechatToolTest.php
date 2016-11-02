<?php
require '../vendor/autoload.php';
use Service\Tools\WechatTool;
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 16:46
 */
class WechatToolTest extends PHPUnit_Framework_TestCase
{
    public function testSign(){
        /*结果*/
        $Sign = strtoupper(md5('a=2&b=5&c=1&key=123456789'));
        /*测试*/
        $Array = [
            'a'=>'2',
            'c'=>'1',
            'b'=>'5'
        ];
        $Res = WechatTool::Sign($Array,'123456789');
        $this->assertEquals($Sign,$Res,'签名错误，不匹配');
    }
}
