<?php
namespace Service\Config;


class WxConfig
{
    private $AppId;
    private $MchId;
    private $Key;

    static private $_instance;

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->AppId;
    }

    /**
     * @param string $AppId
     */
    public function setAppId($AppId)
    {
        $this->AppId = $AppId;
    }

    /**
     * @return string
     */
    public function getMchId()
    {
        return $this->MchId;
    }

    /**
     * @param string $MchId
     */
    public function setMchId($MchId)
    {
        $this->MchId = $MchId;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * @param string $Key
     */
    public function setKey($Key)
    {
        $this->Key = $Key;
    }


    private function __construct(){}

    static public function GetInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


}