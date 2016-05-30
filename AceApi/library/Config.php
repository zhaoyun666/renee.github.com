<?php
/**
* ==============================================
* 版权所有 2015-2038
* ----------------------------------------------
* 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
* ==============================================
* @date: May 27, 2015
* @time: 01:13:09 PM
* @author: zhaozhao911@yahoo.com
* @version:
*/
namespace AceApi\library;

class Config
{
    public static function LoadConfig($key){
        if(!file_exists(ROOTDIR."conf/common.conf.php")){
            die("Can't load config file");
        }
        $conf = require APP."conf/common.conf.php";
        list($k, $v) = explode(".", $key);
        if(!is_array($conf[$k][$v]) || empty($conf[$k][$v])){
            die("config info error");
        }
        return $conf[$k][$v];
    }
}

?>