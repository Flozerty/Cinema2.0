<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titre ?></title>

  <script src="https://kit.fontawesome.com/7252ea4d54.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
  <header>

    <a href="index.php?action=accueil">
      <figure id="logo-container">
        <img src="public/img/logo.png" alt="logo">
        <figcaption>
          PDO-Cinema
        </figcaption>
      </figure>
    </a>


    <div id="search">
      <input type="search" placeholder="recherchez un film, un acteur, etc.">
    </div>

    <nav>
      <div id="close-button">
        <i class="fa-solid fa-x"></i>
      </div>

      <ul>
        <li><a href="index.php?action=accueil">Accueil</a></li>
        <li><a href="index.php?action=listFilms">Films</a></li>
        <li><a href="index.php?action=listActeurs">Acteurs</a></li>
        <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
        <li><a href="index.php?action=listGenres">Genres</a></li>
      </ul>
    </nav>

    <div id="toggle-menu">
      <i class="fa-solid fa-bars"></i>
    </div>


    <a href="#" id="connect-button">
      connexion
    </a>

  </header>

  <div id="wrapper">
    <main>
      <div id="contenu">
        <h1>PDO-Cinema</h1>
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
      </div>
    </main>
  </div>

  <footer>

  </footer>

  <script src="public/js/menuBurger.js"></script>
</body>

</html>