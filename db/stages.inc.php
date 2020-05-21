<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class Stages extends DB
{
    protected $table = "stages";
  
    function add($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (name,contact,subject_id,user_id) values ('".$data['name']."','".$data['contact']."',".$data['subject_id'].",".$data['user_id'].") ";
        $query = mysqli_query($connection,$q);
        print_r(mysqli_error($connection));
        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }


    function getAll(){
        return $this->query("select * from ".$this->table);
    }



}
