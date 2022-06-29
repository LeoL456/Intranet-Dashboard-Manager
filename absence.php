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
</head>
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
              <a class="nav-link active" href="./absence.php">
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
              <a class="nav-link" href="./changelog.php">
                <i class="bi bi-view-list"></i>
                Changelog
              </a>
            </li>
          </ul>
        </div>
    </div>
  </div>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 d-md-none d-lg-block mt-4">
            <h4>Absences</h4>
          </div>
          <div class="col-lg-6 col-md-12">
            <form method="post" enctype="multipart/form-data" name="relance" action="./sendzone/relance/submit.php">
              <div class="d-flex justify-content-end">
                <div class="container">
                  <div class="row">
                    <div class="col py-md-3">
                      <select class="form-select" name="absent" aria-label="vendeur" required>
                        <option selected>Choisissez...</option>
                        <option value="johan.coudert">Johan Coudert</option>
                        <option value="tom.coudert">Tom Coudert</option>
                        <option value="dinis.ferreira">Dinis Ferreira</option>
                        <option value="khaoula.hammami">Khaoula Hammami</option>
                        <option value="karine.lesimple">Karine Lesimple</option>
                        <option value="regis.retif">Régis Rétif</option>
                        <option value="johan.sacilotto">Johan Sacilotto</option>
                        <option value="kaled.salhi">Kaled Salhi</option>
                        <option value="audrey.tichit">Audrey Tichit</option>
                        <option value="jessy.laram">Jessy Laram</option>
                      </select>
                    </div>
                    <div class="col py-md-3">
                      <input class="form-control" type="date" name="debutabs" data-date="" data-date-format="DD MMMM YYYY">
                    </div>
                    <div class="col py-md-3">
                      <input class="form-control" type="time" name="heureabs">
                    </div>
                    <div class="col py-md-3">
                      <input class="btn btn-warning" type="submit" value="Envoyer">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    <h4 class="d-none">Historique des Absences</h4>
    <div class="table-responsive mt-5">
      <?php
      $str_data = file_get_contents("./sendzone/relance/relance.json");
      $data = json_decode($str_data, true);

      $temp = "<table id=\"tblData\" class='table table-striped table-hover'>";

      $temp .= "<tr><th scope='col'>Nom</th>";
      $temp .= "<th scope='col'>Date de début</th>";
      $temp .= "<th scope='col'>Heure de début</th>";

      for ($i = 0; $i < sizeof($data["historique"]); $i++) {
        $temp .= "<tr>";
        $temp .= "<td>" . $data["historique"][$i]["id"] . "</td>";
        $temp .= "<td>" . $data["historique"][$i]["debutabs"] . "</td>";
        $temp .= "<td>" . $data["historique"][$i]["heureabs"] . "</td>";
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