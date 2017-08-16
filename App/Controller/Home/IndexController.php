<?php
/**
 * 这是一个栗子
 */
namespace Controller\Home;
use Core\Controller;
class IndexController extends Controller{
        public function Index(){
            $this->render("index/index");
        }
}