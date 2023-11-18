<?php
session_start();

include("../../connection.php");

$developer = $_POST["addDeveloper"];

$result = mysqli_query($conn, "INSERT INTO `developer` (`developer_id`, `developer_name`) VALUES (NULL, '$developer');");

if ($result) {
    $_SESSION["add_developer_status"] = "success";
} else {
    $_SESSION["add_developer_status"] = "failed";
}

header("Location:../../developer.php");
?>
