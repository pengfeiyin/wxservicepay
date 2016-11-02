<?php
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 14:43
 */

namespace Service\Tools;


use InvalidArgumentException;
use Service\Struct\BStruct;
use Service\Config\WxConfig;
use Service\Tools\Xml;
class WechatTool
{
    static  public function Sign(&$Params,$Key){
        if(!is_array($Params))
            throw new InvalidArgumentException('需要签名的参数必须是数组，现在所传递的参数不是数组');

        if(empty($Key))
            throw new InvalidArgumentException('请传入Key');

        ksort($Params);
        $StrTmp = "";
        foreach ($Params as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $StrTmp .= $k . "=" . $v . "&";
            }
        }
        $StrTmp = trim($StrTmp, "&");
        $StrTmp .= '&key='.$Key;
        $Sign = md5($StrTmp);
        $Sign = strtoupper($Sign);
        return $Sign;
    }

    static public function GetPostStr(BStruct $struct){
        $Parasm = $struct->GetParams();
        $Sign = WechatTool::Sign($Parasm,WxConfig::GetInstance()->getKey());
        $Parasm['sign'] = $Sign;
        $Xml = new Xml();
        $PostStr = $Xml->ArrayToXml($Parasm);
        $PostStr = Tool::Trimall($PostStr);
        return $PostStr;
    }
}