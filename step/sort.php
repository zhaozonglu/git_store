
<?php
/**
 * 最全的排序算法
 * 冒泡排序
 * 选择排序
 * 插入排序
 * 希尔排序 插入排序的改进 缩小增量
 * 归并排序
 * 堆排序
 * 快速排序 冒泡排序的改进
 * 桶排序
 * 基数排序
 * @author zonglu Zhao <zonglu@leju.com>
 */
class Sort{
    private $date;
    private $result;
    private function __construct(){}
    private function __clone(){}

    /**
     * 冒泡排序
     */
    public function bubbleSort($data){
        if(empty($data)) return false;
        $count = count($data);
        $not_over = true;
        for($i=0; $i<$count && $not_over; $i++){
            $not_over = false;
            for($j = $i+1; $j<$count; $j++){
                if($data[$i]>$data[$j]){
                    $not_over = true;
                    $temp = $data[$i];
                    $data[$i] = $data[$j];
                    $data[$j] = $temp;
                }
            }
        }
    }

    /**
     * 选择排序
     * n方 不稳定 优化 同时找出最大和最小放到合适的位置
     */
    public function selectSort($data){
        if(empty($data)) return false;
        $count = count($data);
        for($i=0; $i<$count; $i++){
            $min = $i;
            for($j = $i+1; $j<$count; $j++){
                if($data[$min]>$data[$j]){
                    $min = $j;
                }
            }
            if($min != $i){
                $temp = $data[$min];
                $data[$min] = $data[$i];
                $data[$i] = $temp;
            }
        }
    }

    public function selectSort2($data){
        if(empty($data)) return false;
        $count = count($data);
        $left = 0;
        $right = $count-1;
        $min = $left;
        $max = $left;
        while($left<=$right){
            $min = $left;
            $max = $left;
            for ($i=$left; $i <= $right; $i++) { 
                if($data[$i] > $data[$max]){
                    $max = $i;
                }
                if($data[$i] < $data[$min]){
                    $min = $i;
                }
            }
            $min !== $left && swap($a[$left], $a[$min]);
            $max !== $left && swap($a[$right],$a[$max]);
            ++$left;
            --$right;
        }

    }

    /**
     * 直接插入排序 优化 折半插入排序
     * n方  稳定
     * 第一层循环从1开始
     * 使用temp存第一层循环的值
     * 第二层循环使用while
     */
    public function insertSort($data){
        if(empty($data)) return false;
        $count = count($data);
        for($i = 1; $i < $count; $i++){
            $temp = $data[$i];
            $j = $i-1;
            while($j>=0 && $temp<$data[$j]){
                $data[$j+1] = $data[$j];
                $j--;
            }
            if($j !== $i-1){
                $data[$j+1] = $temp;
            }
        }
    }

    /**
     * 希尔排序
     * 插入排序的一种 缩小增量排序
     */
    public function shellSort($data){
        $count = count($data);
        //设置一个增量
        $h = 1;
        while($h < $count/3){
            $h = 3 * $h + 1;
        }
        //逐渐缩小$h
        while ($h >= 1) {
            for($i = $h; $i<$count; $i++){
                $j = $i;
                while($j>=$h){
                    if($data[$j-$h] > $data[$j]){
                        $temp = $data[$j-$h];
                        $data[$j-$h] = $data[$j];
                        $data[$j] = $temp;
                    }
                    $j = $j - $h;
                }
            }
            $h = intval($h/3);
        }
    }

    /**
     * 归并排序
     * 采用分治法
     */
    public function mergeSort($data){
        $count = count($data);
        if($count <= 1) return $data;
        $mid = intval($count/2);
        $left_data = array_slice($data, 0, $mid);
        $right_data = array_slice($data, $mid);
        //分别对左右进行归并排序 递归
        $left_data = mergeSort($left_data);
        $right_data = mergeSort($right_data);

        $data = $this->mergeData($left_data,$right_data);
    }

    private function mergeData($left, $right){
        $temp = array();
        $left = array_values($left);
        $right = array_values($right);
        //将left和right中的数按照数据分别转移到$temp中去
        while(count($left) && count($right)){
            $temp[] = $left[0] < $right[0] ? array_shift($left) : array_shift($right);
        }
        //最后会是$left中或者$right中剩余一个最大的数
        return array_merge($temp, $left, $right);
    }

    // 只允许遍历一遍字符串，找出字符串中第一个只出现一次的字符
    public static function HeapAdjust(&$array,$root,$size){  
        $cur_root = $root ;  
        $lchild = 2*$root+1;  
        $rchild = 2*$root+2;  
        if($cur_root<=$size/2){  
            if($lchild<=$size && $array[$lchild]>$array[$cur_root]){  
                $cur_root=$lchild;  
            }  
            if($rchild<=$size && $array[$rchild]>$array[$cur_root]){  
                $cur_root = $rchild;  
            }  
            if($cur_root!=$root){
                //交换原root节点和调整后root节点
                $temp = $array[$cur_root];  
                $array[$cur_root]=$array[$root];  
                $array[$root]=$temp;  
                self::HeapAdjust($array, $cur_root, $size);  
            }  
        }  
    }  
      
    public static function HeapSort(&$array,$size){  
        //$i = 0;  
        for($i=$size/2;$i>=0;$i--){  
            self::HeapAdjust($array, $i, $size);  
        }  
        for($i=$size;$i>=0;$i--){  
            $temp = $array[0];  
            $array[0]=$array[$i];  
            $array[$i]=$temp;  
            self::HeapAdjust($array, 0, $i-1);  
        }  
    }

    public static function quit_sort(&$data, $left, $right){
        if($left < $right){
            $low = $left;
            $high = $right;
            $temp = $data[$low];
            while($low<$high){
                while($low<$high && $data[$high]>=$temp){
                    $high--;
                }
                $data[$low] = $data[$high];
                while ($low<$high && $data[$low]<=$temp) {
                    $low++;
                }
                $data[$high] = $data[$low];
            }
            $data[$low] = $temp;
            self::quit_sort($data, $left, $low-1);
            self::quit_sort($data, $low+1, $right);
        }
    }

    /**
     * 快速排序
     * 分治法
     */
    public static function quitSort($array){
        if(count($array)<=1) return $array;  
        $base_num = $array[0];  
        $array_left = array();  
        $array_right = array();  
        for($i=1;$i<count($array);$i++){  
            if($array[$i]<$base_num){  
                $array_left[] = $array[$i];  
            }else{  
                $array_right[] = $array[$i];  
            }  
        }  
        $array_left = self::quitSort($array_left);  
        $array_right = self::quitSort($array_right);  
        return array_merge($array_left,array($base_num),$array_right);  
    }

    /**
     * 桶排序
     * 桶排序是稳定的
     * 桶排序是常见排序中最快的，但是非常耗费空间
     * 
     */
    private function bucketSort($data){

    }

    /**
     * 基数排序
     */
    private function radixSort($data){

    }
}
