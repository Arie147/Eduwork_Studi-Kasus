<?php
session_start();

include("../../connection.php");

$editPublisher = $_POST["editPublisher"];
$publisherId = $_POST["publisher_id"];

$result = mysqli_query($conn, "UPDATE `publisher` SET `publisher_name` = '$editPublisher' WHERE `publisher_id` = $publisherId");

if ($result) {
    $_SESSION["edit_publisher_status"] = "success";
} else {
    $_SESSION["edit_publisher_status"] = "failed";
}

header("Location:../../publisher.php");
exit();
?>
