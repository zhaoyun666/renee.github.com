<?php
use AceApi\Db\SunDb;
use AceApi\library\SunRedis;
define("DS", DIRECTORY_SEPARATOR);
define("ROOTDIR", dirname(__FILE__).DS);
define("APP", ROOTDIR);
//header("Content-Type:text/html;charset=utf8");
/**
 * load autoloader
 */
if (file_exists(ROOTDIR . 'vendor/autoload.php')) {
    require ROOTDIR . 'vendor/autoload.php';
} else {
    echo "<p>file not found!!!</p>" . PHP_EOL;
    exit();
}

//echo strtotime("2016-05-16 10:30:00");
//echo "<hr/>";
$sql = "select messageid, title from car_message_31_extra order by messageid limit 6";
$db = SunDb::init("db.message")->fetchAll($sql, SunDb::FETCH_ASSOC);
//echo json_encode($db);
//print_r($db);die();
$redis = SunRedis::getInstance();
$redis->SunSet("A1", json_encode(array(1, "A", 2, "B")));
foreach($db as $d){
    $redis->SunRpush("messageid", json_encode($d));
}
//echo json_encode($redis->SunGet("A1"));
$script = <<<EOF
    if(not redis.call('EXISTS','messageid'))
    then
        return 1001
    end
    local num=6 
    local result = {}
    for i=0,num do
         result[i] = redis.call('lrange','messageid',(i-1), (i-1))
    end
    return result
EOF;

$list = $redis->SunExecute($script);
echo "<pre>";
foreach($list as $ls){
    print_r(json_decode($ls[0], true));
}
echo "</pre>";
    