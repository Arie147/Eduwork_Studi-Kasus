<?php

include("../connection.php");

$genres = mysqli_query($conn, "SELECT * FROM `genre`");
$developers = mysqli_query($conn, "SELECT * FROM `developer`");
$publishers = mysqli_query($conn, "SELECT * FROM `publisher`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Game</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-image: url('../img/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    p {
      margin: 0;
    }
  </style>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg bg-primary mb-4" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Cyberspace Citadel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Data
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../game.php">Game</a></li>
                <li><a class="dropdown-item" href="../genre.php">Genre</a></li>
                <li><a class="dropdown-item" href="../developer.php">Developer</a></li>
                <li><a class="dropdown-item" href="../publisher.php">Publisher</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container-lg mb-5">
    <div class="row mb-3">
      <h2 class="text-light">Add New Game</h2>
    </div>
    <form action="../backend/add/add-game.php" method="post" enctype="multipart/form-data">
      <div class="col-lg-6 mb-3">
        <label for="title" class="form-label text-light">Title</label>
        <input type="text" class="form-control" id="title" name="title" oninput="checkForm()">
      </div>

      <div class="col-lg-2 mb-3">
        <label for="genre" class="form-label text-light">Genre</label>
        <select class="form-select" id="genre" name="genre">
          <?php foreach ($genres as $genre) { ?>
            <option value="<?= $genre['genre_id'] ?>"><?= $genre['genre'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="col-lg-3 mb-3">
        <label for="developer" class="form-label text-light">Developer Name</label>
        <select class="form-select" id="developer" name="developer">
          <?php foreach ($developers as $developer) { ?>
            <option value="<?= $developer['developer_id'] ?>"><?= $developer['developer_name'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="col-lg-3 mb-3">
        <label for="publisher" class="form-label text-light">Publisher Name</label>
        <select class="form-select" id="publisher" name="publisher">
          <?php foreach ($publishers as $publisher) { ?>
            <option value="<?= $publisher['publisher_id'] ?>"><?= $publisher['publisher_name'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="col-lg-2 mb-3">
        <label for="rls_date" class="form-label text-light">Release Date</label>
        <input type="date" class="form-control" id="rls_date" name="rls_date" oninput="checkForm()">
      </div>

      <div class="col-lg-2 mb-3">
        <label for="price" class="form-label text-light">Price</label>
        <input type="number" class="form-control" id="price" name="price" oninput="checkForm()">
      </div>

      <div class="col-lg-3 mb-4">
        <label for="picture" class="form-label text-light">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture">
        <p class="text-light mt-1">Max picture size is 3 MB</p>
      </div>

      <button type="submit" id="submit" class="btn btn-primary" disabled>Submit</button>
      <a class="btn btn-danger ms-2" href="../game.php" role="button">Cancel</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script>
    function checkForm() {
      var title = document.getElementById('title').value;
      var price = document.getElementById('price').value;
      var price = document.getElementById('rls_date').value;

      if (title === '' || price === '') {
        document.getElementById('submit').disabled = true;
      } else {
        document.getElementById('submit').disabled = false;
      }
    }
  </script>
</body>

</html>