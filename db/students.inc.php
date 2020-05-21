<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class Studens extends DB
{
    protected $table = "students";
  
    function addStudent($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (fname,mname,lname,stage_id,dob,user_id) values ('".$data['fname']."','".$data['mname']."','".$data['lname']."','".$data['stage_id']."','".$data['dob']."',".$data['user_id'].") ";
        $query = mysqli_query($connection,$q);
        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }


    function getStudents(){
        return $this->query("select s.*,st.name as stage from students s join stages st on s.stage_id = st.id");
    }



}
