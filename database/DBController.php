<?php

class DBController {
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'flipkart_olddb';

    public $con = null;

    public function __construct() {
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->con = @mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if($this->con === false){
            $error = mysqli_connect_error();
            error_log("Fail to connect: " . $error);
            $this->con = null;
        }
        // echo "Connection Success";
    }

    public function __destruct() {
        $this->closeConnection();
    }

    function closeConnection() {
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}
// $config = new DBController();

?>
