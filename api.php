<?php 
header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

error_reporting(0);

include 'Database.php';
include "CRUD.php";


$conn = getConnection();

//delete user API
if(isset($_GET['deleteUser'])) {
    $id = $_GET['deleteUser'];
    $query = "DELETE FROM users WHERE id=".$id;

    if ( deleteData($query, $conn) ) {
        $data [] = [
            "userId" => $id,
            "success" => "true"
        ];
        echo json_encode($data);
    }else {
        $data [] = [
            "userId" => $id,
            "success" => "false"
        ];
        echo json_encode($data);
    }

    $conn->close();
}

//Register API
if(isset($_GET['register'])) {
    $fName = $_GET['firstName'];
    $lName = $_GET['lastName'];
    $uName = $_GET['userName'];
    $password = $_GET['password'];
    $address = $_GET['address'];
    $phoneNo = $_GET['phoneNo'];

    $query = "INSERT INTO users (firstName, lastName, userName, password, address, phoneNo) 
    VALUES ($fName,$lName,$uName,$password,$address,$phoneNo)";

    if ( deleteData($query, $conn) ) {
        $data [] = [
            //"userId" => $id,
            "success" => "true"
        ];
        echo json_encode($data);
    }else {
        $data [] = [
            //"userId" => $id,
            "success" => "false"
        ];
        echo json_encode($data);
    }

    $conn->close();
}

//Login API
if(isset($_POST['login'])) {
    
    $uName = $_POST['username'];
    $password = $_POST['password'];
    
    // echo json_encode($data);

    $quary = " SELECT * FROM `users` WHERE userName ='" .$uName. "' && password = '".$password."' ";
    $results=getData($quary,$conn);
 

    if ($results->num_rows > 0) {
        $data [] = [
            "login" => 'sucess',
            "username" => $uName
        ];
        echo json_encode($data);
    } else {
        $data [] = [
            "login" => 'fail',
            "username" => $uName
        ];
        echo json_encode($data);
    }
}



?>

