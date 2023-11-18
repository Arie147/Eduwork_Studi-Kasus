<?php
session_start();

include("../../connection.php");

$developerId = $_GET['developer_id'];

$result = mysqli_query($conn,"DELETE FROM `developer` WHERE `developer_id` = $developerId;");

if ($result) {
  $_SESSION["delete_developer_status"] = "success";
} else {
  $_SESSION["delete_developer_status"] = "failed";
}

header("Location:../../developer.php")

?>