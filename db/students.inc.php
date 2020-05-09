<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class Studens extends DB
{
    private $table = "students";
  
    function addStudent($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (fname,mname,lname,stage,dob,user_id) values ('".$data['fname']."','".$data['mname']."','".$data['lname']."','".$data['stage']."','".$data['dob']."',".$data['user_id'].") ";

        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }


    function getStudents($data){
        $connection = $this->connection();
        
        $query = mysqli_query($connection, "select * from {$this->table}");       

        return  mysqli_fetch_all($query, MYSQLI_ASSOC);
    }



}
