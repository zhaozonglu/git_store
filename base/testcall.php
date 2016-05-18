<?php
    $param = 'hellorod12:123123';
    $p = strpos($param, ':');
        if($p !== false){
            $param = substr($param, $p+1);
        }
        var_dump($param);
 