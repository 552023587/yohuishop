<?php
/**
 * 这是一个栗子
 */
namespace Controller\Home;
use Core\Controller;
class IndexController extends Controller{
 public function Index(){
    //加载一个用户数据模型
    //$lists = $this->loadModel("user")->select();
     $this->render("index/index");
 }
}