<?php
/**
 * ==============================================
 * 版权所有 2015-2038
 * ----------------------------------------------
 * 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
 * ==============================================
 * @date: May 27, 2016
 * @time: 10:12:22 PM
 * @author: zhaozhao911@yahoo.com
 * @version:
 */
namespace AceApi\run;

class Router{
    
    private static $isRewrite = false;
    
    private $isModule = false;
    
    public static function dispatcher()
    {
        self::parse();
    }
    
    private function parse()
    {
        $uriType = \AceApi\AceApi::getConfig('is_rewrite');;
        if($uriType){
            $temp = self::getRequest();
            $request = [];
            foreach($temp as $r){
                $request[] = $r;
            }
            unset($temp);
            global $Ace049e0f64385809ab547907c024599a60;
            if(isset($request[0])){
                $Ace049e0f64385809ab547907c024599a60['_m'] = $request[0];   
            }
            if(isset($request[1])){
                $Ace049e0f64385809ab547907c024599a60['_c'] = $request[1];
            }
            if(isset($request[2])){
                $Ace049e0f64385809ab547907c024599a60['_a'] = $request[2];
            }
        }else{
            throw new \Exception("仅支持\\a\\b\\c Url", 9999);
        } 
    }
    
    private function getRequest()
    {
        $filter_param = [
            '<',
            '>',
            '"',
            "'",
            '%3C',
            '%3E',
            '%22',
            '%27',
            '%3c',
            '%3e',
            '~'
        ];
        $uri = str_replace($filter_param, '', $_SERVER['REQUEST_URI']);
        $parseUrl = parse_url($uri);
        return array_filter(explode("/", $parseUrl['path']), function($v){
            return $v!="" && $v!=="index.php";
        });
    }
    
    
    
}