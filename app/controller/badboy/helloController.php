<?php 
namespace app\controller\badboy;
use AceApi\run\Controller;
class helloController extends Controller{

    public function runAction() 
    {
        $this->ajaxSuccess(200,"Welcome to use It!");
    }
}
?>