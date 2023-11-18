<?php

include("connection.php");

$games = mysqli_query($conn, "SELECT title, genre, developer_name, publisher_name, rls_date, price, picture FROM `game` JOIN genre ON game.genre_id=genre.genre_id JOIN developer ON game.developer_id=developer.developer_id JOIN publisher ON game.publisher_id=publisher.publisher_id ORDER BY id ASC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cyberspace Citadel</title>
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

    #gameCarousel {
      height: 500px;
      width: 800px; 
      margin: auto; 
      margin-top: 90px;
    }

    .carousel-inner img {
      object-fit: cover;
      height: 100%;
      width: 50%;
    }

    footer {
      background-color: #343a40;
      color: white;
      padding: 20px 0;
    }
    
    .white-hr {
      border-top: 1px solid white;
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
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

  <div id="gameCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/baldurgate3.jpg" class="d-block w-100" alt="Game 1">
      </div>
      <div class="carousel-item">
        <img src="img/cyberpunk2077.jpg" class="d-block w-100" alt="Game 2">
      </div>
      <div class="carousel-item">
        <img src="img/eldenring.jpg" class="d-block w-100" alt="Game 3">
      </div>
      <div class="carousel-item">
        <img src="img/liesofp.jpg" class="d-block w-100" alt="Game 4">
      </div>
      <div class="carousel-item">
        <img src="img/hogwartslegacy.jpg" class="d-block w-100" alt="Game 5">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#gameCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#gameCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container mb-5">
    <div class="row mb-3">
      <h2 class="text-light">Game List</h2>
    </div>

    <div class="row row-cols-4 g-5">
      <?php foreach ($games as $game) { ?>
        <div class="col">
          <div class="card h-100" style="width: 16rem; background-color:rgb(32, 33, 36);">
            <img src="img/<?= $game["picture"] ?>" class="card-img-top" height="150">
            <div class="card-body text-light">
              <h5 class="card-title"><?= $game["title"] ?></h5>
              <p class="card-text mb-2">Genre: <?= $game["genre"] ?></p>
              <p class="card-text">Developer: <?= $game["developer_name"] ?></p>
              <p class="card-text mb-2">Publisher: <?= $game["publisher_name"] ?></p>
              <p class="card-text mb-2">Release Date: <br><?= date("d F Y", strtotime($game["rls_date"])) ?></p>
              <p class="card-text mb-2">Price: <?= "Rp " . number_format($game['price']); ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="col-md-6">
          <h5>Cyberspace Citadel</h5>
          <p>Cyberspace Citadel is your premier destination for digital gaming bliss. As a dedicated online store, we offer a carefully curated collection of PC games, ranging from cutting-edge AAA titles to indie gems. Our mission is to provide gamers with a fortress of entertainment, where they can explore, connect, and indulge in the vast realms of virtual excitement. Join us at Cyberspace Citadel and elevate your gaming experience to new heights.</p>
        </div>
        <div class="col-md-4">
          <h5>Contact Information</h5>
          <p>Phone: +62 (021) 748-2372<br>
            Address: Grogol, West Jakarta</p>
          <ul class="nav col-md-6 justify-content-between list-unstyled d-flex mt-3">
            <li class="ms-3"><a class="text-body-secondary" href="#"><img src="img/fb.png" width="30px"></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><img src="img/x.png" width="30px"></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><img src="img/ig.png" width="30px"></a></li>
          </ul>
        </div>
        <div class="col-12">
          <hr class="white-hr">
          <p class="text-center">&copy; 2023 Cyberspace Citadel. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var gameCarousel = new bootstrap.Carousel(document.getElementById('gameCarousel'), {
        interval: 3000,
        wrap: true
      });
    });
  </script>

</body>

</html>