<?php

require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."users.inc.php");
require(getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."teachers.inc.php");

$method = $_SERVER["REQUEST_METHOD"];
function post($data) 
{
    
    $users = new User;
   
    $teachers = new Teachers;

    $user = $users->addUser(["username"=>$data['email'],"password"=>$data['password'],"role"=>"teacher"]);
    $data['user_id'] = $user['id'];
    $student = $teachers->addTeacher($data);
    header("location: ?page=teachers&success");
}

function get($data){
    $teachers = new Teachers;
    $GLOBALS['subjects'] = $teachers->getSubjects();

}
switch ($method) {
    case "POST":
        post($_POST);
        break;

    case "GET":
        get($_GET);
        break;
}
