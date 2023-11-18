<?php
session_start();

include("../../connection.php");

$title = $_POST["title"];
$genre = $_POST["genre"];
$developer = $_POST["developer"];
$publisher = $_POST["publisher"];
$rls_date = $_POST["rls_date"];
$price = $_POST["price"];

if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] == UPLOAD_ERR_OK) {
    $targetDirectory = "../../img/";
    $targetFile = $targetDirectory . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if ($check === false) {
        $_SESSION["add_game_status"] = "error";
        header("Location:../../game.php");
        exit();
    }

    if ($_FILES["picture"]["size"] > 3000000) {
        $_SESSION["add_game_status"] = "size";
        header("Location:../../game.php");
        exit();
    }

    $allowedFileTypes = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowedFileTypes)) {
        $_SESSION["add_game_status"] = "format";
        header("Location:../../game.php");
        exit();
    }

    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
        $picture = basename($_FILES["picture"]["name"]);
    } else {
        $_SESSION["add_game_status"] = "failed";
        header("Location:../../game.php");
        exit();
    }
} else {
    $_SESSION["add_game_status"] = "empty";
    header("Location:../../game.php");
    exit();
}

$result = mysqli_query($conn, "INSERT INTO `game` (`id`, `title`, `genre_id`, `developer_id`, `publisher_id`, `rls_date`, `price`, `picture`) VALUES (NULL, '$title', '$genre', '$developer', '$publisher', '$rls_date', '$price', '$picture');");

if ($result) {
    $_SESSION["add_game_status"] = "success";
} else {
    $_SESSION["add_game_status"] = "failed";
}

header("Location:../../game.php");
exit();
?>
