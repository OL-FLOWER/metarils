<?php
require("./config/app.inc.php");

if(isset($_GET["page"])){
    $page = $_GET["page"];
    $controller = $app->getControllerPath($page);
    $view = $app->getViewPath($page);

    if(file_exists($controller)){
        include($controller);
    }

    if(file_exists($view)){
        include($view);
    }
    

}else{
    header("location: ?page=home");
}

?>