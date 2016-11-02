<?php
require 'vendor/autoload.php';
\Service\Config\WxConfig::GetInstance()->setAppId('wxafc75d81282df574');
\Service\Config\WxConfig::GetInstance()->setMchId('1290022401');
\Service\Config\WxConfig::GetInstance()->setKey('5dcfaXKBaejHcP3cXMOSu6SMh5b3RLK1');

$struct = new \Service\Struct\UnifiedOrderStruct();
$struct->SetSubmchid('1401471002');
$struct->SetBody('PayTest');
$struct->SetNotifyurl('http://www.baidu.com/index.php');
$struct->SetOuttradeno('11223344556677');
$struct->SetTotalfee(1);
$Order = new \Service\Order();
$Result = $Order->UnifiedOrder($struct);
var_dump($Result);