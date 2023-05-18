<?php
@session_start();
error_reporting(0);

$username = "SIMRS_MANAGER";
$password = "simrs_system";
$database = "192.168.200.76/devrspm";
$conn = oci_connect($username, $password, $database) or header("Location:warning.php?error_connect");
