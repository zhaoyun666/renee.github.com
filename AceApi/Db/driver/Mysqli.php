<?php
/**
* ==============================================
* 版权所有 2015-2038
* ----------------------------------------------
* 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
* ==============================================
* @date: May 24, 2015
* @time: 11:10:02 PM
* @author: zhaozhao911@yahoo.com
* @version:
*/
namespace AceApi\Db\driver;

interface Mysqli
{
    public function connect($db = "");
    
    public function close();
    
    public function query($sql);
    
    public function fetchAll($sql, $type);
}

?>