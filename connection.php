<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class dbObj
{
    private $environment = 'live'; // Change to 'live' for production
    private $servername;
    private $username;
    private $password;
    private $dbname = "employee"; // Your database name
    public $conn;

    function __construct()
    {
        if ($this->environment === 'local') {
            $this->servername = "localhost"; // Localhost
            $this->username = "root"; // Local MySQL username
            $this->password = ''; // Local MySQL password
        } else {
            // $this->servername = "18.206.58.178"; // Your EC2 public IP or RDS endpoint
            $this->servername = "localhost";
            $this->username = "root"; // Live MySQL username
            $this->password = 'D@2015$yuti'; // Live MySQL password
        }
    }

    function getConnstring()
    {
        // Establish connection
        $con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $this->conn = $con;
        return $this->conn;
    }
}

// // Test connection
// $db = new dbObj();
// $conn = $db->getConnstring();

// if ($conn) {
//     echo "Connected successfully!";
// } else {
//     $error_message = mysqli_connect_error();
//     $error_code = mysqli_connect_errno();
    
//     echo "Connection failed: Error Code: $error_code, Message: $error_message";
// }
// ?>
