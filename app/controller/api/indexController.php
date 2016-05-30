<?php
namespace app\controller\api;

use AceApi\run\Controller;

class indexController extends Controller
{

    public function indexAction()
    {
        $params = array(
            'name' => "zhaozhao",
            'version' => "1.0.0"
        );
        $this->view("api/index/index", $params);
    }
    
    /**
    * 网络图片爬虫
    * 再次使用http post请求
    * 用python进行爬虫实现
    * @date: May 28, 2016
    * @author: zhaozhao911@yahoo.com
    * @return:
    */
    public function crawlerAction()
    {
        
    }
}