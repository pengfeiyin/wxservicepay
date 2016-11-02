<?php
require '../vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 18:15
 */
use Service\Tools\Xml;
class XmlTest extends PHPUnit_Framework_TestCase
{
    public function testArrayToXml(){
        $Xml = new Xml();
        $Array = [
            'a' => '1',
            'b' => '22aqwqe',
            'c' => [
                'q' => 12321,
                'd' => 'aseqwe'
            ]
        ];
        $XmlStr = '<xml><a>1</a><b>22aqwqe</b><c><q>12321</q><d>aseqwe</d></c></xml>';
        $Res = $Xml->ArrayToXml($Array);
        $this->assertXmlStringEqualsXmlString($XmlStr,$Res);
    }

    public function testXmlToArray(){
        $Str = '<xml>
                  <appid>wxafc75d81282df574</appid>
                  <body>PayTest</body>
                  <device_info>WEB</device_info>
                  <mch_id>1290022401</mch_id>
                  <nonce_str>kRRNlH2epaIWZaBeIZXb7WBTQ0exNzbw</nonce_str>
                  <notify_url>http://www.baidu.com</notify_url>
                  <out_trade_no>qqqqqqqqq</out_trade_no>
                  <spbill_create_ip>14.23.150.211</spbill_create_ip>
                  <sub_appid>wxafc75d81282df574</sub_appid>
                  <sub_mch_id>
                  
                  <a>qeqeqw</a>>
</sub_mch_id>
                  <sub_openid>o1AQjwr9kri_klTn5upgI7p23XYQ</sub_openid>
                  <total_fee>1</total_fee>
                  <trade_type>JSAPI</trade_type>
                  <sign>6C2096B23B8065B5224B4AEC917C2F2C</sign>
                </xml>
                ';

        $Xml = new Xml();
        $Xml->XmlToArray($Str);
    }
}
