<?php



class DB
{
    protected function connection()
    {
        require(getcwd() . "./config/config.inc.php");
        $db = mysqli_connect($config["db_host"], $config["db_username"], $config["db_password"], $config["db_name"], $config["db_port"]);
        return $db;
    }

    function fetch($where = "")
    {
        $connection = $this->connection();
        $query = mysqli_query($connection, "select * from {$this->table} ${where}");
        return  mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    function query($query)
    {
        $connection = $this->connection();
        $query = mysqli_query($connection, $query);
        print_r(mysqli_error($connection));
        return  mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    function getSubjects()
    {
        $connection = $this->connection();
        $query = mysqli_query($connection, "select * from subjects");
        return  mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
}
