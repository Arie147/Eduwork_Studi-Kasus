<?php
session_start();

include("../../connection.php");

$id = $_POST["id"];
$title = $_POST["title"];
$genre = $_POST["genre"];
$developer = $_POST["developer"];
$publisher = $_POST["publisher"];
$rls_date = $_POST["rls_date"];
$price = $_POST["price"];

if (isset($_FILES["newPicture"]) && $_FILES["newPicture"]["error"] == UPLOAD_ERR_OK) {
    $targetDirectory = "../../img/";
    $targetFile = $targetDirectory . basename($_FILES["newPicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["newPicture"]["tmp_name"]);
    if ($check === false) {
        $_SESSION["edit_game_status"] = "error";
        header("Location:../../game.php");
        exit();
    }

    if ($_FILES["newPicture"]["size"] > 3000000) {
        $_SESSION["edit_game_status"] = "size";
        header("Location:../../game.php");
        exit();
    }

    $allowedFileTypes = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowedFileTypes)) {
        $_SESSION["edit_game_status"] = "format";
        header("Location:../../game.php");
        exit();
    }

    if (move_uploaded_file($_FILES["newPicture"]["tmp_name"], $targetFile)) {
        $picture = basename($_FILES["newPicture"]["name"]);
    } else {
        $_SESSION["edit_game_status"] = "failed";
        header("Location:../../game.php");
        exit();
    }
} else {
    $picture = $_POST["picture"];
}

$result = mysqli_query($conn, "UPDATE `game` SET `title` = '$title', `genre_id` = '$genre', `developer_id` = '$developer', `publisher_id` = '$publisher', `rls_date` = '$rls_date', `price` = '$price', `picture` = '$picture' WHERE `game`.`id` = $id;");

if ($result) {
    $_SESSION["edit_game_status"] = "success";
} else {
    $_SESSION["edit_game_status"] = "failed";
}

header("Location:../../game.php");
exit();
?>
