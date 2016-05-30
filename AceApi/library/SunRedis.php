<?php
/**
* ==============================================
* 版权所有 2015-2038
* ----------------------------------------------
* 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
* ==============================================
* @date: May 27, 2015
* @time: 03:12:21 PM
* @author: zhaozhao911@yahoo.com
* @version:
*/
namespace AceApi\library;

class SunRedis extends \Redis
{
    private static $instance = null;
    
    public static function getInstance()
    {
        if(!self::$instance){
            $config = Config::LoadConfig("default.redis");
            self::$instance = new SunRedis();
            self::$instance->connect($config["host"], $config["port"]);
            if(!self::$instance->ping()){
                throw new \Exception("redis server cant't be connected", 500);
            }
        }
        return self::$instance;
    }
    
    public function SunSet($key, $value, $timeout = 0)
    {
        if($timeout){
            return self::setex($key, $timeout, $value);
        }
        return self::set($key, $value);
    }
    
    public function SunGet($key)
    {
        return self::get($key);
    }
    
    /**
    * @date: 2016-5-12 下午4:47:39
    * @author: zhaoce@linewin.cc
    * 哈希类型  
    */
    public function SunHSet($map, $key, $value)
    {
        return self::hSet($map, $key, $value);
    }
    
    /**
    * @date: 2016-5-12 下午4:49:00
    * @author: zhaoce@linewin.cc
    * 取出哈希数据
    */
    public function SunHGet($map, $key)
    {
        if($key == ""){
            return self::hGetAll();
        }
        return self::hGet($map, $key);
    }
    
    /**
    * @date: 2016-5-12 下午4:48:16
    * @author: zhaoce@linewin.cc
    * 列表
    */
    public function SunRpush($key, $value)
    {
        return self::rPush($key, $value);
    }
    
    //使用lua脚本
    public function SunExecute($lua)
    {
        return self::evaluate($lua);
        //return self::evalsha("cdeb6e576b5d6b5debf5d31b19d312c3ab2e2951");    
    }
    
    /**
    * @date: 2016-5-12 下午4:48:30
    * @author: zhaoce@linewin.cc
    * @return: 关闭连接
    */
    public function SunClose()
    {
        self::close();
    }
}

?>