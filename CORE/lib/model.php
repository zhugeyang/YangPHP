<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/4/22
 * Time: 20:46
 */
namespace core\lib;
class model extends \PDO{
    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=house';
        $username = 'root';
        $passwd = "123456";
        try{
            parent::__construct($dsn,$username,$passwd);
        }catch(\PDOException $e){
            p($e->getMessage());
        }
    }
}