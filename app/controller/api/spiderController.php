<?php
namespace app\controller\api;

use AceApi\run\Controller;
class spiderController extends Controller{
    
    public function indexAction()
    {
        $this->view("api/net_spider/index");
    }
}