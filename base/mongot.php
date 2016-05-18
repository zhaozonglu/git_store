<?php

    $config = 'mongodb://127.0.0.1:9927,127.0.0.1:9928,127.0.0.1:9929';
    $mongo = new MongoClient($config);
    $db = $mongo->selectDB('test');
    //$pre = $db->getReadPreference();
    //var_dump($pre);
    //exit;
    //readpreference: 读取选项
    //  primary 默认 从主节点读，如果主节点没有，报出异常 
    //  primary_preferred  从主节点读，果主节点不可用, 故障转移期间, 将从从节点读取数据
    //  secondary  从从节点读 从节点不可用，异常
    //  secondary_preferred 从节点读，在只有主节点的情况下，读取主节点。
    $db->setReadPreference(MongoClient::RP_SECONDARY_PREFERRED);
    $col = $db->selectCollection('users');
    $res = $col->find();
    foreach ($res as $key => $value) {
       echo $value['age'].'<br>';
    }
    //var_dump($res);