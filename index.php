<?php
require("./config/app.inc.php");

function isLogin()
{
    return isset($_SESSION) && isset($_SESSION['user_id']);
}

function hasRol($role)
{
    return isset($_SESSION) && isset($_SESSION['role']) && ($_SESSION['role']  == $role);
}
try {

    if (isset($_GET["page"])) {
        session_start();
        $page = $_GET["page"];
        $controller = $app->getControllerPath($page);
        $view = $app->getViewPath($page);

        if (file_exists($controller)) {
            include($controller);
        }

        if (file_exists($view)) {
            include($view);
        }
    } else {
        header("location: ?page=home");
    }
} catch (Exception $e) {
    // print_r($e->getMessage());
    // print_r($e->getCode());
    switch($e->getCode()){
        case 401:
            header("location: ?page=login&code=401&username=" . $_POST['username']);
        break;

        case 403:
            header("location: ?page=login&code=403");
        break;

        default :
        throw $e;
    }
  
}
