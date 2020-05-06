<?php

function connection(){
    require (getcwd()."./config/config.inc.php"); 

    $db = mysqli_connect($config["db_host"],$config["db_username"],$config["db_password"],$config["db_name"],$config["db_port"]);

    return $db;
}



