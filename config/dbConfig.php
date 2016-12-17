<?php
/*-----------This is global connection string for MySQL-------------------------*/
$link = mysqli_connect("neemaiqbal", "root", "godhand786") or die(mysqli_error());
mysqli_select_db($link,"crm") or die(mysqli_error());

$mysqli = new mysqli("neemaiqbal", "root", "godhand786", "crm");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$RootPath = "http://localhost:81/MyDemo/";
$AdminPath = "http://localhost:81/MyDemo/";
session_start();
