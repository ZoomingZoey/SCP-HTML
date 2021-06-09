<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Create new Record | SCP Foundation</title>
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
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="catalogue.php">SCP Catalogue</a>
              </li>
            </ul>
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
    <div class="container d-flex align-items-center justify-content-center h-100">
      <div style="width: 1000px; background-color: white; padding: 25px; border-radius: 25px;">
        <h2>Enter new SCP record</h2>
        <br>
        <form class="form-group" method="post" action="connection.php">
          <label>SCP-Item:</label>
          <br>
          <input class="form-control" type="text" name="item" placeholder="Item name" required>
          <br>
          <label>Object class:</label>
          <br>
          <input class="form-control" type="text" name="object_class" placeholder="Safe, Euclid, Thaumiel, Keter.." required>
          <br>
          <label>Subject image (optional):</label>
          <br>
          <input class="form-control" type="text" name="subject_image" placeholder="URL link">
          <br>
          <label>SCP Containment:</label>
          <br>
          <textarea class="form-control" name="containment" rows=5 required></textarea>
          <br>
          <label>SCP Description:</label>
          <br>
          <textarea class="form-control" name="description" rows=5 required></textarea>
          <br>
          <input class="btn btn-success" type="submit" name="create" value="Add Record">
        </form>
        <div class="my-3">
          <a class="btn btn-primary" href="index.php" role="button" rel="nofollow">Back to home page</a>
        </div>
      </div>
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