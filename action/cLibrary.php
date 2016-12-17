<?php

include('../config/dbConfig.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['hdaction']) && $_POST['hdaction'] == 'login') {

        if (isset($_POST['txtusername'])) {

            $usrname = $_POST['txtusername'];
            $password = $_POST['txtpwd'];

            $sql_email = mysqli_query($link, "select * from  `users` where `username` = '" . $usrname . "' AND password = '" . md5($password) . "'; ") or die(mysqli_error());
            $total_email = mysqli_num_rows($sql_email);

            if ($total_email > 0) {

                $_SESSION['cuserId'] = $usrname;
                $redUrl = $RootPath . "admin.php";
                $json = array("status" => true, "result" => "Login Sucessfully", "urls" => $redUrl);
                echo json_encode($json);
                exit();
            } else {
                $json = array("status" => false, "result" => "Username Or Password Incorrect.");
                echo json_encode($json);
                exit();
            }
        } else {
            $json = array("status" => false, "result" => "Bad Request");
            echo json_encode($json);
            exit();
        }
    }
    if (isset($_POST['hdaction']) && $_POST['hdaction'] == 'mainfrm') {

        $user_name = $_POST['uname'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $emailadd = $_POST['emailadd'];
        $webdomain = $_POST['webdomain'];
        $password = $_POST['crtpwd'];
        if (isset($_POST['nwpwd']) && $_POST['nwpwd'] != "") {

            $password = $_POST['nwpwd'];
            $password = md5($password);
        }
        $lastupdatedby = $_POST['uname'];
        $lastupdateddate = date('Y-m-d H:i:s');

        $qry = "select * from  `users` where username = '" . $user_name . "';";
        $sql_exct = mysqli_query($link, $qry) or die(mysqli_error($link));
        $result = mysqli_num_rows($sql_exct);

        if ($result == '0') {

            $qry = "INSERT INTO users (username, password, firstname, lastname,websitedomain, email, lastupdatedby,lastupdateddate) 
			VALUES('$user_name','$password','$first_name','$last_name','$webdomain','$emailadd','$lastupdatedby','$lastupdateddate');";

            $sql_exct = mysqli_query($link, $qry) or die(mysqli_error($link));

            $json = array("status" => true, "result" => "Account Information Updated Successfully.");
            echo json_encode($json);
            exit();
        } else {

            $q = "UPDATE users SET password='$password',firstname='$first_name', lastname='$last_name', "
                    . "websitedomain='$webdomain',email='$emailadd',lastupdatedby='$lastupdatedby', lastupdateddate='$lastupdateddate'"
                    . "  WHERE username='$user_name';";

            $sql_exct1 = mysqli_query($link, $q) or die(mysqli_error($link));

            $json = array("status" => true, "result" => "Account Information Updated Successfully.");
            echo json_encode($json);
            exit();
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
} else {
    $json = array("status" => FALSE, "result" => "Bad Request");
    echo json_encode($json);
    exit();
}

