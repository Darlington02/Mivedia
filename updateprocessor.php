<?php

require_once("session-manager.php");
include_once("db-manager.php");

$id = $_SESSION["user"];
$name = $_POST["name"];
$first_address = $_POST["address"];
$mifund = $_POST["mifund"];
$state = $_POST["state"];
$country = 'Nigeria';
$phone = $_POST["phone"];

$SQL = "UPDATE `users` SET `name`='$name',`phone`='$phone',`phone`='$phone',`first_address`='$first_address',`state`='$state',`country`='$country' WHERE `id` = $id";

mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

// UPDATE MIFUND PASSWORD
$mifund_sql = "UPDATE `mifund` SET `transaction_password` = '$mifund'";

mysqli_query($cxn, $mifund_sql) or die(mysqli_error($cxn));

header('location:dashboard.php');

