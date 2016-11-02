<?php
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 15:42
 */

namespace Service\Struct;


use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Service\Config\WxConfig;
use Service\Tools\Tool;

class UnifiedOrderStruct extends BStruct  implements IStruct
{
    /*子商户公众号APPID*/
    protected $sub_appid;
    /*子商户商户号*/
    protected $sub_mch_id;
    /*商品描述*/
    protected $body;
    /*商户订单号*/
    protected $out_trade_no;
    /*交易金额*/
    protected $total_fee;
    /*回调地址*/
    protected $notify_url;
    /*支付者OpenId，如果有SubAppId，这个必须有值*/
    protected $sub_openid;

    protected $openid;

    /**
     * @param mixed $openid
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;
    }

    public function SetSubappid($sub_appid){
        $this->sub_appid = $sub_appid;
    }

    public function SetSubmchid($sub_mch_id){
        $this->sub_mch_id = $sub_mch_id;
    }

    public function SetBody($body){
        $this->body = $body;
    }

    public function SetOuttradeno($out_trade_no){
        $this->out_trade_no = $out_trade_no;
    }

    public function SetTotalfee($totle_fee){
        $this->total_fee = $totle_fee;
    }

    public function SetNotifyurl($notify_url){
        $this->notify_url = $notify_url;
    }

    public function SetSubopenid($sub_openid){
        $this->sub_openid = $sub_openid;
    }

    public function GetParams(){
        /*如果填写了openid ，就让sub_openid,sub_appid作废*/
        if(isset($this->openid)){
            $this->sub_appid = '';
            $this->sub_openid = '';
        }

        if(!empty($this->sub_appid) && empty($this->sub_openid))
            throw new InvalidArgumentException('如果填写了SubAppId，就必须填写SubOpenId');

        if(!empty($this->sub_openid) && empty($this->sub_appid))
            throw new InvalidArgumentException('如果填写了SubOpenId，就必须填写SubAppId');

        $Options = [
            'appid'=>WxConfig::GetInstance()->getAppId(),
            'mch_id'=>WxConfig::GetInstance()->getMchId(),
            'device_info' => 'WEB',
            'nonce_str' => Tool::RandStr(32),
            'trade_type' => 'JSAPI',
            'spbill_create_ip' => '14.23.150.211'
        ];
        $this->MergeOptions($Options,['sub_appid','sub_openid']);
        return $Options;
    }
}