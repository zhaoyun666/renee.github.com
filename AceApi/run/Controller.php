<?php
/**
 * ==============================================
 * 版权所有 2015-2038
 * ----------------------------------------------
 * 您可以自由使用该源码，但是在使用过程中，请保留作者信息。尊重他人劳动成果就是尊重自己
 * ==============================================
 * @date: May 27, 2015
 * @time: 19:11:22 PM
 * @author: zhaozhao911@yahoo.com
 * @version:
 */
namespace AceApi\run;

class Controller
{

    private $viewFile = "index/welcome";

    /**
     * 进行身份验证 token 用户信息
     * @date: May 27, 2016
     * 
     * @author : zhaozhao911@yahoo.com
     * @return :
     */
    public function __construct()
    {

    }

    /**
     * 视图
     *
     * @param unknown $viewFile            
     * @param unknown $params            
     */
    protected function view($viewFile, $params = array())
    {
        $tplDir = \AceApi\AceApi::getConfig("template");
        $mDir = \AceApi\AceApi::getConfig("c.default_module");
        $viewExt = \AceApi\AceApi::getConfig("view_ext");
        $views = APP . DS . $tplDir . $mDir. DS. $this->viewFile . $viewExt;
        
        if (\file_exists(APP . DS . $tplDir . $viewFile . $viewExt)) {
            $views = APP . DS . $tplDir . $viewFile .$viewExt;
        }
        if(!empty($params)){
            \extract($params);
        }
        require $views;
    }
    
    /**
     * ajax 成功返回参数
     *
     * @param unknown $code            
     * @param unknown $message            
     * @param unknown $data            
     */
    protected function ajaxSuccess($code, $message = null, $data = null)
    {
        self::apiReturn($code, $message, $data);
    }

    private function apiReturn($code, $message, $data)
    {
        $return_data = new \stdClass();
        $return_data->code = $code;
        $return_data->msg = $message;
        $return_data->data = $data;
        exit(json_encode($return_data));
    }

    /**
     * ajax 失败返回参数
     *
     * @param unknown $code            
     * @param unknown $message            
     * @param unknown $data            
     */
    protected function ajaxError($code, $message = null, $data = null)
    {
        self::apiReturn($code, $message, $data);
    }

    protected function getParameter($key)
    {
        if (empty($key)) {
            return $_REQUEST;
        }
        
        if (is_array($key)) {
            $tmp = [];
            foreach ($key as $v) {
                $tmp[$v] = isset($_REQUEST[$v]) && $this->_filter($_REQUEST[$v]) ? $_REQUEST[$v] : "";
            }
            return $tmp;
        } else {
            $tmp = null;
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $tmp = isset($_GET[$key]) && $this->_filter($_GET[$key]) ? $_GET[$key] : "";
                unset($_GET[$key]);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $tmp = isset($_POST[$key]) && $this->_filter($_POST[$key]) ? $_POST[$key] : "";
                unset($_POST[$key]);
            }
            return $tmp;
        }
    }

    private function _filter($str)
    {
        return preg_match('/^[A-Za-z0-9_]+$/', trim($str));
    }
} 