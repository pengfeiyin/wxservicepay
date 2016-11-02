<?php
require 'vendor/autoload.php';

\Service\Config\WxConfig::GetInstance()->setAppId('you appid');
\Service\Config\WxConfig::GetInstance()->setMchId('you mchid');
\Service\Config\WxConfig::GetInstance()->setKey('you key');

$struct = new \Service\Struct\QueryOrderStruct();
$struct->setOutTradeNo('112233445566');
$struct->setSubMchId('1401471002');
$struct->setTransactionId('1234567');
$Order = new \Service\Order();
$Result = $Order->QueryOrder($struct);
var_dump($Result);