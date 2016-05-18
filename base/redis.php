<?php
 $redis = new Redis();
 $redis->connect('127.0.0.1',6379);
 $redis->del('name');
 $name= $redis->get('name');
 var_dump($name);
