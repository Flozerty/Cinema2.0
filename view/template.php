<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titre ?></title>

  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="index.php?action=listFilms">Films</a></li>
      <li><a href="index.php?action=listActeurs">Acteurs</a></li>
      <li><a href="index.php?action=listRealisateurs">Realisateurs</a></li>
      <li><a href=""></a></li>
    </ul>
  </nav>

  <div id="wrapper">
    <main>
      <div id="contenu">
        <h1>PDO Cinema</h1>
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
      </div>
    </main>
  </div>
</body>

</html>