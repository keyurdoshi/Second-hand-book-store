<?php
 
/**
 * A class file to connect to database
 */
class DB_CONNECT {
    protected $con;
    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';
 
        // Connecting to mysql database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
 
        // Selecing database
        $db = mysqli_select_db($con, DB_DATABASE) or die(mysqli_error($con)) or die(mysqli_error($con));
 
        // returing connection cursor
        return $con;
        mysqli_close($con);
    }
 
}
 
?>
			