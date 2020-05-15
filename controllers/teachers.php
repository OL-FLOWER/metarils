<?php

require(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "teachers.inc.php");


if(!isLogin() || !hasRol("admin")){
    throw new Exception("forbiden",403);
}

$method = $_SERVER["REQUEST_METHOD"];
function post($data) 
{
    
   
}
global $rows;
function get($data){
    $teachers = new Teachers;
    
    $GLOBALS['rows'] = $teachers->getTeachers();

}
switch ($method) {
    case "POST":
        post($_POST);
        break;

    case "GET":
        get($_GET);
        break;
}
