# wxservicepay
Wx ServicePay library
###安装方式
```php
composer require mztli/wspp
```

最简单的支付例子
```php
<?php
require 'vendor/autoload.php';
\Service\Config\WxConfig::GetInstance()->setAppId('you appid');
\Service\Config\WxConfig::GetInstance()->setMchId('you mchid');
\Service\Config\WxConfig::GetInstance()->setKey('you key');

$struct = new \Service\Struct\UnifiedOrderStruct();
$struct->SetSubmchid('you sub_mch_id');
$struct->SetBody('PayTest');
$struct->SetNotifyurl('http://www.baidu.com/index.php');
$struct->SetOuttradeno('11223344556677');
$struct->SetTotalfee(1);
$struct->setOpenid('o1AQjwiqHuE4vINpkFO76SZWf334');
$Order = new \Service\Order();
$Result = $Order->UnifiedOrder($struct);
var_dump($Result);
```
