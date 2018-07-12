<?php 
class DataBaseConnection
{
    private $host = ""; //server name
    private $username =""; //database username
    private $password =""; //database password
    private $databasename=""; //database
    public function getConnection()
    {
        $this->conn = null;
        if (! $this->conn = new mysqli($this->host, $this->username, $this->password, $this->databasename)) {
            echo $this->conn->connect_error;
        }
        return $this->conn;
    }
}
