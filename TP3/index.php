<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <title>TP n°3</title>
  </head>
  <body>
      <!-- container Bootstrap -->
      <div class="container-fluid">
          <!-- header -->
          <header>
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-3">Partie 10 - TP 3</h1>
                <p class="lead">Faire une fonction qui permet d'afficher les données
                des tableaux donnés. Les afficher tous sur une même page.</p>
              </div>
            </div>
          </header>
          <!-- main -->
          <main>
            <?php
              $portrait1 = array('name'=>'Victor', 'firstname'=>'Hugo', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
              $portrait2 = array('name'=>'Jean', 'firstname'=>'de La Fontaine', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
              $portrait3 = array('name'=>'Pierre', 'firstname'=>'Corneille', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
              $portrait4 = array('name'=>'Jean', 'firstname'=>'Racine', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');
              $portraits = [$portrait1, $portrait2, $portrait3, $portrait4];
              foreach($portraits as $portrait => $infos){
            ?>
              <p class="text-center mt-4"><?= $portraits[$portrait]['name'] . ' ' . $portraits[$portrait]['firstname'] ?></p>
              <div class="d-flex justify-content-center">
                <img width="300" src="<?= $portraits[$portrait]['portrait'] ?>" alt="portrait de <?= $portraits[$portrait]['firstname'] . ' ' .  $portraits[$portrait]['name']?>">
              </div>
            <?php
              }
            ?>
          </main>
          <!-- footer -->
          <footer>

          </footer>
      </div>
      <!-- scripts JQuery, Popper, Angular et Bootstrap-->
      <script src="assets/js/jquery-3.4.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- mon script principal -->
      <script src="assets/js/main.js"></script>
  </body>
</html>