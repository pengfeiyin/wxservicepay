<?php
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/29
 * Time: 12:04
 */

namespace Service\Tools;


class Tool
{
    static public  function RandStr($Length){
        if($Length <= 0)
            return "";

        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$Length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }

    static function Trimall($str)//删除空格
    {
        $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
        return str_replace($qian,$hou,$str);
    }
}