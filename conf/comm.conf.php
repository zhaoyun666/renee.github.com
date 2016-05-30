<?php
$_Config = array();

// database conf

$_Config["db"]["message"]["host"] = "127.0.0.1";
$_Config["db"]["message"]["user"] = "root";
$_Config["db"]["message"]["password"] = "123456";
$_Config["db"]["message"]["database"] = "car_message";
$_Config["db"]["message"]["port"] = "3306";
$_Config["db"]["message"]["charset"] = "utf-8";

// redis conf
$_Config["default"]["redis"]["host"] = "127.0.0.1";
$_Config["default"]["redis"]["port"] = "6379";


//url conf 
/*
 * is_rewrite = true index.php/a/b/c?param=a=1&b=2&c=3
 * is_rewrite =false index.php?m(模块)=x&c(控制器)=y&a(执行动作)=z
 */
$_Config["is_rewrite"] = true;
$_Config["is_module"] = true;
$_Config['c']['path']                  = 'controller/';
$_Config['c']['controller_postfix']    = 'Controller'; //控制器文件后缀名
$_Config['c']['action_postfix']        = 'Action'; //Action函数名称后缀
$_Config['c']['default_controller']    = 'hello'; //默认执行的控制器名称
$_Config['c']['default_action']        = 'run'; //默认执行的Action函数
$_Config['c']['default_module']        = 'badboy'; //默认执行module

$_Config['template'] = "views/";
$_Config['view_ext'] = ".php"; 

define("APIKEY", "044160e58536443b92b1c7dbaa6d8e1d");




