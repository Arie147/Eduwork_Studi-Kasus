<?php
session_start();

include("../../connection.php");

$genreId = $_GET['genre_id'];

$result = mysqli_query($conn,"DELETE FROM `genre` WHERE `genre_id` = $genreId;");

if ($result) {
  $_SESSION["delete_genre_status"] = "success";
} else {
  $_SESSION["delete_genre_status"] = "failed";
}

header("Location:../../genre.php")

?>