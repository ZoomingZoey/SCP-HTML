<!doctype html>
<html lang="en">
  <head>
    <?php
      include "connection.php"; // Include the PHP file that connects to the database.
      $numOfCols = 6; // The maximum number of cards/columns to show on each row.
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>SCP Catalogue | SCP Foundation</title>
  </head>
  <body>
    
  <!-- Navbar header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #303030;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img class="scp-logo" src="images/logo-dark.png" alt="SCP Logo">
          SCP Foundation
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="catalogue.php">SCP Catalogue</a>
            </li>
          </ul>
          <div>
            <div class="container" style="padding: 5px;">
              <a class="nav-link btn btn-primary" href="create.php">Create new SCP record</a>
            </div>
          </div>
          <form class="d-flex">
            <input class="form-control me-2" type="text" name="Username" placeholder="Username">
            <input class="form-control me-2" type="password" name="Password" placeholder="Password">
            <button class="btn btn-primary" type="submit" value="Agent-Login">Login</button>
          </form>
        </div>
      </div>
    </nav>
    
  </header>
  <!-- Content -->
  <div class="container-fluid" style=" padding-top: 50px;">
    <div class="text-center text-light">
      <h1>SCP Catalogue</h1>
      <br>
      <br>
    </div>
    <?php
    $count = 0;
    foreach ($table as $subject) {
      // Create Update and Delete URL variables
      $id = $subject['id'];
      $update = 'update.php?update=' . $id;
      $delete = 'connection.php?delete=' . $id;
      if ($count === 0) echo '<div class="row">';
      echo <<<EOT
      <div class="col d-flex justify-content-center" style="padding-bottom: 25px;">
        <div class="card" style="width: 18rem;">
          <img src="{$subject['subject_image']}" class="card-img-top" alt="{$subject['item']}">
          <div class="card-body">
            <div style="float: right;">
              <a href="{$update}"><img title="Edit Subject" style="width: 24px;" src="images/edit.png"/></a>
              <a href="{$delete}"><img title="Delete Subject" style="width: 24px;" src="images/delete.png"/></a>
            </div>
            <h5 class="card-title"><strong>{$subject['item']}</strong></h5>
            <h6 class="card-subtitle mb-2"><strong>Object Class: </strong>{$subject['object_class']}</h6>
            <p class="card-text">{$subject['description']}</p>
            <a href="subject.php?subject={$subject['item']}" class="btn btn-primary">Read more</a>
          </div>
        </div>
      </div>
      EOT;
      $count++;
      if ($count === $numOfCols) { echo '</div>'; $count = 0; }
    }
    ?>
    <div class="w-100" style="height: 35px"></div>
  </div>
  <!-- Footer -->
  <footer>Copyright &copy; SCP Foundation 2021</footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  -->
  </body>
</html>