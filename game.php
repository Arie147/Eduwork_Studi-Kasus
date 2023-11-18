<?php
session_start();

include("connection.php");

$games = mysqli_query($conn, "SELECT * FROM `game` JOIN genre ON game.genre_id=genre.genre_id JOIN developer ON game.developer_id=developer.developer_id JOIN publisher ON game.publisher_id=publisher.publisher_id ORDER BY id ASC");

if (isset($_SESSION["add_game_status"])) {
  $addStatus = $_SESSION["add_game_status"];

  if ($addStatus == "success") {
    $alertType = "success";
    $alertMessage = "New Game Successfully Added!";
  } elseif ($addStatus == "failed") {
    $alertType = "danger";
    $alertMessage = "Failed to add new Game.";
  } elseif ($addStatus == "error") {
    $alertType = "danger";
    $alertMessage = "File is not a picture.";
  } elseif ($addStatus == "size") {
    $alertType = "danger";
    $alertMessage = "Sorry, your file size is too large.";
  } elseif ($addStatus == "format") {
    $alertType = "danger";
    $alertMessage = "Sorry, only JPG, JPEG, & PNG files are allowed.";
  } elseif ($addStatus == "empty") {
    $alertType = "danger";
    $alertMessage = "Please upload a picture.";
  }

  unset($_SESSION["add_game_status"]);
}

if (isset($_SESSION["edit_game_status"])) {
  $editStatus = $_SESSION["edit_game_status"];

  if ($editStatus == "success") {
    $editAlertType = "success";
    $editAlertMessage = "Game Updated Successfully!";
  } elseif ($editStatus == "failed") {
    $editAlertType = "danger";
    $editAlertMessage = "Failed to update game.";
  } elseif ($editStatus == "error") {
    $editAlertType = "danger";
    $editAlertMessage = "File is not a picture.";
  } elseif ($editStatus == "size") {
    $editAlertType = "danger";
    $editAlertMessage = "Sorry, your file size is too large.";
  } elseif ($editStatus == "format") {
    $editAlertType = "danger";
    $editAlertMessage = "Sorry, only JPG, JPEG, & PNG files are allowed.";
  }

  unset($_SESSION["edit_game_status"]);
}

if (isset($_SESSION["delete_game_status"])) {
  $deleteStatus = $_SESSION["delete_game_status"];

  if ($deleteStatus == "success") {
    $deleteAlertType = "success";
    $deleteAlertMessage = "Game Deleted Successfully!";
  } elseif ($deleteStatus == "failed") {
    $deleteAlertType = "danger";
    $deleteAlertMessage = "Failed to delete Game.";
  }

  unset($_SESSION["delete_game_status"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-image: url('img/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    p {
      margin: 0;
    }

    .content {
      margin-top: 80px;
    }
  </style>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg bg-primary fixed-top mb-4" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Cyberspace Citadel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Data
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="game.php">Game</a></li>
                <li><a class="dropdown-item" href="genre.php">Genre</a></li>
                <li><a class="dropdown-item" href="developer.php">Developer</a></li>
                <li><a class="dropdown-item" href="publisher.php">Publisher</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container content mb-5">
    <div class="row">
      <div class="col-lg-6">
        <?php if (isset($addStatus)) { ?>
          <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show" role="alert">
            <?php echo $alertMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <?php if (isset($editStatus)) { ?>
          <div class="alert alert-<?php echo $editAlertType; ?> alert-dismissible fade show" role="alert">
            <?php echo $editAlertMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <?php if (isset($deleteStatus)) { ?>
          <div class="alert alert-<?php echo $deleteAlertType; ?> alert-dismissible fade show" role="alert">
            <?php echo $deleteAlertMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <a class="btn btn-primary" href="add-edit-game/add-game-page.php" role="button">
          Add new game
        </a>
      </div>
    </div>

    <div class="row mb-3">
      <h2 class="text-light">Game List</h2>
    </div>

    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr class="align-middle">
            <th scope="col">No.</th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Developer</th>
            <th scope="col">Publisher</th>
            <th scope="col">Release Date</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($games as $game) { ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $game["title"] ?></td>
              <td><?= $game["genre"] ?></td>
              <td><?= $game["developer_name"] ?></td>
              <td><?= $game["publisher_name"] ?></td>
              <td><?= date("d/m/Y", strtotime($game["rls_date"])) ?></td>
              <td width="100"><?= "Rp " . number_format($game['price']); ?></td>
              <td><img src="img/<?= $game["picture"] ?>" height="100" width="200"></td>
              <td class="text-center">
                <a class="btn btn-warning mb-2 mt-2" href="add-edit-game/edit-game-page.php?id=<?= $game['id']; ?>" role="button">Edit</a>
                <br>
                <a class="btn btn-danger" href="#" role="button" onclick="confirmDelete(<?= $game['id'] ?>)">Delete</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script>
    function confirmDelete(id) {
      if (confirm('Are you sure you want to delete this game?')) {
        window.location.href = 'backend/delete/delete-game.php?id=' + id;
      } else {
        console.log('Deletion canceled.');
      }
    }
  </script>
</body>

</html>