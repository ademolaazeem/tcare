<?php
//session_start();
class Connection
{

    private $db;
    private $conn;
    private $mysqli;

    function  __construct()
    {
        $hostname_login = "localhost"; //host
        $database_login = "tcaredb"; //dbname
        $username_login = "tcareUser";//db username
        $password_login = "tcarePassword28;"; //db password
        $this->conn = mysqli_connect($hostname_login, $username_login, $password_login, $database_login) or trigger_error(mysql_error(),E_USER_ERROR);
    }

    function getConnection()
    {
        return $this->conn;
    }


    public function executeQuery($qry)
    {
        $res=mysqli_query($this->conn,$qry) or die(mysql_error());
        return $res;

    }

    public function fetchData($qry)
    {
        $res=mysqli_query($this->conn, $qry) or die(mysql_error());
        $rs=mysqli_fetch_assoc($res);
        return $rs;
    }

    public function fetchArrayData($qry)
    {
        $res=mysqli_query($this->conn, $qry) or die(mysql_error());
        $rs=mysqli_fetch_array($res, MYSQLI_ASSOC);
        return $rs;
    }

    function getNumOfRows($qry)
    {
        $res=mysqli_query($this->conn, $qry);
        $num=mysqli_num_rows($res);
        return $num;
    }


    function checkIfExists($table,$field,$value)
    {
        $res = mysql_query("SELECT * FROM $table WHERE $field = '$value'") or die(mysql_error());
        if(mysql_num_rows($res)>0)
            return true;
        else
            return false;
    }

}//end class Connection

?>