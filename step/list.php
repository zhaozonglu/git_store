<?php
//链表的相关操作
class TList{
    public $data;
    public $next = null;
    public function __construct($data){
        $this->data = $data;
    }
}

$list1 = new TList('a');
$list2 = new TList('b');
$list3 = new TList('c');
$list4 = new TList('d');
$list5 = new TList('e');
$list6 = new TList('f');

$list1->next = $list2;
$list2->next = $list3;
$list3->next = $list4;
$list4->next = $list5;
$list5->next = $list6;

//递归方式翻转一个链表
function reverse($list){
    if(empty($list) || empty($list->next)){
        return $list;
    }
    $new_list = reverse($list->next);
    $list->next->next = $list;
    $list->next = null;
    return $new_list;
}

//非递归方式反转一个链表
function reverse2($list){
    if(empty($list) || empty($list->next)){
        return $list;
    }  
    $cur = $list;
    $p_next = $cur->next;
    $cur->next = null;
    while($p_next){
        $prev = $p_next->next;
        $p_next->next = $cur;
        $cur = $p_next;
        $p_next = $prev;
    }
    return $cur;
}

//求链表的倒数k个函数
function theKth($list, $k){
    if(empty($list) || $k < 0){
        return 0;
    }
    $slow = $list;
    $faster = $list;
    for ($i=$k; $i > 0 && $faster !== null; $i--) {
        $faster = $faster->next;
    }
    if($i > 0) return 0;
    while($faster !== null){
        $slow = $slow->next;
        $faster = $faster->next;
    }
    return $slow;
}

function theMiddleNode($list){
    if(empty($list)) return 0;
    $slow = $list;
    $faster = $list;
    while(null !== $slow->next && null !== $faster->next){
        $slow = $slow->next;
        $faster = $faster->next->next;
    }
    return $slow;
}

function hasCircle($list){
  if(empty($list)) return 0;
  $slow = $list;
  $faster = $list;
    
}

$s = theMiddleNode($list1);
echo "<pre>";
var_dump($s->data);
