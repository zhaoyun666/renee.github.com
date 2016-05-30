<?php
/**
* ==============================================
* 版权所有 2015-2038
* ----------------------------------------------
* 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
* ==============================================
* @date: May 26, 2015
* @time: 13:12:22 PM
* @author: zhaozhao911@yahoo.com
* @version:
*/
namespace AceApi;
use AceApi\run\Router;
class AceApi
{
    private static $controller_postfix = null; //控制器后缀
    
    private static $action_postfix = null; //action 后缀
    
    private static $default_controller = null;
    
    private static $default_action = null;
    
    private static $default_module = null;
    
    private static $path = null;
    
    // TODO - Insert your code here
    public static function Run()
    {
        try {
            //路由分发
            Router::dispatcher();
            self::setupLoader();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 10000);
        }
    }
    
    private function setupLoader(){
        self::$path = \AceApi\AceApi::getConfig('c.path');
        self::$default_module = \AceApi\AceApi::getConfig('c.default_module');
        self::$default_controller = \AceApi\AceApi::getConfig('c.default_controller');
        self::$default_action = \AceApi\AceApi::getConfig('c.default_action');
        self::$controller_postfix = \AceApi\AceApi::getConfig('c.controller_postfix');
        self::$action_postfix = \AceApi\AceApi::getConfig('c.action_postfix');
        global $Ace049e0f64385809ab547907c024599a60;
        if(isset($Ace049e0f64385809ab547907c024599a60['_m'])){
            self::$default_module = $Ace049e0f64385809ab547907c024599a60['_m'];
        }
        if(isset($Ace049e0f64385809ab547907c024599a60['_c'])){
            self::$default_controller = $Ace049e0f64385809ab547907c024599a60['_c'];
        }
        if(isset($Ace049e0f64385809ab547907c024599a60['_a'])){
            self::$default_action = $Ace049e0f64385809ab547907c024599a60['_a'];
        }
        
        $path = self::$path;
        $class = "\\".APPNAME."\\".self::$path.self::$default_module."\\".self::$default_controller.self::$controller_postfix;
        $class = str_replace("/", "\\", $class);
        
        try {
            $obj = null;
            if(class_exists($class)){
                $obj = new $class();
            }
            $action = self::$default_action.self::$action_postfix;
            
            if(!empty($obj)&& method_exists($obj, $action)){
                $obj->$action();
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        
    }
    
    public static function getConfig($delimiter = "")
    {
        global $_Config;
        if (empty($delimiter)) return $_Config;
        $tmp = $_Config;
        $paths = explode('.', $delimiter);
        
        foreach ($paths as $item) {
            $tmp = isset($tmp[$item]) ? $tmp[$item] : "";
        }
        return $tmp;
    }
}

?>