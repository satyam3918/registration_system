<?php
session_start();
//error_reporting(0);
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "final_project";
$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);