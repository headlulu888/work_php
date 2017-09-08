<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "site_cms";
    private $cont;

    function connectToDb() {
        $cont = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if ($cont = mysqli_connect($this->host, $this->user, $this->pass, $this->db)) {
            // echo "connect to host";
           // if (mysqli_select_db($cont, $this->db)) {
           ///     echo "<br>connect to db";
           // }
        return $cont;
        }
    }
    function closeConnection() {
        mysqli_close();
    }
}
?>
