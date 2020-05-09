<?php

require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."users.inc.php");
require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."students.inc.php");

$method = $_SERVER["REQUEST_METHOD"];
function post($data) 
{
    
    $users = new User;
    $students = new Studens;
    $user = $users->addUser(["username"=>$data['email'],"password"=>$data['password'],"role"=>"student"]);
    $data['user_id'] = $user['id'];
    $student = $students->addStudent($data);

    header("location: ?page=signup&success");
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
