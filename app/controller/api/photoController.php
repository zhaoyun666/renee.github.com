<?php
/**
* ==============================================
* 版权所有 2015-2038
* ----------------------------------------------
* 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
* ==============================================
* @date: May 28, 2016
* @time: 12:00:03 AM
* @author: zhaozhao911@yahoo.com
* @version:
*/
namespace app\controller\api;
use AceApi\run\Controller;
class photoController extends Controller{
    public function listAction()
    {
        $this->view("api/photo/list");
    }
}