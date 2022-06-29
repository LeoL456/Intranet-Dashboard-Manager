<html lang="fr" nighteye="disabled">

<head>
  <!--
    Formulaires de Cuisinella Orgeval
    HTML 5.1 
    Version 1 du 03 mai 2022 
    © Léo LESIMPLE
    -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Privé">
  <meta name="author" content="Léo LESIMPLE">
  <title>Accueil • Dashboard Orgeval</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/app.css">
  <link rel="stylesheet" href="./css/keyframes.css">
  <style>
    body{
      background-image: url(./img/Valley_Noon.png);
      background-size: cover;
    }
  </style>
  
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
  <script src="./js/mapbox-directions.js"></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>

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
              <a class="nav-link active" href="./index.php">
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
              <a class="nav-link" href="./relance.php">
                <i class="bi bi-briefcase"></i>
                Relance
              </a>
              <a class="nav-link " href="./maps.php">
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
  <main class="col-12">
    <div class="chartjs-size-monitor">
      <div class="chartjs-size-monitor-expand">
        <div class=""></div>
      </div>
      <div class="chartjs-size-monitor-shrink">
        <div class=""></div>
      </div>
    </div>
    <style>
      body {
        transition: all 1s !important;
      }

      .icon {
        width: 128px !important;
        height: auto;
        margin-left: 80px !important;
        margin-right: 80px !important;
        margin-top: 40px;
      }

      .dash-home {
        display: grid;
        grid-auto-rows: 1fr;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        gap: 0px 0px;
        grid-template-areas:
          "sav-icon news-icon abs-icon"
          "maps-icon log-icon .";
        width: fit-content;
      }

      .sav-icon {
        grid-area: sav-icon;
        margin-left: auto;
        margin-left: auto;
      }

      .news-icon {
        grid-area: news-icon;
        margin-left: auto;
        margin-left: auto;
      }

      .abs-icon {
        grid-area: abs-icon;
        margin-left: auto;
        margin-left: auto;
      }

      .maps-icon {
        grid-area: maps-icon;
        margin-left: auto;
        margin-left: auto;
      }

      .log-icon {
        grid-area: log-icon;
        margin-left: auto;
        margin-left: auto;
      }

      .app-name {
        font-size: 18px !important;
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
      }

      .widget-zone {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr;
        gap: 0px 0px;
        grid-auto-flow: row;
        grid-template-areas:
          "maps-zone weather-zone day-zone";
      }

      .maps-zone {
        grid-area: maps-zone;
        margin-top: 30px;
      }

      .weather-zone {
        grid-area: weather-zone;
        margin-top: 30px;
      }

      .day-zone {
        grid-area: day-zone;
        margin-top: 30px;
      }

      .widget {
        width: 270px;
        height: 270px;
        border-radius: 20px;
      }

      .sav-icon-shadow {
        box-shadow: 0 0 0.7rem #E07900;
        border-radius: 25px;
        transition: all 1s !important;

      }

      .news-icon-shadow {
        box-shadow: 0 0 0.7rem #996F3D;
        border-radius: 25px;
        transition: all 1s !important;

      }

      .abs-icon-shadow {
        box-shadow: 0 0 0.7rem #71993D;
        border-radius: 25px;
        transition: all 1s !important;

      }

      .maps-icon-shadow {
        box-shadow: 0 0 0.7rem #3D6799;
        border-radius: 25px;
        transition: all 1s !important;

      }

      .log-icon-shadow {
        box-shadow: 0 0 0.7rem #99853D;
        border-radius: 25px;
        transition: all 1s !important;

      }

      .sav-icon-shadow:hover {
        box-shadow: 0 0 1.5rem #E07900;
        border-radius: 50%;
        transition: all 1s !important;

      }

      .news-icon-shadow:hover {
        box-shadow: 0 0 0.7rem #996F3D;
        border-radius: 50%;
        transition: all 1s !important;

      }

      .abs-icon-shadow:hover {
        box-shadow: 0 0 0.7rem #71993D;
        border-radius: 50%;
        transition: all 1s !important;

      }

      .maps-icon-shadow:hover {
        box-shadow: 0 0 0.7rem #3D6799;
        border-radius: 50%;
        transition: all 1s !important;

      }

      .log-icon-shadow:hover {
        box-shadow: 0 0 0.7rem #99853D;
        border-radius: 50%;
        transition: all 1s !important;

      }

      .maps-w {
        background: grey;
        box-shadow: 0 0 0.7rem #71993D;
      }

      .weather-w {
        background: lightskyblue;
        box-shadow: 0 0 0.7rem #33C4FF;
      }

      .day-w {
        background: whitesmoke;
        box-shadow: 0 0 0.7rem #999;
      }

      .mapboxgl-ctrl-attrib-button,
      .mapboxgl-ctrl,
      .mapboxgl-ctrl-attrib,
      .mapboxgl-compact {
        display: none !important;
      }

      .weather-struc {
        padding: 2rem;
        text-align: center;
      }

      .city {
        font-size: 20px !important;
        font-weight: 700;
      }

      .country {
        display: none !important;
      }

      .temp {
        font-size: 30px;
        color: #3D6799;
      }
    </style>
    <div class="dash-home mx-auto">
      <div class="sav-icon">
        <a href="./sav.php" class="link-dark text-decoration-none">
          <img src="./img/icons/sav.png" alt="" class="icon sav-icon-shadow">
          <p class="app-name">SAV</p>
        </a>
      </div>
      <div class="news-icon">
        <a href="./absence.php" class="link-dark text-decoration-none">
          <img src="./img/icons/abs.png" alt="" class="icon news-icon-shadow">
          <p class="app-name">Absences</p>
        </a>
      </div>
      <div class="abs-icon">
        <a href="./actu.php" class="link-dark text-decoration-none">
          <img src="./img/icons/news.png" alt="" class="icon abs-icon-shadow">
          <p class="app-name">Cuisinell'Actu</p>
        </a>
      </div>
      <div class="maps-icon">
        <a href="./maps.php" class="link-dark text-decoration-none">
          <img src="./img/icons/maps.png" alt="" class="icon maps-icon-shadow">
          <p class="app-name">Maps</p>
        </a>
      </div>
      <div class="log-icon">
        <a href="./changelog.php" class="link-dark text-decoration-none">
          <img src="./img/icons/log.png" alt="" class="icon log-icon-shadow">
          <p class="app-name">Changelog</p>
        </a>
      </div>
    </div>
    </div>
    </div>
    <div class="col-10 ms-auto">
      <div class="widget-zone">
        <div class="maps-zone" onclick="location.href='maps.php'">
          <div class="widget maps-w" style="overflow: hidden;">
            <div id='map' style='width: 100%; height: 100%;'></div>
            <script>
              mapboxgl.accessToken = 'pk.eyJ1IjoibGVvbDQ1NiIsImEiOiJja3ByNjJ4ZG8wNDI5MnFwODYwemd3eHgxIn0.__6W_S-kcyNy4uB_mpL7UQ';
              var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [1.98393, 48.9293],
                zoom: 12,
                interactive: false,

              });
            </script>
          </div>
        </div>
        <div class="weather-zone">
          <div class="widget weather-w">
            <main class="weather-struc">
              <div class="wrapper">
                <img id="icon">
                <div class="weatherWidget">
                  <div id="loading">Loading...</div>
                  <div class="place">
                    <span class="city"></span><span class="country"></span>
                  </div>
                  <div class="temp"></div>
                  <div class="desc"></div>
                </div>
              </div>
            </main>
          </div>
        </div>
        <div class="day-zone">
          <div class="widget day-w text-center p-5">
            <?php echo "<h1 class=\"text-danger fw-100\" style='font-size:80px !important; font-weight:100 !important;'>" . date("d") . "</h1>" ?>
            <?php
            setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR', 'fr', 'fr', 'fra', 'fr_FR@euro');
            echo "<p class='lead'>" . strftime("%B") . '<br>';
            ?>
            <?php echo date("Y") . "</p>" ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  </div>
  </div>
  <script src="./js/weather.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>


</html>