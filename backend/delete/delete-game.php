<?php
session_start();

include("../../connection.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"DELETE FROM `game` WHERE `id` = $id;");

if ($result) {
  $_SESSION["delete_game_status"] = "success";
} else {
  $_SESSION["delete_game_status"] = "failed";
}

header("Location:../../game.php")

?>