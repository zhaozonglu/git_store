<?php
//树相关操作
class MTree{
    public $left;
    public $right;
    public $data;
    
    public function __construct($data){
        $this->data = $data;
    }
}
$tree1 = new MTree('1');
$tree2 = new MTree('2');
$tree3 = new MTree('3');
$tree4 = new MTree('4');
$tree5 = new MTree('5');
$tree6 = new MTree('6');
$tree7 = new MTree('7');

$tree1->left = $tree2;
$tree1->right = $tree3;

$tree2->left = $tree4;
$tree2->right = $tree5;

$tree3->left = $tree6;
$tree3->right = $tree7;

// 最小公共祖先
function commonRoot($root, $p, $q){
    if($root == null) return null;
    if($root->data == $p->data || $root->data == $q->data || 
        ($root->left->data == $p->data && $root->right->data == $q->data) ||
        ($root->left->data == $q->data && $root->right->data == $p->data)
    ){
        return $root;
    }
    $leftNode = commonRoot($root->left, $p , $q);
    $rightNode = commonRoot($root->right, $p, $q);
    if($leftNode != null && $right != null){
        return $root;
    }
    if($leftNode != null){
        return $leftNode;
    }
    if($right != null){
        return $rightNode;
    }
}

//先根
function reserv1($tree){
    static $rs = [];
    if($tree){
        $rs[] = $tree->data;
        if($tree->left){
            reserv1($tree->left);
        }
        if($tree->right){
            reserv1($tree->right);
        }
    }
    return $rs;
}


//中根
function reserv2($tree){
    static $rs =[];
    if($tree){
        if($tree->left){
            reserv2($tree->left);
        }
        $rs[] = $tree->data;
        if($tree->right){
            reserv2($tree->right);
        }
    }
    return $rs;
}

//后根
function reserv3($tree){
    static $rs =[];
    if($tree){
        if($tree->left){
            reserv3($tree->left);
        }
        if($tree->right){
            reserv3($tree->right);
        }
        $rs[] = $tree->data;
    }
    return $rs;
}

function getMaxDepth($tree){
    if($tree === null) return 0;
    $left = getMaxDepth($tree->left);
    $right = getMaxDepth($tree->right);
    return max($left,$right)+1;
}

//先根非递归
function DLR($root){
    $stack = [];
    $stack[] = $root;
    $rs = [];
    while(count($stack)){
        if($temp = getStackTop($stack)){
            $rs[] = $temp->data;
            array_push($stack, $temp->left);
        }else{
            array_pop($stack);
            if(count($stack)){
                $temp = array_pop($stack);
                array_push($stack, $temp->right);
            }
        }
    }
    return $rs;
}

//中
function ldr($root){
    $stack = [];
    $stack[] = $root;
    $rs = [];
    while (count($stack)) {
        while ($temp = getStackTop($stack)) {
            array_push($stack, $temp->left);
        }
        array_pop($stack);
        if(count($stack)){
            $temp = array_pop($stack);
            $rs[] = $temp->data;
            array_push($stack, $temp->right);
        }
    }
    return $rs;
}

//后
function lrd($root){
    $stack = [];
    $stack[] = $root;
    $rs = [];
    $pre = null; //上次访问的节点
    while (count($stack)) {
        $temp = getStackTop($stack);
        if($temp->left 
        && $pre != $temp->left 
        && !($temp->right && $pre == $temp->right))
        {
            array_push($stack, $temp->left);
        }else if( $temp->right && $pre != $temp->right){
            array_push($stack, $temp->right);
        }else{
            $tp = array_pop($stack);
            $rs[] = $tp->data;
            $pre = $tp;
        }
    }
    return $rs;
}

function getStackTop($stack){
    return $stack[(count($stack)-1)];
}

$rs = reserv3($tree1);
var_dump($rs);