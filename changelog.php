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
  <title>Changelog • Cuisinella Orgeval</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/app.css">
  <link rel="stylesheet" href="./css/keyframes.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

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
              <a class="nav-link" href="./relance.php">
                <i class="bi bi-briefcase"></i>
                Relance
              </a>
              <a class="nav-link" href="./maps.php">
                <i class="bi bi-compass"></i>
                Plans
              </a>
              <a class="nav-link active" href="./changelog.php">
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
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-6 col-md-12 border-end">
          <h1 class="mb-5 text-center">Intranet</h1>

          <div class="col-12 mb-3">
            <h3 class="current text-1-3">
              Intranet 1.3
            </h3>
            <h6>27/06/2022</h6>
            <hr>
            <ul class="">
              <li class="">Un tout nouveau style fait son apparition ! Adieu Bootstrap et bonjour le style HandMade ! Plus personnalisé et plus de confidentialité avec l'abandon des cookies Bootstrap ! </li>
              <li class="">Intranet 1.3 est 17,97% plus rapide que la version antérieure !</li>
              <li class="">Une optimisation mobile poussé à son paroxysme, des composants mobile-friendly pratique à l'utilisation sur ordinateur ou sur mobile ! (hors Dashboard)</li>
              <li class="">Nouveau système de grilles ! Les grilles est pourcentages sont remplacés par le nouveau système <code>grid</code>, plus polyvalent et plus léger à charger, le système <code>grid</code> est votre nouveau meilleur ami !</li>
              <li class="">Un e-mail de confirmation est désormais envoyé après l'envoi d'une demande de SAV !</li>
              <li class="">Un dashboard spécial vendeurs pour consulter toutes les demandes de SAV et le changelog. Un espace spécial pour les vendeurs avec la possibilité prochaine de faire d'autres choses</li>
              <li class="">La Documentation s'est refaite une beauté ! Une page d'accueil pratique avec toutes les informations sous vos yeux. Des pages aérées et facile à lire compatible avec tous les problèmes d'acuités visuelles.</li>
              <li class="">Accueillez les pages de documentation sur votre appareil, comme un tutoriel pour ajouter des raccourcis sur le Bureau !</li>
              <li class="">Une charte de couleurs définie et un Design System public (bientôt).</li>
              <li class="">Et encore plein d'autres choses ! Les nouveautés de cette Version 1.4 se comptent par dizaines !</li>
            </ul>
          </div>
          <!-- Intranet 1.2 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              Intranet 1.2
            </h3>
            <h6>12/05/2022</h6>
            <hr>
            <ul>
              <li>Dites bonjour aux Cuisinell'Actus ! Simple et rapide, transmettez rapidement des infos aux vendeurs et sont informés par mail de l'arrivée d'une nouvelle Cuisinell'Actu.</li>
              <li>Uniformisation des Entêtes et Pied de page sur toutes les pages !</li>
              <li>Sécurisation par HTTPS des échanges entre les différents fichiers.</li>
              <li>Correction d'un bug qui n'affichait pas le style des pages de documentation.</li>
            </ul>
          </div>
          <!-- Intranet 1.1.1 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              Intranet 1.1.1
            </h3>
            <h6>06/05/2022</h6>
            <hr>
            <ul>
              <li class="">Ajout d'un élément MATOM à la liste "Poseur demandé"</li>
            </ul>
          </div>
          <!-- Intranet 1.1 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              Intranet 1.1
            </h3>
            <h6>5/05/2022</h6>
            <hr>
            <ul>
              <li class="">Nouvelle page d'accueil</li>
              <li>Correction de lien cassés</li>
            </ul>
          </div>
          <!-- Intranet 1.0.1 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              Intranet 1.0.1
            </h3>
            <h6>28/04/2022</h6>
            <hr>
            <ul>
              <li class="">Correction d'un bug affectant l'envoi des données.</li>
            </ul>
          </div>
          <!-- Intranet 1.0 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              Intranet 1.0
            </h3>
            <h6>26/04/2022</h6>
            <hr>
            <ul>
              <li class="list-unstyled">Remplissez le formulaire de planification pour faire votre demande plus simplement.</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <h1 class="mb-5 text-center">Dashboard</h1>
          <div class="col-12 mb-3">
            <h3 class="current">
              <span class="font-idf">IDF 1.3</span>
            </h3>
            <h6>27/06/2022</h6>
            <hr>
            <ul class="-glow">
              <li class="">Une toute nouvelle page d'accueil ! Avec des liens pour consulter toutes les pages ! Ainsi que des widgets météo, heures et plans qui au clic renvoient pour ce dernier à une carte !</li>
              <li class="">Une carte à été ajoutée au Dashboard pour rechercher les positions des SAV propulsé par l'API de chez Mapbox, la carte convrira tous les besoins !</li>
              <li class=""> Le module Absences fait son apparition : </li>
              <li class="">Envoyez une relance au absentéiste pour inciter la personne absente à venir.</li>
              <li class="">Demandez la justification d'une absence à un employé avec dans la page absence, un mail est envoyé et la trace de l'absence y est notée sur un tableau en dessous !</li>
              <li>Pas de redesign pour cette version mais c'est pour bientôt !</li>
            </ul>
          </div>
          <!-- IDF 1.2 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              <span class="font-idf">IDF 1.2</span>
            </h3>
            <h6>12/05/2022</h6>
            <hr>
            <ul>
              <li>Dites bonjour aux Cuisinell'Actus ! Simple et rapide, transmettez rapidement des infos aux vendeurs et sont informés par mail de l'arrivée d'une nouvelle Cuisinell'Actu. <br>Du côté Administrateur, un formulaire simple, vous permet de publier une Cuisinell'Actu d'un clic !</li>
              <li>Sécurisation par HTTPS des échanges entre les différents fichiers.</li>
            </ul>
          </div>
          <!-- IDF 1.1 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              <span class="font-idf">IDF 1.1</span>
            </h3>
            <h6>04/05/2022</h6>
            <hr>
            <ul>
              <li>Formulaire de connexion</li>
              <li>Sécurisation de la connexion au dashboard.</li>
              <li>Quelques changements de styles.</li>
            </ul>
          </div>
          <!-- IDF 1.0 -->
          <div class="col-12 mb-3">
            <h3 class="current">
              <span class="font-idf">IDF 1.0</span>
            </h3>
            <h6>26/04/2022</h6>
            <hr>
            <ul>
              <li class="list-unstyled">Retrouvez dans le dashboard tous les résultats des formulaires ainsi que des accès administrateurs ou encore des modules pour afficher des élements sur l'intranet de Cuisinella Orgeval.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <style>
      .text-1-3 {
        background-image: linear-gradient(45deg, #ff0000, #ffea00);
        background-size: 100%;
        background-repeat: repeat;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        -moz-background-clip: text;
        -moz-text-fill-color: transparent;
      }
    </style>
  </main>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>