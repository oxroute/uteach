<?php
/*
 * 首页控制器
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
       $this->display();
    }
}