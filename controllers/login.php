<?php

require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."users.inc.php");

$method = $_SERVER["REQUEST_METHOD"];
function post($data) 
{
    
    $userDb = new User;
    $user = $userDb->login($data["username"],$data["password"]);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    header("location:?page=home");
}

function get($data){

}
switch ($method) {
    case "POST":
        post($_POST);
        break;

    case "GET":
        get($_GET);
        break;
}
