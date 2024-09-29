<?php
class dbObj
{
    var $servername;
    var $username;
    var $password;
    var $dbname = "employee"; // Your database name
    var $conn;

    function __construct($environment = 'local')
    {
        if ($environment === 'local') {
            $this->servername = "localhost";
            $this->username = "root"; // Local MySQL username
            $this->password = ''; // Local MySQL password
        } else {
            // For live environment
            $this->servername = "localhost"; // Change to your live server IP or domain
            $this->username = "root"; // Live MySQL username
            $this->password = 'D@2015$yuti'; // Live MySQL password
        }
    }

    function getConnstring()
    {
        $con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) 
            or die("Connection failed: " . mysqli_connect_error());

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }
}

// Determine the environment
$isLocal = true; // Set to false when deploying to live
$environment = $isLocal ? 'local' : 'live';

// Test connection
// $db = new dbObj($environment);
// $conn = $db->getConnstring();

// if ($conn) {
//     echo "Connected successfully!";
// } else {
//     $error_message = mysqli_connect_error();
//     $error_code = mysqli_connect_errno();
    
//     echo "Connection failed: Error Code: $error_code, Message: $error_message";
// }
?>
