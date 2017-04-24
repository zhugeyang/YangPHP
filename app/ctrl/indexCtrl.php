<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/4/22
 * Time: 18:47
 */
namespace app\ctrl;
//class indexCtrl{
//    public function index(){
//        p('indexCtrl');
//        $model = new \core\lib\model();
//        //admin是house中的表名
//        $sql="select * from admin";
//        $ret=$model->query($sql);
//        p($ret->fetchAll());
//    }

class indexCtrl extends \core\yang{
    public function index(){
//        $temp = \core\lib\conf::get('CTRL','route');
//        $temp = \core\lib\conf::get('ACTION','route');
        $temp = new \core\lib\model();
        p($temp);
        $data='Hello Word';
        $title='视图文件';
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');

    }
}