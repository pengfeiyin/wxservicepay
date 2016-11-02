<?php
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/31
 * Time: 15:51
 */

namespace Service\Struct;
use Service\Config\WxConfig;
use Service\Tools\Tool;
class QueryOrderStruct extends BStruct  implements IStruct
{

    protected $sub_mch_id;
    protected $transaction_id;
    protected $out_trade_no;
    protected $sub_appid;

    /**
     * @param mixed $sub_mch_id
     */
    public function setSubMchId($sub_mch_id)
    {
        $this->sub_mch_id = $sub_mch_id;
    }

    /**
     * @param mixed $transaction_id
     */
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;
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
        if(!empty($this->transaction_id) && !empty($this->out_trade_no)){
            $this->out_trade_no = '';
        }
        $this->MergeOptions($Options,['sub_appid','out_trade_no']);
        return $Options;
    }
}