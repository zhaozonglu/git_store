<?php
$arr = array('name'=>'zhao','age'=>array(1,2,3,4),'duan'=>array('ref'=>1,'co'=>2));
$arr2 = array(array('name'=>'120','ref'=>1,'co'=>3),array('name'=>'180','ref'=>2,'co'=>4));
array_push($arr2, $arr);
echo '<pre>';
var_dump($arr2);
echo '</pre>';