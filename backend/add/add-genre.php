<?php
session_start();

include("../../connection.php");

$genre = $_POST["addGenre"];

$result = mysqli_query($conn, "INSERT INTO `genre` (`genre_id`, `genre`) VALUES (NULL, '$genre');");

if ($result) {
    $_SESSION["add_genre_status"] = "success";
} else {
    $_SESSION["add_genre_status"] = "failed";
}

header("Location:../../genre.php");
?>
