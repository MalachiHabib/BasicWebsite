<?php
class DBHost
{
    private static $conn;
    private $host = "localhost";
    private $database = "CosmicAssets";
    private $user = "dbadmin";
    private $password = "";

    function __construct(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }
}
?>