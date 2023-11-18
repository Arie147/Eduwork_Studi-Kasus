<?php
session_start();

include("../../connection.php");

$editDeveloper = $_POST["editDeveloper"];
$developerId = $_POST["developer_id"];

$result = mysqli_query($conn, "UPDATE `developer` SET `developer_name` = '$editDeveloper' WHERE `developer_id` = $developerId");

if ($result) {
    $_SESSION["edit_developer_status"] = "success";
} else {
    $_SESSION["edit_developer_status"] = "failed";
}

header("Location:../../developer.php");
exit();
?>
