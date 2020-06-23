<?php
$genderRegex = '/Monsieur|Madame/';
$firstNameRegex = '/[a-zA-Zéèêëiîïôöüäç]{2,12}[-]?[a-zA-Zéèêëiîïôöüäç]{2,12}/';
$lastNameRegex = '/[a-zA-Zéèêëiîïôöüäç ]{1,15}[- \']{0,1}[a-zA-Zéèêëiîïôöüäç ]{0,18}[- \']{0,1}[a-zA-Zéèêëiîïôöüäç ]{1,10}/';
$societyRegex = '/[a-zA-ZéèêëiîïôöüäçàÉÈÀÊÔÎÛÂÙ ]{1,15}[- \']?[a-zA-ZéèêëiîïôöüäçÉÈÀÊÔÎÛÂÙ ]{1,18}[- \']?[a-zA-ZéèêëiîïôöüäçÉÈÀÊÔÎÛÂÙ ]{0,18}[- \']?[a-zA-ZéèêëiîïôöüäçÉÈÀÊÔÎÛÂÙ ]{1,18}/';
$ageRegex = '/[0-9]{1}+[0-9]{1}/';
// VARIABLES
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastName = $_POST["lastname"];
    $firstName = $_POST["firstname"];
    $age = $_POST["age"];
    $gender = $_POST['gender'];
    $society = $_POST['society'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>TP2 PHP</title>
</head>

<body>

    <h1>Exercice 2 Partie 10</h1>
    <p class="exercice">Faire une page permettant de saisir les informations suivantes :

Civilité (liste déroulante)
Nom
Prénom
Age
Société


A la validation, les données saisies devront aparaitre sous le formulaire. Attention les données devront rester dans les différents éléments du formulaire même après la validation.</p>

<div class="container">
        <div class="form-group rounded pl-2">
            <form method="post" action="index.php" novalidate>
                <!-- NOM -->
                <div class="textfields">
                    <label for="name">Nom : </label><span class="errormessage"><?= isset($_POST['lastname']) ? (empty($_POST['lastname']) ? 'Veuillez remplir ce champ' : (preg_match($lastNameRegex, $lastName) == false ?  "Veuillez indiquer un nom valide" : "")) : "" ?></span>
                    <input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                </div>
                <!-- PRENOM -->
                <div class="textfields">
                    <label for="firstname">Prénom : </label><span class="errormessage"><?= isset($_POST['firstname']) ? (empty($_POST['firstname']) ? 'Veuillez remplir ce champ' : (preg_match($firstNameRegex, $firstName) == false ?  "Veuillez indiquer un prénom correct" : "")) : "" ?></span>
                    <input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
                </div>
                <!-- AGE -->
                <div class="textfields">
                    <label for="age">Age: </label><span class="errormessage"><?= isset($_POST['age']) ? (empty($_POST['age']) ? 'Veuillez remplir ce champ' : (preg_match($ageRegex, $age) == false ?  "Veuillez indiquer un age valide" : "")) : "" ?></span>
                    <input type="text" name="age" id="age" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>" required>
                </div>
            
                <!-- CIVILITE -->
                <div class="fields">
                    <label for="gender">Civilité : </label><span class="errormessage"><?= isset($_POST['gender']) ? (empty($_POST['gender']) ? 'Veuillez remplir ce champ' : (preg_match($genderRegex, $gender) == false ? "Veuillez indiquer un genre valide" : "")) : "" ?></span>
                    <select name="gender" id="gender"  required>
                        <option selected>--Indiquez votre civilité : --</option>
                        <option value="Monsieur" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Monsieur') ? 'selected' : ''; ?>>Monsieur</option>
                        <option value="Madame" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Madame') ? 'selected' : ''; ?>>Madame</option>
                    </select>
                </div>

                <!-- SOCIETE -->
                <div class="textfields">
                    <label for="society">Société  : </label><span class="errormessage"><?= isset($_POST['society']) ? (empty($_POST['society']) ? 'Veuillez remplir ce champ' : (preg_match($lastNameRegex, $society) == false ?  "Veuillez indiquer un nom valide" : "")) : "" ?></span>
                    <input type="text" name="society" id="society" value="<?= isset($_POST['society']) ? $_POST['society'] : '' ?>" required>
                </div>
                <input type="submit" value="Afficher les valeurs" class="button">
        </div>
    </div>
    <?php
    if (isset($lastName) && preg_match($lastNameRegex, $lastName) && preg_match($firstNameRegex, $firstName) && preg_match($ageRegex, $age) && preg_match($genderRegex, $gender) && preg_match($societyRegex, $society)){
    ?>
        <p><?= "Votre nom : " . $lastName ?></p>
        <p><?= "Votre prénom : " . $firstName ?></p>
        <p><?= "Votre civilité : " . $gender ?></p>
        <p><?= "Votre âge : " . $age ?></p>
        <p><?= "Votre société: " . $society ?></p>
 
    <?php } else {
        
        echo "Remplissez les infos correctement";?>
    <?php
    }
    ?>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>