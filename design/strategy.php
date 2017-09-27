<?
// 策略模式
interface IStrategy{
    public function filter($record);
}

// 策略1
class FilterStrategy implements IStrategy{
    public function filter($datas){

    }
}

// 策略2
class RandomStrategy implements IStrategy{
    public function filter($datas){

    }
}


class UserList{
    private $list = [];
    private $filter = [];

    public function __construct($filter, $names) {
        if ($names != null) {
            foreach ( $names as $name ) {
                $this->_list [] = $name;
            }
        }

        if ($filter != null) {
            foreach ($filter as $name ) {
                $this->filter [] = $name;
            }
        }
    }

    public function add($name) {
        $this->_list [] = $name;
    }

    public function find(){
        $res = [];

    }
}

$u = new UserList(['filter','random'],['u1','u2']);

