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
  <title>Dashboard • Cuisinella Orgeval</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/app.css">
  <link rel="stylesheet" href="./css/keyframes.css">
  <meta http-equiv="refresh" content="4; url=https://dashboard.onyos.fr/">
  <style>
    body {
      visibility: hidden;
    }

    .error {
      visibility: visible !important;
    }
  </style>

  <!-- Favicons -->

</head>
<div class="error">
  <h1 class="text-center mt-5">Contenu Indisponible !</h1>
  <p class="fs-6 text-warning text-center fw-bold">Vous allez être redirigé sur la page d'accueil automatiquement !</p>
</div>
<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-red" style="max-width:175px !important;" href="#">Cuisinella Orgeval</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 " type="text" placeholder="Rechercher" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3 " href="./auth/logout.php">Déconnexion</a>
      </div>
    </div>
  </header>
  <?php session_start();
  if (!isset($_SESSION['UserData']['Username'])) {
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
                Version : 1.3.1
              </p>
              <hr>
              <a class="nav-link" href="./index.php">
                <i class="bi bi-house"></i>
                Accueil
              </a>
              <a class="nav-link" href="./sav.php">
                <i class="bi bi-cone-striped"></i>
                SAV
              </a>
              <a class="nav-link" href="./actu.php">
                <i class="bi bi-newspaper"></i>
                Cuisinell'Actu
              </a>
              <a class="nav-link" href="./absence.php">
                <i class="bi bi-briefcase"></i>
                Absences
              </a>
              <a class="nav-link active" href="./relance.php">
                <i class="bi bi-briefcase"></i>
                Relance
              </a>
              <a class="nav-link" href="./maps.php">
                <i class="bi bi-compass"></i>
                Plans
              </a>
              <a class="nav-link" href="./changelog.php">
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
    <div class="chartjs-size-monitor">
      <div class="chartjs-size-monitor-expand">
        <div class=""></div>
      </div>
      <div class="chartjs-size-monitor-shrink">
        <div class=""></div>
      </div>
    </div>
    <h4 class="d-none">Historique des Absences</h4>
    <h4 class="mt-5">Relance <small class="text-secondary fs-6">(si le salarié n'a pas justifié son absence <b>à son retour</b>)</small></h4>
    <form method="post" enctype="multipart/form-data" name="absence" action="./sendzone/absence/submit.php">
      <div class="row">
        <div class="col-lg-3 col-md-12 py-md-3">
          <select class="form-select" name="vendeurabsent" aria-label="vendeur" required>
            <option selected>Choisissez...</option>
            <option value="audrey.tichit">Audrey Tichit</option>
            <option value="johan.coudert">Johan Coudert</option>
            <option value="tom.coudert">Tom Coudert</option>
            <option value="dinis.ferreira">Dinis Ferreira</option>
            <option value="khaoula.hammami">Khaoula Hammami</option>
            <option value="karine.lesimple">Karine Lesimple</option>
            <option value="régis.rétif">Régis Rétif</option>
            <option value="johan.sacilotto">Johan Sacilotto</option>
            <option value="kaled.salhi">Kaled Salhi</option>
            <option value="jessy.laram">Jessy Laram</option>
          </select>
        </div>
        <div class="col-lg-3 col-md-12 py-md-3">
          <div class="input-group">
            <input type="date" name="datedebut" class="form-control">
            <input type="time" name="heuredebut" class="form-control">
          </div>
        </div>
        <div class="col-lg-3 col-md-12 py-md-3">
          <div class="input-group">
            <input type="date" name="datefin" class="form-control">
            <input type="time" name="heurefin" class="form-control">
          </div>
        </div>
        <div class="col-lg-3 col-md-12 py-md-3">
          <input type="hidden" class="form-control" placeholder="Motif" name="motif" style="height:42px !important;">
        </div>
        <div class="col-lg-6 col-md-12">
          <textarea class="form-control" aria-label="With textarea" name="comments"></textarea>
        </div>
        <div class="col-lg-6 col-md-12">
          <input class="btn btn-danger" type="submit" value="Envoyer">
        </div>
      </div>
    </form>
    <div class="table-responsive mt-5">
      <?php
      $str_data = file_get_contents("./sendzone/absence/absence.json");
      $data = json_decode($str_data, true);

      $temp = "<table id=\"tblData\" class='table table-striped table-hover'>";

      $temp .= "<tr><th scope='col'>Nom</th>";
      $temp .= "<th scope='col'>Date de début</th>";
      $temp .= "<th scope='col'>Heure de début</th>";
      $temp .= "<th scope='col'>Date de fin</th>";
      $temp .= "<th scope='col'>Heure de fin</th>";
      $temp .= "<th scope='col'>Commentaires</th></tr>";

      for ($i = 0; $i < sizeof($data["absence"]); $i++) {
        $temp .= "<tr>";
        $temp .= "<td>" . $data["absence"][$i]["id"] . "</td>";
        $temp .= "<td>" . $data["absence"][$i]["datedebut"] . "</td>";
        $temp .= "<td>" . $data["absence"][$i]["heuredebut"] . "</td>";
        $temp .= "<td>" . $data["absence"][$i]["datefin"] . "</td>";
        $temp .= "<td>" . $data["absence"][$i]["heurefin"] . "</td>";
        $temp .= "<td>" . $data["absence"][$i]["comments"] . "</td>";
        $temp .= "</tr>";
      }

      $temp .= "</table>";

      echo $temp;
      ?>
    </div>

  </main>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</body>

</html>