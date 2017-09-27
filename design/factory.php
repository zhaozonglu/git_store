<?php
//工厂模式 简单工厂模式
abstract class Base{

}

class OneBase extends Base{

}

class TwoBase extends Base{

}

class Factory{ 
    
    public static function createObj($type){
        switch ($type) {
            case 'one':
                return new OneBase();
                break;
            case 'two'
                return new TwoBase();
                break;
            default:
                # code...
                break;
        }
    }
}