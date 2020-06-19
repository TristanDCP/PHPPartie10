<?php
$firstNameRegex = "/[a-zA-Zéèêëiîïôöüäç]{2,12}[-]?[a-zA-Zéèêëiîïôöüäç]{2,12}/";
$lastNameRegex = "/[a-zA-Zéèêëiîïôöüäç ]{1,15}[- \"]{0,1}[a-zA-Zéèêëiîïôöüäç ]{0,18}[- \"]{0,1}[a-zA-Zéèêëiîïôöüäç ]{1,10}/";
$addressRegex = "/^[1-9]{1}+[0-9]{0,2}[, ]{1}[ a-zA-Zéèêëiîïôöüäç]{1,11}[, \"-]{1}?[ a-zA-Zéèêëiîïôöüäç]{2,12}?[, \"-]{0,1}?[ a-zA-Zéèêëiîïôöüäç]{0,12}?[, \"-]{0,1}?[ a-zA-Zéèêëiîïôöüäç]{1,12}?$/";
$phoneRegex = "/(0)+[0-9]{1}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}/";
$dateRegex = "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/"; 
$mailRegex = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$urlRegex = "/https?:\/\/(www\.)?(codecademy)\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/";
$poleEmploiRegex = "/[0-9]{7}[a-zA-Z]{1}/"; 
$badgesRegex ="/[0-9]{1}+[0]?/";
$degreeRegex = "/[1-4]{1}/";    
// VARIABLES
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lastName = $_POST['lastname'];
    $firstName = $_POST['firstname'];
    $birthDate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];
    $adress = $_POST['adress'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $degree = $_POST['degree'];
    $poleEmploi = $_POST['poleemploinumber'];
    $badges = $_POST['badgeamount'];
    $codecademyLinks = $_POST['links'];
    $superhero = $_POST['superheroes'];
    $hack = $_POST['hack'];
    $experience = $_POST['previousexperience'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>TP1 PHP</title>
</head>

<body>

    <h1>Exercice 1 Partie 10</h1>
    <p>Faire une page pour enregistrer un futur apprenant. On devra pouvoir saisir les informations suivantes :

        Nom
        Prénom
        Date de naissance
        Pays de naissance
        Nationalité
        Adresse
        E-mail
        Téléphone
        Diplôme (sans, Bac, Bac+2, Bac+3 ou supérieur)
        Numéro pôle emploi
        Nombre de badge
        Liens codecademy
        Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ?
        Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)
        Avez vous déjà eu une expérience avec la programmation et/ou l"informatique avant de remplir ce formulaire ?


        A la validation de ces informations, il faudra les afficher dans la même page à la place du formulaire.</p>
    <div class="container">
        <div class="form-group">
            <form method="post" action="index.php" novalidate>
                <!-- NOM -->
                <div class="textfields">
                    <label for="name">Nom : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($lastNameRegex, $lastName) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
                <!-- PRENOM -->
                <div class="textfields">
                    <label for="firstname">Prénom : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($firstNameRegex, $firstName) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <!-- DATE DE NAISSANCE -->
                <div class="birthfields">
                    <label for="birthdate">Date de naissance : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($dateRegex, $birthDate) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="date" name="birthdate" id="birthdate" required>
                </div>
                <!-- NATIONALITE -->
                <div class="textfields">
                    <label for="nationality">Nationalité: </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($lastNameRegex, $nationality) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="nationality" id="nationality" required>
                </div>
                <!-- ADRESSE -->
                <div class="adressfields">
                    <label for="adress">Adresse : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($addressRegex, $adress) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="adress" id="adress" required>
                </div>
                <!-- EMAIL -->
                <div class="mailfields">
                    <label for="email">E-mail : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($mailRegex, $email) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="email" name="email" id="email" required>
                </div>
                <!-- TELEPHONE -->
                <div class="phonefields">
                    <label for="phonenumber">Numéro de téléphone : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($phoneRegex, $phoneNumber) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="tel" name="phonenumber" id="phonenumber" required>
                </div>
                <!-- DIPLOME -->
                <div class="fields">
                    <label for="degree">Diplômes : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($degreeRegex, $degree) == false) ? 'Champ invalide !' : '' ;?></span>
                    <select name="degree" id="degree" required>
                        <option selected>--Choississez un diplôme--</option>
                        <option value="1">Sans diplômes</option>
                        <option value="2">Bac</option>
                        <option value="3">Bac +2</option>
                        <option value="4">Bac +3 et supérieur</option>

                    </select>
                </div>
                <!-- NUMERO POLE EMPLOI -->
                <div class="poleemploifields">
                    <label for="poleemploinumber">Numéro Pôle Emploi : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($poleEmploiRegex, $poleEmploi) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="poleemploinumber" id="poleemploinumber" required>
                </div>
                <!-- NOMBRE DE BADGE -->
                <div class="numberfields">
                    <label for="badgeamount">Nombre de badge : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($badgesRegex, $badges) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="badgeamount" id="badgeamount" required>
                </div>
                <!-- Liens codeacademy -->
                <div class="academyfields">
                    <label for="links">Lien codeacademy : </label><span
                        class="errormessage"><?= !empty($_POST) && (preg_match($urlRegex, $codecademyLinks) == false) ? 'Champ invalide !' : '' ;?></span>
                    <input type="text" name="links" id="links" required>
                </div>
                <!-- SUPER HEROS -->
                <div class="textareafields">
                    <label for="superheroes">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi
                        ?</label>
                    <textarea id="superheroes" name="superheroes" rows="1" cols="15"
                        placeholder="Votre super héros favori?" required></textarea>
                </div>
                <!-- HACK -->
                <div class="textareafields">
                    <label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label>
                    <textarea id="hack" name="hack" rows="1" cols="15" placeholder="Racontez votre hack"
                        required></textarea>
                </div>
                <!-- EXPERIENCE PROGRAMMATION -->
                <div class="textareafields">
                    <label for="previousexperience">Avez vous déjà eu une expérience avec la programmation et/ou
                        l"informatique avant de remplir ce formulaire ?</label>
                    <textarea id="previousexperience" name="previousexperience" rows="1" cols="15"
                        placeholder="Insérer votre expérience" required></textarea>
                </div>
                <input type="submit" value="Afficher les valeurs">
        </div>
    </div>

    <?php
if(preg_match($lastNameRegex, $lastName) && preg_match($firstNameRegex, $firstName) &&  preg_match($dateRegex, $birthDate) && preg_match($lastNameRegex, $nationality) && preg_match($addressRegex, $adress) && preg_match($mailRegex, $email) && preg_match($phoneRegex, $phoneNumber) && preg_match($degreeRegex, $degree) && preg_match($poleEmploiRegex, $poleEmploi) && preg_match($badgesRegex, $badges) && preg_match($urlRegex, $codecademyLinks)){
 ?>
    <p><?= $lastName ?></p>
    <p><?= $firstName ?></p>
    <p><?= $birthDate ?></p>
    <p><?= $nationality ?></p>
    <p><?= $adress ?></p>
    <p><?= $email ?></p>
    <p><?= $phoneNumber ?></p>
    <p><?= $degree ?></p>
    <p><?= $poleEmploi ?></p>
    <p><?= $badges ?></p>
    <p><?= $codecademyLinks ?></p>
    <p><?= $superhero ?></p>
    <p><?= $hack ?></p>
    <p><?= $experience ?></p>
    <?php } else {
    echo "";
}
    ?>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>