<html lang="fr" nighteye="disabled">
  <head>
        <!--
    Formulaires de Cuisinella Orgeval
    HTML 5.1 
    Version 1.4
    © Léo LESIMPLE
    -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Privé">
    <meta name="author" content="Léo LESIMPLE">
    <title>Cuisinell'Actu • Cuisinella Orgeval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/keyframes.css">
    <!-- Favicons -->

</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-red" style="max-width:175px !important;" href="#">Cuisinella Orgeval</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 " href="./auth/logout.php">Déconnexion</a>
    </div>
  </div>
</header>
<?php session_start(); 
if(!isset($_SESSION['UserData']['Username'])){
        header("location:./auth/login.php");
        exit;
}
?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
          <p class="text-center fw-bold">
              Version : 1.3
            </p>
            <hr>
            <a class="nav-link"  href="./index.php">
              <i class="bi bi-house"></i>
              Accueil
            </a>
            <a class="nav-link"  href="./sav.php">
              <i class="bi bi-cone-striped"></i>
              SAV
            </a>
            <a class="nav-link active" href="./actu.php">
              <i class="bi bi-newspaper"></i>
              Cuisinell'Actu
            </a>
            <a class="nav-link" href="./absence.php">
                <i class="bi bi-briefcase"></i>
                Absences
              </a>
              <a class="nav-link" href="./relance.php">
                <i class="bi bi-briefcase"></i>
                Relance
              </a>
            <a class="nav-link" href="./maps.php">
                <i class="bi bi-compass"></i>
                Plans
              </a>
            <a class="nav-link "  href="./changelog.php">
              <i class="bi bi-view-list"></i>
              Changelog
            </a>
          </li>
        </ul>
</div>
    </div>

      </div>
    </nav>
</div>
</div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

<h2 class="mt-3">Cuisinell''Actu</h2>
<form class="d-flex justify-content-center" action="https://dashboard.onyos.fr/sendzone/send-news.php" method="post" enctype="multipart/form-data">
  <div class="m-5 w-50">
    <h3>Titre</h3>
    <div class="form-floating mb-3">
      <input type="text" class="form-control mb-4" name="title" id="floatingInput" placeholder="Titre...">
      <label for="floatingInput">Titre</label>
    </div>
    <h5 class="text-start">Description</h5>
    <div class="form-floating mb-3">
      <textarea class="form-control" placeholder="Description" name="description" id="floatingTextarea"></textarea>
      <label for="floatingTextarea">Description</label>
    </div>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000000000000000000000" />
      <input class="form-control" type="file" id="formFile"name="imgnews" accept=".jpg,.jpeg">
    <div class='mt-4'>
      <button type="submit" class="btn btn-outline-danger" value="Send Form">Publier</button>
    </div>
</form>
</main>
</div>
</div>
</div>
</div>
    </main>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>