<?php

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/validation.php';


function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

if(!empty($_POST)){
    //debug($_POST);
    $fields = load($fields);
    //debug($fields);
}

function load($data){
    foreach ($_POST as $k => $v) {
        if(array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    //return $data;
    //return json_encode($data);
    $jsonData = json_encode($data);
    file_put_contents('main.json',$jsonData, FILE_APPEND);
}




//$jsonData = json_encode($data);
//file_put_contents('main.jason',$jsonData);
//$jsonData = json_encode($data);
      
    //file_put_contents('main.jason',$jsonData)
?>