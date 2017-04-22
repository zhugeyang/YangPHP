<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/4/22
 * Time: 16:37
 */
namespace core;

class yang{
    static public  $classMap=array();
    public $assign;
    //启动框架
    static public function run(){
        $route=new \core\lib\route();

        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $cltrlClass='\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if(is_file($ctrlfile)){
            include $ctrlfile;
            $ctrl = new $cltrlClass;
            $ctrl->$action();
        }else{
            throw new \Exception($ctrlfile.'控制器不存在');
        }
    }
    //自动加载类库
    static public function load($class){
        //自动加载类库
        //new \core\route();
        //$class='\core\route';
        //YangPHP.'/core/route.php';
        $class=str_replace('\\','/',$class);

        if(isset($classMap[$class])){
            return true;
        }else{
            $file=YangPHP.'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }
    }


    public function assign($name,$value){
        $this->assign[$name]=$value;
    }

    public function display($file){
        $file=APP.'/views/'.$file;
        extract($this->assign);
        if(is_file($file)){
            include $file;
        }
    }
}