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

    <figure id="logo-container">
      <img src="public/img/logo.png" alt="logo">
      <figcaption>
        PDO-Cinema
      </figcaption>
    </figure>

    <div id="search">
      <input type="search" placeholder="recherchez un film, un acteur, etc.">
    </div>

    <nav>
      <i class="fa-solid fa-bars"></i>
      <ul>
        <i class="fa-solid fa-x"></i>
        <li><a href="index.php?action=accueil">Accueil</a></li>
        <li><a href="index.php?action=listFilms">Films</a></li>
        <li><a href="index.php?action=listActeurs">Acteurs</a></li>
        <li><a href="index.php?action=listRealisateurs">Realisateurs</a></li>
        <li><a href=""></a></li>
      </ul>
    </nav>

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
</body>

</html>