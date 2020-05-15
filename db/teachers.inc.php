<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class Teachers extends DB
{
    protected $table = "teachers";
  
    function addTeacher($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (name,contact,subject_id,user_id) values ('".$data['name']."','".$data['contact']."',".$data['subject_id'].",".$data['user_id'].") ";
        $query = mysqli_query($connection,$q);
        print_r(mysqli_error($connection));
        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }


    function getTeachers(){
        return $this->query("select t.* ,s.subject from teachers t join subjects s on t.subject_id = s.id");
    }



}
