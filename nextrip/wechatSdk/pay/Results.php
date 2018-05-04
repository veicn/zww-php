<?php

namespace WechatSdk\pay;

/**
 * 
 * 接口调用结果类
 * @author widyhu
 *
 */
class Results extends DataBase {

    /**
     * 
     * 检测签名
     */
    public function CheckSign() {
        //fix异常
        if (!$this->IsSignSet()) {
            throw new Exception("签名错误！");
        }

        $sign = $this->MakeSign();
        if ($this->GetSign() == $sign) {
            return true;
        }
        throw new Exception("签名错误！");
    }

    /**
     * 
     * 使用数组初始化
     * @param array $array
     */
    public function FromArray($array) {
        $this->values = $array;
    }

    /**
     * 
     * 使用数组初始化对象
     * @param array $array
     * @param Config $config
     * @param 是否检测签名 $noCheckSign
     */
    public static function InitFromArray($array, $config, $noCheckSign = false) {
        $obj = new self($config);
        $obj->FromArray($array);
        if ($noCheckSign == false) {
            $obj->CheckSign();
        }
        return $obj;
    }

    /**
     * 
     * 设置参数
     * @param string $key
     * @param string $value
     */
    public function SetData($key, $value) {
        $this->values[$key] = $value;
    }

    /**
     * 将xml转为array
     * @param string $xml
     * @param Config $config
     * @throws Exception
     */
    public static function Init($xml, $config) {
        $obj = new self($config);
        $obj->FromXml($xml, $config);
        //fix bug 2015-06-29
        if ($obj->values['return_code'] != 'SUCCESS') {
            return $obj->GetValues();
        }
        $obj->CheckSign();
        return $obj->GetValues();
    }

}