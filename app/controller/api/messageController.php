<?php
namespace app\controller\api;
use AceApi\run\Controller;

class messageController extends Controller{
    
    public function indexAction()
    {
        $this->view("api/message/index");
    }
}