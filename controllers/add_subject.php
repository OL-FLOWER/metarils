<?php

require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."stages.inc.php");
require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."materials.inc.php");

if(!isLogin() || !hasRol("admin")){
    throw new Exception("forbiden",403);
}

$method = $_SERVER["REQUEST_METHOD"];
function post($data) 
{
    
   $materials = new Materials;
   $materials->add($data);
    header("location: ?page=materials");
}

function get($data){
    $stages = new Stages;
    $GLOBALS["stages"] = $stages->getAll();
}
switch ($method) {
    case "POST":
        post($_POST);
        break;

    case "GET":
        get($_GET);
        break;
}
