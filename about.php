<?php

include("connection.php");

$query = mysqli_query($conn,"SELECT * FROM `publisher`");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
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
              <a class="nav-link" href="index.php">Home</a>
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
              <a class="nav-link active" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container content">
    <div class="p-5 mb-4 bg-dark rounded-3">
      <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold text-light mb-5">Cyberspace Citadel</h1>
        <p class="col-md-12 fs-4 text-light">Welcome to Cyberspace Citadel, your digital haven for immersive gaming experiences! At Cyberspace Citadel, we believe in the power of gaming to transport players to new worlds, spark creativity, and forge unforgettable adventures. Our store is more than just a marketplace; it's a fortress of digital delights where gamers of all stripes can find a curated selection of PC games that cater to every taste and preference. Whether you're a seasoned gamer seeking the latest AAA titles or a casual player exploring indie gems, Cyberspace Citadel is your gateway to a vast realm of entertainment. We are passionate about creating a community where gamers can connect, discover, and share their love for the boundless realms of virtual reality. Join us on this thrilling journey, and let Cyberspace Citadel be your go-to destination for all things gaming!</p>
      </div>
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
</body>
</html>