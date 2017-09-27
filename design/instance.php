<?php
//单例模式
class Connection{
    private static $_instance;

    private function __construct(){
        $this->init();
    }
    private function __clone(){}

    private function init(){
        echo "init only once";
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function test(){
        echo "test instance";
    }

    public function demo(){
        echo "demo instance";
    }
}

$conn = Connection::getInstance();

$conn->test();

$conn2 = Connection::getInstance();
$conn2->demo();