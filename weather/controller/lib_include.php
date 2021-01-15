<?php
session_start();
date_default_timezone_set('Asia/Calcutta');


// header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
// header("Access-Control-Allow-Credentials: true");
// header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
// header('Access-Control-Max-Age: 1000');
// header('content-type: application/json; charset=utf-8');
// header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');


include_once 'lib/dao.php';
include_once 'lib/model.php';

$d=new dao();
$m=new model();

?>