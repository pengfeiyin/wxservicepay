<?php
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/31
 * Time: 18:23
 */

namespace Service\Struct;
use Service\Config\WxConfig;
use Service\Tools\Tool;
class CloseOrderStruct extends BStruct implements IStruct
{
    protected $sub_mch_id;
    protected $out_trade_no;
    protected $sub_appid;

    /**
     * @param mixed $sub_appid
     */
    public function setSubAppid($sub_appid)
    {
        $this->sub_appid = $sub_appid;
    }

    /**
     * @param mixed $sub_mch_id
     */
    public function setSubMchId($sub_mch_id)
    {
        $this->sub_mch_id = $sub_mch_id;
    }

    /**
     * @param mixed $out_trade_no
     */
    public function setOutTradeNo($out_trade_no)
    {
        $this->out_trade_no = $out_trade_no;
    }



    public function GetParams()
    {
        $Options = [
            'appid'=>WxConfig::GetInstance()->getAppId(),
            'mch_id'=>WxConfig::GetInstance()->getMchId(),
            'nonce_str' => Tool::RandStr(32)
        ];

        $this->MergeOptions($Options,['sub_appid']);
        return $Options;
    }
}