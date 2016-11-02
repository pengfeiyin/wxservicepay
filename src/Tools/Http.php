<?php
namespace Service\Tools;
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/3/22
 * Time: 1:50
 */
class Http
{
    static public function Get($Uri,$Header = []){
        //初始化
        $ch = curl_init();
        //设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $Uri);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $Header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        return $output;
    }

    static public function Post($Uri,$PostData,$Header = false){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $Uri);
        curl_setopt($curl, CURLOPT_HEADER, $Header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $PostData);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
    }
}