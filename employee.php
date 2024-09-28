<?php
include("connection.php");  // Include the connection file
// include("auth.php");

// // Auth Start
// $auth = new authObj();
// $isAuthorized = $auth->authenticate();
// if(!$isAuthorized)
// {
// 	header("HTTP/1.0 401");
// 	exit;
// }
// // Auth End
// Create a new instance of the dbobj class and get the connection
$db = new dbobj();
$conn = $db->getConnstring();  // Store the connection object



$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (isset($_GET["id"])) {
            // Fetch a single employee by ID
            $id = intval($_GET["id"]);
            getEmployeeById($conn, $id);
        } else {
            // Fetch all employees
            getEmployees($conn);
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        insertEmployee($conn, $data["name"], $data["email"], $data["profilePic"]);
        break;
    case 'PUT':
        $id = intval($_GET["id"]);
        $data = json_decode(file_get_contents('php://input'), true);
        updateEmployee($conn, $id, $data["name"]);
        break;
    case 'DELETE':
        $id = intval($_GET["id"]);
        DeleteEmployee($conn, $id);
        break;
    default:
        header("HTTP/1.0 405 METHOD NOT IMPLEMENTED");
        break;
}

// Function to get all employees
function getEmployees($conn)
{
    $sql = "SELECT * FROM employee";
    $result = $conn->query($sql);
    $response = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($response, $row);
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

// Function to get a single employee by ID
function getEmployeeById($conn, $id)
{
    $sql = "SELECT * FROM employee WHERE id='".$id."'";
    $result = $conn->query($sql);
    $response = array();

    if ($result->num_rows > 0) {
        $response = $result->fetch_assoc();
    } else {
        // Handle employee not found
        header("HTTP/1.0 404 Not Found");
        $response = array(
            'status' => 0,
            'status_message' => 'Employee Not Found.'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

// Function to insert a new employee
function insertEmployee($conn, $name, $email, $profilePic)
{
    $sql = "INSERT INTO employee (name, email, profile_pic) VALUES ('".$name."', '".$email."', '".$profilePic."')";
    $response = array();
    
    if ($conn->query($sql)) {
        header("HTTP/1.0 201 Created");
        $response = array(
            'status' => 1,
            'status_message' => 'Employee Added Successfully.'
        );
    } else {
        header("HTTP/1.0 400 Bad Request");
        $response = array(
            'status' => 0,
            'status_message' => 'Employee Addition Failed.'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

// Function to update an existing employee
function updateEmployee($conn, $id, $name)
{
    $sql = "UPDATE employee SET name='".$name."' WHERE id='".$id."'";
    $response = array();
    
    if ($conn->query($sql)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Employee Updated Successfully.'
        );		
    } else {
        header("HTTP/1.0 400 Bad Request");
        $response = array(
            'status' => 0,
            'status_message' => 'Employee Updation Failed.'
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Function to delete an existing employee
function DeleteEmployee($conn, $id)
{
    $sql = "DELETE FROM employee WHERE id='".$id."'";
    $response = array();
    
    if ($conn->query($sql)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Employee Deleted Successfully.'
        );		
    } else {
        header("HTTP/1.0 400 Bad Request");
        $response = array(
            'status' => 0,
            'status_message' => 'Employee deletion Failed.'
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
