<!doctype html>
<html lang="en">
  <head>
    <?php 
      $requestedSubject = $_GET["subject"]; // Get the requested subject from the URL.
      $subjects = json_decode(file_get_contents("json/scps.json")); // Get all the subjects from the JSON file.
      $currentSubject = NULL;
      $currentSubjectIndex = NULL;
      $lastIndex = count($subjects) -1;

      // Iterate through each subject
      for ($i = 0; $i < count($subjects); $i++) {
        if ($subjects[$i]->item === $requestedSubject) {
          $currentSubject = $subjects[$i];
          $currentSubjectIndex = $i;
        }
      }
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title><?php echo $subject->item." | SCP Foundation"; ?></title>
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
    <div class="container">
      <br>
      <br>
      <div class="row">
        <div class="col-md scp-widget">
          <div class="text-center">
            <div class="scp-subject-file-nav">
              <p>
                <strong>
                  <?php
                    if ($currentSubjectIndex > 0) {
                      $prevSubject = $subjects[$currentSubjectIndex -1];
                      echo '<a class="scp-anchor" href="'.'subject.php?subject='.$prevSubject->item.'">&lt;&lt; '.$prevSubject->item.'</a> | ';
                    }
                    echo $currentSubject->item;
                    if ($currentSubjectIndex < $lastIndex) {
                      $nextSubject = $subjects[$currentSubjectIndex+ 1];
                      echo ' | <a class="scp-anchor" href="'.'subject.php?subject='.$nextSubject->item.'">'.$nextSubject->item.' &gt;&gt;</a>';
                    }
                  ?>
                </strong>
              </p>
            </div>
            <h1 id="speech"><strong>Item #: </strong><?php echo $currentSubject->item ?></h1>
            <h2 id="speech"><strong>Object Class: </strong><?php echo $currentSubject->object_class; ?></h2>
          </div>
          <br>
          <button class="btn btn-primary" onclick="Speak()"><img src="images/logo-speech-light.png" style="height: 30px; width: auto; padding-right: 5px;">Speak</button>
          <br><br>
          <div class="scp-text-wrap">
            <div class="scp-subject-image">
              <img src="<?php echo $currentSubject->subject_image; ?>" alt="<?php echo $currentSubject->item; ?>">
            </div>
          </div>
          <h5 id="speech"><strong>Special Containment Procedures:</strong></h5>
          <p id="speech"><?php echo $currentSubject->special_containment_procedures; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md scp-widget">
          <h5 id="speech"><strong>Description:</strong></h5>
          <p id="speech"><?php echo $currentSubject->description; ?></p>
        </div>
      </div>
    </div>
    <br>
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
    <script src="js/voice.js"></script>
  </body>
</html>