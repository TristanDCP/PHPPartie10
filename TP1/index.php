<?php
$firstNameRegex = "/[a-zA-Zéèêëiîïôöüäç]{2,12}[-]?[a-zA-Zéèêëiîïôöüäç]{2,12}/";
$lastNameRegex = "/[a-zA-Zéèêëiîïôöüäç ]{1,15}[- \"]{0,1}[a-zA-Zéèêëiîïôöüäç ]{0,18}[- \"]{0,1}[a-zA-Zéèêëiîïôöüäç ]{1,10}/";
$addressRegex = "/^[1-9]{1}+[0-9]{0,2}[, ]{1}[ a-zA-Zéèêëiîïôöüäç]{1,11}[, \"-]{1}?[ a-zA-Zéèêëiîïôöüäç]{2,12}?[, \"-]{0,1}?[ a-zA-Zéèêëiîïôöüäç]{0,12}?[, \"-]{0,1}?[ a-zA-Zéèêëiîïôöüäç]{1,12}?$/";
$phoneRegex = "/(0)+[0-9]{1}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}/";
$dateRegex = "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/";
$mailRegex = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$urlRegex = "/https?:\/\/(www\.)?(codecademy)\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/";
$poleEmploiRegex = "/[0-9]{7}[a-zA-Z]{1}/";
$badgesRegex = "/[0-9]{1}+[0]?/";
$degreeRegex = "/[1-4]{1}/";
// VARIABLES
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastName = $_POST["lastname"];
    $firstName = $_POST["firstname"];
    $birthDate = $_POST["birthdate"];
    $nationality = $_POST["nationality"];
    $adress = $_POST["adress"];
    $email = $_POST["email"];
    $filtermail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $phoneNumber = $_POST["phonenumber"];
    $degree = $_POST["degree"];
    $poleEmploi = $_POST["poleemploinumber"];
    $badges = $_POST["badgeamount"];
    $codecademyLinks = $_POST["links"];
    $superhero = $_POST["superheroes"];
    $hack = $_POST["hack"];
    $experience = $_POST['experienceQuestion'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>TP1 PHP</title>
</head>

<body>

    <h1>Exercice 1 Partie 10</h1>
    <p class="exercice">Faire une page pour enregistrer un futur apprenant. On devra pouvoir saisir les informations
        suivantes :

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


    <?php
    if (isset($_POST['lastname']) && preg_match($lastNameRegex, $lastName) && preg_match($firstNameRegex, $firstName) &&  preg_match($dateRegex, $birthDate) && preg_match($lastNameRegex, $nationality) && preg_match($addressRegex, $adress) && ($filtermail == true) && preg_match($phoneRegex, $phoneNumber) && preg_match($degreeRegex, $degree) && preg_match($poleEmploiRegex, $poleEmploi) && preg_match($badgesRegex, $badges) && preg_match($urlRegex, $codecademyLinks) && isset($experience)) {
    ?>
    <p><?= "Votre nom : " . $lastName ?></p>
    <p><?= "Votre prénom : " . $firstName ?></p>
    <p><?= "Votre date de naissance : " . $birthDate ?></p>
    <p><?= "Votre nationalité : " . $nationality ?></p>
    <p><?= "Votre adresse : " . $adress ?></p>
    <p><?= "Votre adresse email : " .$email ?></p>
    <p><?= "Votre numéro de téléphone : " . $phoneNumber ?></p>
    <p><?= "Votre diplôme : " . $degree ?></p>
    <p><?= "Votre numéro Pôle Emploi : " .  $poleEmploi ?></p>
    <p><?= "Votre nombre de badges : " . $badges ?></p>
    <p><?= "Votre lien codeacademy : " . $codecademyLinks ?></p>
    <p><?= "Votre description de super héros : " . $superhero ?></p>
    <p><?= "Votre hack personnel : " . $hack ?></p>
    <p><?= "Votre expérience passée : " . $experience ?></p>
    <?php } else {
        ?>
    <div class="container">
        <div class="form-group rounded pl-2">
            <form method="post" action="index.php" novalidate>
                <!-- NOM -->
                <div class="textfields">
                    <label for="name">Nom : </label><span
                        class="errormessage"><?= isset($_POST['lastname']) ? (empty($_POST['lastname']) ? 'Veuillez remplir ce champ' : (preg_match($lastNameRegex, $lastName) == false ?  "Veuillez indiquer un nom valide" : "")) : "" ?></span>
                    <input type="text" name="lastname" id="lastname"
                        value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                </div>
                <!-- PRENOM -->
                <div class="textfields">
                    <label for="firstname">Prénom : </label><span
                        class="errormessage"><?= isset($_POST['firstname']) ? (empty($_POST['firstname']) ? 'Veuillez remplir ce champ' : (preg_match($firstNameRegex, $firstName) == false ?  "Veuillez indiquer un prénom correct" : "")) : "" ?></span>
                    <input type="text" name="firstname" id="firstname"
                        value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
                </div>
                <!-- DATE DE NAISSANCE -->
                <div class="birthfields">
                    <label for="birthdate">Date de naissance : </label><span
                        class="errormessage"><?= isset($_POST['birthdate']) ? (empty($_POST['birthdate']) ? 'Veuillez remplir ce champ' : (preg_match($dateRegex, $birthDate) == false ?  "Veuillez indiquer une date de naissance valide" : "")) : "" ?></span>
                    <input type="date" name="birthdate" id="birthdate"
                        value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>" required>
                </div>
                <!-- NATIONALITE -->
                <div class="textfields">
                    <label for="nationality">Nationalité: </label><span
                        class="errormessage"><?= isset($_POST['nationality']) ? (empty($_POST['nationality']) ? 'Veuillez remplir ce champ' : (preg_match($lastNameRegex, $nationality) == false ?  "Veuillez indiquer une nationalité valide" : "")) : "" ?></span>
                    <input type="text" name="nationality" id="nationality"
                        value="<?= isset($_POST['nationality']) ? $_POST['nationality'] : '' ?>" required>
                </div>
                <!-- ADRESSE -->
                <div class="adressfields">
                    <label for="adress">Adresse : </label><span
                        class="errormessage"><?= isset($_POST['adress']) ? (empty($_POST['adress']) ? 'Veuillez remplir ce champ' : (preg_match($addressRegex, $adress) == false ?  "Veuillez indiquer une adresse valide" : "")) : "" ?></span>
                    <input type="text" name="adress" id="adress"
                        value="<?= isset($_POST['adress']) ? $_POST['adress'] : '' ?>" required>
                </div>
                <!-- EMAIL -->
                <div class="mailfields">
                    <label for="email">E-mail : </label><span
                        class="errormessage"><?= isset($_POST['email']) ? (empty($_POST['email']) ? 'Veuillez remplir ce champ' : $filtermail == false ?  "Veuillez indiquer une adresse email correcte" : "") : "" ?></span>
                    <input type="email" name="email" id="email"
                        value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                </div>
                <!-- TELEPHONE -->
                <div class="phonefields">
                    <label for="phonenumber">Numéro de téléphone : </label><span
                        class="errormessage"><?= isset($_POST['phonenumber']) ? (empty($_POST['phonenumber']) ? 'Veuillez remplir ce champ' : (preg_match($phoneRegex, $phoneNumber) == false ?  "Veuillez indiquer un numéro de téléphone valide" : "")) : "" ?></span>
                    <input type="tel" name="phonenumber" id="phonenumber"
                        value="<?= isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '' ?>" required>
                </div>
                <!-- DIPLOME -->
                <div class="fields">
                    <label for="degree">Diplômes : </label><span
                        class="errormessage"><?= isset($_POST['degree']) ? (empty($_POST['degree']) ? 'Veuillez remplir ce champ' : (preg_match($degreeRegex, $degree) == false ?  "Veuillez indiquer un diplôme valide" : "")) : "" ?></span>
                    <select name="degree" id="degree" required>
                        <option selected>--Choississez un diplôme--</option>
                        <option value="1"
                            <?= (isset($_POST['degree']) && $_POST['degree'] === '1') ? 'selected' : ''; ?>>Sans
                            diplômes</option>
                        <option value="2"
                            <?= (isset($_POST['degree']) && $_POST['degree'] === '2') ? 'selected' : ''; ?>>Bac</option>
                        <option value="3"
                            <?= (isset($_POST['degree']) && $_POST['degree'] === '3') ? 'selected' : ''; ?>>Bac +2
                        </option>
                        <option value="4"
                            <?= (isset($_POST['degree']) && $_POST['degree'] === '4') ? 'selected' : ''; ?>>Bac +3 et
                            supérieur</option>

                    </select>
                </div>
                <!-- NUMERO POLE EMPLOI -->
                <div class="poleemploifields">
                    <label for="poleemploinumber">Numéro Pôle Emploi : </label><span
                        class="errormessage"><?= isset($_POST['poleemploinumber']) ? (empty($_POST['poleemploinumber']) ? 'Veuillez remplir ce champ' : (preg_match($poleEmploiRegex, $poleEmploi) == false ?  "Veuillez indiquer un numéro de Pôle Emploi valide" : "")) : "" ?></span>
                    <input type="text" name="poleemploinumber" id="poleemploinumber"
                        value="<?= isset($_POST['poleemploinumber']) ? $_POST['poleemploinumber'] : '' ?>" required>
                </div>
                <!-- NOMBRE DE BADGE -->
                <div class="numberfields">
                    <label for="badgeamount">Nombre de badge : </label><span
                        class="errormessage"><?= isset($_POST['badgeamount']) ? (empty($_POST['badgeamount']) ? 'Veuillez remplir ce champ' : (preg_match($badgesRegex, $badges) == false ?  "Veuillez indiquer un nombre de badge valide" : "")) : "" ?></span>
                    <input type="text" name="badgeamount" id="badgeamount"
                        value="<?= isset($_POST['badgeamount']) ? $_POST['badgeamount'] : '' ?>" required>
                </div>
                <!-- Liens codeacademy -->
                <div class="academyfields">
                    <label for="links">Lien codeacademy : </label><span
                        class="errormessage"><?= isset($_POST['links']) ? (empty($_POST['links']) ? 'Veuillez remplir ce champ' : (preg_match($urlRegex, $codecademyLinks) == false ?  "Veuillez indiquer un lien codeacademy valide" : "")) : "" ?></span>
                    <input type="text" name="links" id="links"
                        value="<?= isset($_POST['links']) ? $_POST['links'] : '' ?>" required>
                </div>
                <!-- SUPER HEROS -->
                <div class="textareafields">
                    <label for="superheroes">Si vous étiez un super héros/une super héroïne, qui seriez-vous et
                        pourquoi?</label><span
                        class="errormessage"><?= isset($_POST['superheroes']) ? (empty($_POST['superheroes']) ? 'Veuillez remplir ce champ' : "") : "" ; ?></span>
                    <textarea id="superheroes" name="superheroes" rows="1" cols="15"
                        placeholder="Votre super héros favori?"
                        required><?= isset($_POST['superheroes']) ? $_POST['superheroes'] : '' ?></textarea>
                </div>
                <!-- HACK -->
                <div class="textareafields">
                    <label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou
                        informatique)</label><span
                        class="errormessage"><?= isset($_POST['hack']) ? (empty($_POST['hack']) ? 'Veuillez remplir ce champ' : "") : "" ; ?></span>
                    <textarea id="hack" name="hack" rows="1" cols="15" placeholder="Racontez votre hack"
                        required><?= isset($_POST['hack']) ? $_POST['hack'] : '' ?></textarea>
                </div>
                <!-- EXPERIENCE PROGRAMMATION -->
                <div class="textareafields">
                    <label for="previousexperience">Avez vous déjà eu une expérience avec la programmation et/ou
                        l"informatique avant de remplir ce formulaire ?</label>
                    <div>
                        <input type="radio" name ="experienceQuestion" value ="Oui" <?= (isset($_POST['experienceQuestion']) && $_POST['experienceQuestion'] === 'Oui') ? 'checked' : ''; ?>><label for="Oui">Oui</label>
                    </div>

                    <div>
                        <input type="radio" name ="experienceQuestion" value ="Non" <?= (isset($_POST['experienceQuestion']) && $_POST['experienceQuestion'] === 'Non') ? 'checked' : ''; ?>><label for="Non">Non</label>
                    </div>
                </div>
                <input type="submit" value="Afficher les valeurs" class="button">
        </div>
    </div>
    <?php
    }
    ?>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
