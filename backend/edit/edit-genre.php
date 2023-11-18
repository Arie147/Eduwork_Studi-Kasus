<?php
session_start();

include("../../connection.php");

$editGenre = $_POST["editGenre"];
$genreId = $_POST["genre_id"];

$result = mysqli_query($conn, "UPDATE `genre` SET `genre` = '$editGenre' WHERE `genre_id` = $genreId");

if ($result) {
    $_SESSION["edit_genre_status"] = "success";
} else {
    $_SESSION["edit_genre_status"] = "failed";
}

header("Location:../../genre.php");
exit();
?>
