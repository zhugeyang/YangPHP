<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/4/23
 * Time: 17:01
 */
namespace core\lib;
class log{
    /**
     * 1.日志的存储方式
     * 2.写日志
     */
    static $class;
    //初始方法，调用存储方式
    static public function init(){
        //确定存储方式
        $drive = conf::get('DRIVE','log');
        $class='\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    public function log($name,$file){
        self::$class->log($name,$file);
    }
}