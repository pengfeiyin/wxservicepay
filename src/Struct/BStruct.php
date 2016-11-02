<?php
/**
 * Created by PhpStorm.
 * User: Mztli
 * Date: 2016/10/31
 * Time: 16:07
 */

namespace Service\Struct;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class BStruct
{

    /**合并属性为数组
     * @param array $Options  需要与属性合并的数组
     * @param array $filters  需要过滤检测的参数
     */
    protected function MergeOptions(&$Options, $filters = []){
        foreach ($this as $key => $value){
            if(!empty($value)){
                $Options[$key] = $value;
                continue;
            }

            if(!in_array($key,$filters)){
                throw new InvalidArgumentException($key.'参数不能缺失');
            }
        }
    }

}