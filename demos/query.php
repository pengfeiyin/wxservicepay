<?php
require 'vendor/autoload.php';

\Service\Config\WxConfig::GetInstance()->setAppId('wxafc75d81282df574');
\Service\Config\WxConfig::GetInstance()->setMchId('1290022401');
\Service\Config\WxConfig::GetInstance()->setKey('5dcfaXKBaejHcP3cXMOSu6SMh5b3RLK1');

$struct = new \Service\Struct\QueryOrderStruct();
$struct->setOutTradeNo('112233445566');
$struct->setSubMchId('1401471002');
$struct->setTransactionId('1234567');
$Order = new \Service\Order();
$Result = $Order->QueryOrder($struct);
var_dump($Result);