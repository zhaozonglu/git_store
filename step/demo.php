<?php
function getMaxSubsum($arr){
    if(count($arr)<2) return $arr;
    $curSum = $arr[0];
    $maxSum = $arr[0];
    for($i =1; $i<count($arr); $i++){
        if($curSum > 0){
            $curSum += $arr[$i];
        }else{
            $curSum = $arr[$i];
        }
        if($curSum > $maxSum){
            $maxSum = $curSum;
        }
    }
    return $maxSum;
}

// $tes = [1,2,-2,1,2,5];
// $s = getMaxSubsum($tes);
// 
$option = 'f:h:';
$res = getopt($option);
var_dump($res);

var_dump($argc);
var_dump($argv);