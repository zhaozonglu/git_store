<?php
// 截取字符串
// substr($string, $start, $len);
$str = "hello world";
echo substr($str, 0, 3);  //hel

// 子串的个数
echo substr_count("hellorworld", 'or'); //2

print_r(explode(',', 'hello,world'));
echo implode(',', ['hello','world']);

strpos('hellorworld', 'll');
strstr('hello','el');
strstr('hello', 'lo', true);
echo "\n";
echo str_pad('hel', 10);