<?php

include('../config/dbConfig.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    if (isset($_GET['hdaction']) && $_GET['hdaction'] == 'populate') {

        $usrname = $_SESSION['cuserId'];
        $sql = "select * from  `users` where `username` = '" . $usrname . "';";

        if (!$result = $mysqli->query($sql)) {
            die('There was an error running the query [' . $mysqli->error . ']');
            echo 'List No Found';
            $json = array('status' => false, 'content' => "List No Found");
            echo json_encode($json);
        } else {
            $resultarray = array();
            while ($row = $result->fetch_assoc()) {
                array_push($resultarray, $row);
            }
            $json = array('status' => TRUE, 'content' => $resultarray);
            echo json_encode($json);
        }
    }
} else {
    $json = array("status" => FALSE, "result" => "Bad Request");
    echo json_encode($json);
    exit();
}

