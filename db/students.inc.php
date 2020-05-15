<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class Studens extends DB
{
    protected $table = "students";
  
    function addStudent($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (fname,mname,lname,stage,dob,user_id) values ('".$data['fname']."','".$data['mname']."','".$data['lname']."','".$data['stage']."','".$data['dob']."',".$data['user_id'].") ";
        $query = mysqli_query($connection,$q);
        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }


    function getStudents(){
        return $this->fetch();
    }



}
