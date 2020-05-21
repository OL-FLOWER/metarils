<?php
require_once(getcwd() . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connection.inc.php");



class Materials extends DB
{
    protected $table = "subjects";
  
    function add($data){
        $connection = $this->connection();
        $q = "insert into {$this->table} (subject,stage_id) values ('".$data['name']."',".$data['stage_id'].") ";
        $query = mysqli_query($connection,$q);
        print_r(mysqli_error($connection));
        $data['id'] = mysqli_insert_id($connection);
        return $data;
    }


    function getMaterials(){
        return $this->query("select su.*,st.name as stage,t.name as teacher from subjects su join stages st on st.id = su.stage_id left join teachers t on t.subject_id = su.id        ");
    }



}
