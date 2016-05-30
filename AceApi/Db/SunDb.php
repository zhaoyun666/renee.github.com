<?php
/**
* ==============================================
* 版权所有 2015-2038
* ----------------------------------------------
* 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
* ==============================================
* @date: May 25, 2015
* @time: 10:12:22 PM
* @author: zhaozhao911@yahoo.com
* @version:
*/
namespace AceApi\Db;

use AceApi\Db\driver\Mysqli;
use AceApi\library\Config;

class SunDb implements Mysqli
{

    private static $instance = null;

    private static $database = null;
    
    const FETCH_OBJ = 1;
    
    const FETCH_ASSOC = 2;

    public function connect($db = "")
    {
        if (! self::$instance) {
            $config = Config::LoadConfig($db);
            self::$instance = new \Mysqli($config["host"], $config["user"], $config["password"], $config["database"], $config["port"]);
        }
        if (self::$instance->connect_error) {
            die("Connect error" . \mysqli_connect_error() . PHP_EOL);
        }
        self::$instance->set_charset($config["charset"]);
    }

    public static function init($db)
    {
        self::connect($db);
        if (self::$database === null) {
            self::$database = new SunDb();
        }
        return self::$database;
    }
    
    public function fetchAll($sql, $dataType)
    {
        $res = self::query($sql);
        $result = [];
        while ($row = $this->dataType($dataType, $res)) {
            $result[] = $row;
        }
        mysqli_free_result($res);
        self::close();
        return $result;
    }
    
    public function dataType($dataType, $result)
    {
        switch ($dataType) {
            case 1:
                $obj = \mysqli_fetch_object($result);
                break;
            case 2:
                $obj = \mysqli_fetch_assoc($result);
                break;
            default:
                $obj = \mysqli_fetch_array($result);
                break;
        }
        return $obj;
    }

    public function query($sql)
    {
        if(!self::$instance->query($sql)){
            die(self::$instance->error_list.PHP_EOL);
        }
        return self::$instance->query($sql);
    }

    public function close()
    {
        if(self::$instance){
            self::$instance->close();
        }
        self::$instance = null;
    }
}

?>