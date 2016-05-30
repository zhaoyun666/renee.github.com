<?php 
define("DS", DIRECTORY_SEPARATOR);
define("ROOTDIR", dirname(__FILE__).DS);
define("APP", ROOTDIR."app");
define("EXT", ".php");
define("APPNAME", "app");

if (!file_exists(ROOTDIR . 'vendor/autoload.php')) {
    die("<p>Load class file not found!!!</p>" . PHP_EOL);
}
require ROOTDIR . 'vendor/autoload.php';
require_once ROOTDIR . "conf" . DS . "comm.conf.php";
\AceApi\AceApi::Run();
?>
