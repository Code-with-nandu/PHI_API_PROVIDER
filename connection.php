<?php
class dbObj
{
    // Default environment (change to 'live' for production)
    private $environment = 'local'; // Change this to 'live' when deploying

    private $servername;
    private $username;
    private $password;
    private $dbname = "employee"; // Your database name
    public $conn;

    function __construct()
    {
        if ($this->environment === 'local') {
            // Local server credentials
            $this->servername = "localhost"; // Localhost
            $this->username = "root"; // Local MySQL username
            $this->password = ''; // Local MySQL password
        } else {
            // Live server credentials
            $this->servername = "18.206.58.178"; // Your EC2 public IP or RDS endpoint
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
// }
// ?>
