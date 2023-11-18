<?php
session_start();

include("../../connection.php");

$publisher = $_POST["addPublisher"];

$result = mysqli_query($conn, "INSERT INTO `publisher` (`publisher_id`, `publisher_name`) VALUES (NULL, '$publisher');");

if ($result) {
    $_SESSION["add_publisher_status"] = "success";
} else {
    $_SESSION["add_publisher_status"] = "failed";
}

header("Location:../../publisher.php");
?>
