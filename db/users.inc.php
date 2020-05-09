<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class User extends DB
{
    private $table = "users";
    public function login($username, $password)
    {
        $connection = $this->connection();
        $query = mysqli_query($connection, "select * from {$this->table} where username='${username}' and password= '${password}' limit 1");
        print_r(mysqli_error($connection));
        $res = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if(is_null($res)){
            throw new Exception("login",401);
        }

        return $res;
    }

    function addUser($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (username,password,role) values ('".$data['username']."','".$data['password']."','".$data['role']."')";
        $query = mysqli_query($connection, $q);
        var_dump($query);
        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }
}
