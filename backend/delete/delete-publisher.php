<?php
session_start();

include("../../connection.php");

$publisherId = $_GET['publisher_id'];

$result = mysqli_query($conn,"DELETE FROM `publisher` WHERE `publisher_id` = $publisherId;");

if ($result) {
  $_SESSION["delete_publisher_status"] = "success";
} else {
  $_SESSION["delete_publisher_status"] = "failed";
}

header("Location:../../publisher.php")

?>