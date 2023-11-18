<?php
session_start();

include("connection.php");

$publishers = mysqli_query($conn, "SELECT * FROM `publisher`");

if (isset($_SESSION["add_publisher_status"])) {
  $addStatus = $_SESSION["add_publisher_status"];

  if ($addStatus == "success") {
    $alertType = "success";
    $alertMessage = "New Publisher Successfully Added!";
  } elseif ($addStatus == "failed") {
    $alertType = "danger";
    $alertMessage = "Failed to add new Publisher.";
  }

  unset($_SESSION["add_publisher_status"]);
}

if (isset($_SESSION["edit_publisher_status"])) {
  $editStatus = $_SESSION["edit_publisher_status"];

  if ($editStatus == "success") {
    $editAlertType = "success";
    $editAlertMessage = "Publisher Updated Successfully!";
  } elseif ($editStatus == "failed") {
    $editAlertType = "danger";
    $editAlertMessage = "Failed to update Publisher.";
  }

  unset($_SESSION["edit_publisher_status"]);
}

if (isset($_SESSION["delete_publisher_status"])) {
  $deleteStatus = $_SESSION["delete_publisher_status"];

  if ($deleteStatus == "success") {
    $deleteAlertType = "success";
    $deleteAlertMessage = "Publisher Deleted Successfully!";
  } elseif ($deleteStatus == "failed") {
    $deleteAlertType = "danger";
    $deleteAlertMessage = "Failed to delete Publisher.";
  }

  unset($_SESSION["delete_publisher_status"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publisher</title>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPublisherModal">
          Add new publisher
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <h2 class="text-light">Publisher List</h2>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <ul class="list-group list-group-numbered">
          <?php foreach ($publishers as $publisher) { ?>
            <li class="list-group-item">
              <?= $publisher["publisher_name"] ?>
              <a href="#" class="badge bg-danger rounded-pill float-end ms-1 link-underline link-underline-opacity-0" onclick="confirmDelete(<?= $publisher['publisher_id'] ?>)">delete</a>
              <a href="#editPublisherModal<?= $publisher['publisher_id'] ?>" class="badge bg-warning rounded-pill float-end ms-1 link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#editPublisherModal<?= $publisher['publisher_id'] ?>">edit</a>
            </li>
            <div class="modal fade" id="editPublisherModal<?= $publisher['publisher_id'] ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitle">Edit Publisher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="backend/edit/edit-publisher.php" method="post">
                      <div class="form-group">
                        <label for="editPublisher">Publisher</label>
                        <input type="text" class="form-control" id="editPublisher" name="editPublisher" value="<?= $publisher["publisher_name"] ?>" autocomplete="off">
                        <input type="hidden" name="publisher_id" value="<?= $publisher["publisher_id"] ?>">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="editPublisherBtn">Edit Publisher</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addPublisherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalTitle">Add New Publisher</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="backend/add/add-publisher.php" method="post">
            <div class="form-group">
              <label for="publisher">Publisher</label>
              <input type="text" class="form-control" id="addPublisher" name="addPublisher" autocomplete="off">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="addPublisherBtn">Add Publisher</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script>
    function confirmDelete(publisherId) {
      if (confirm('Are you sure you want to delete this publisher?')) {
        window.location.href = 'backend/delete/delete-publisher.php?publisher_id=' + publisherId;
      } else {
        console.log('Deletion canceled.');
      }
    }
  </script>
</body>

</html>