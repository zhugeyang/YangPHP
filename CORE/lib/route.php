<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/4/22
 * Time: 16:44
 * 路由类
 */
namespace core\lib;
use core\lib\conf;
//路由类，解析URL，找到相应的控制器，方法，get参数等
class route{
    public $ctrl;
    public $action;
    public function __construct()
    {
        //xxx.com/index/index
        /**
         * 1.隐藏index.php
         * 2.获取URL 参数部分
         * 返回对应的控制器和方法
         */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/YangPHP/'){
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->ctrl = $patharr[1];
            }
            unset($patharr[1]);
            if(isset($patharr[2])){
                $this->action = $patharr[2];
            }else{
                $this->action = conf::get('ACTION','route');
            }
            unset($patharr[2]);
            //get参数index/index/id/1//str/3
            $count = count($patharr)+3;
            $i = 3;
            while($i<$count){
                if(isset($patharr[$i+1])){
                    $_GET[$patharr[$i]] = $patharr[$i+1];
                }
                $i = $i+2;
            }
        }else{
            $this->ctrl = conf::get('CTRL','route');
            $this->action = conf::get('ACTION','route');
        }
    }
}