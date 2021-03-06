<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- SEO -->
  <meta name="title" content="Mon titre">
  <meta name="description" content="Une chouette description">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <!-- CSS Optional Bootstrap -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  <!-- CSS JQuery UI-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
  <!-- mon CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>Mon titre</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Toutes les sessions <span class="sr-only">(current)</span></a>
      </li>

      <?php if(isset($_SESSION['role'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="list.php">Tous les etudiants</a>
          </li>
          <?php if($_SESSION['role']=='admin'): ?>
              </li>
                <a class="nav-link" href="add.php">Ajout d'un etudiant</a>
              </li>
          <?php endif; ?>
          </li>
            <a class="nav-link" href="upload.php">Upload CSV</a>
          </li>
      <?php endif; ?>


      <?php if(isset($_SESSION['id'])) : ?>
          <li class="nav-item">
              <form action="index.php" method="post">
                  <input type="submit" class="nav-link btn-primary" name="disconnect" value="Deconnexion">
              </form>
          </li>
          </li>
            <span class ="nav-link">Votre Id : <?= $_SESSION['id'] ?></span>
          </li>
      <?php else : ?>
          </li>
            <a class="nav-link" href="signup.php">Inscription</a>
          </li>
          </li>
            <a class="nav-link btn-primary" href="signin.php">Connexion</a>
          </li>

      <?php endif; ?>


    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>

</html>
