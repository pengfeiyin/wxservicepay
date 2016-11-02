<?php

namespace Service;
use Service\Config\WxConfig;
use Service\Config\WxURLConfig;
use Service\Struct\CloseOrderStruct;
use Service\Struct\QueryOrderStruct;
use Service\Struct\UnifiedOrderStruct;
use Service\Tools\Tool;
use Service\Tools\WechatTool;
use Service\Tools\Xml;
use Service\Tools\Http;
class Order{
    public function UnifiedOrder(UnifiedOrderStruct $struct){
        $PostStr = WechatTool::GetPostStr($struct);
        $Xml = new Xml();
        $Response = $Xml->XmlToArray(Http::Post(WxURLConfig::Unified_Order,$PostStr));
        return $Response;
    }

    public function QueryOrder(QueryOrderStruct $struct){
        $PostStr = WechatTool::GetPostStr($struct);
        $Xml = new Xml();
        $Response = $Xml->XmlToArray(Http::Post(WxURLConfig::Query_Order,$PostStr));
        return $Response;
    }

    public function CloseOrder(CloseOrderStruct $struct){
        $PostStr = WechatTool::GetPostStr($struct);
        $Xml = new Xml();
        $Response = $Xml->XmlToArray(Http::Post(WxURLConfig::Query_Order,$PostStr));
        return $Response;
    }
}