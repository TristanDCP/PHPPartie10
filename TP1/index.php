<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="styles.css">
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
        Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?


        A la validation de ces informations, il faudra les afficher dans la même page à la place du formulaire.</p>
    <form method="post" action="">
        <!-- NOM -->
        <div class="fields">
            <label for="name">Nom : </label>
            <input type="text" name="name" id="name" required>
        </div>
        <!-- PRENOM -->
        <div class="fields">
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname" required>
        </div>
        <!-- DATE DE NAISSANCE -->
        <div class="fields">
            <label for="birthdate">Date de naissance : </label>
            <input type="date" name="birthdate" id="birthdate" required>
        </div>
        <!-- NATIONALITE -->
        <div class="fields">
            <label for="nationality">Nationalité: </label>
            <input type="text" name="nationality" id="nationality" required>
        </div>
        <!-- ADRESSE -->
        <div class="fields">
            <label for="adress">Adresse : </label>
            <input type="text" name="adress" id="adress" required>
        </div>
        <!-- EMAIL -->
        <div class="fields">
            <label for="email">E-mail : </label>
            <input type="email" name="email" id="email" required>
        </div>
        <!-- TELEPHONE -->
        <div class="fields">
            <label for="phonenumber">Numéro de téléphone : </label>
            <input type="tel" name="phonenumber" id="phonenumber" required>
        </div>
        <!-- DIPLOME -->
        <div class="fields">
            <label for="degree">Diplômes : </label>
            <select id="degree" required>
                <option>Sans diplômes</option>
                <option>Bac</option>
                <option>Bac +2</option>
                <option>Bac +3</option>
                <option>Bac +4 et supérieur</option>
            </select>
        </div>
        <!-- NUMERO POLE EMPLOI -->
        <div class="fields">
            <label for="poleemploinumber">Numéro Pôle Emploi : </label>
            <input type="text" name="poleemploinumber" id="poleemploinumber" required>
        </div>
        <!-- NOMBRE DE BADGE -->
        <div class="fields">
            <label for="badgeamount">Nombre de badge : </label>
            <input type="text" name="badgeamount" id="badgeamount" required>
        </div>
        <!-- Liens codeacademy -->
        <div class="fields">
            <label for="links">Lien codeacademy : </label>
            <input type="text" name="links" id="links" required>
        </div>
        <!-- SUPER HEROS -->
        <div class="fields">
            <label for="superheroes">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ?</label>
            <textarea id="superheroes" name="superheroes" rows="1" cols="15"></textarea>
        </div>
        <!-- HACK -->
        <div class="fields">
            <label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) </label>
            <textarea id="hack" name="hack" rows="1" cols="15"></textarea>
        </div>
        <!-- EXPERIENCE PROGRAMMATION -->
        <div class="fields">
            <label for="previousexperience">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
            <textarea id="previousexperience" name="previousexperience" rows="1" cols="15"></textarea>
        </div>
<input type="submit" value="Afficher les valeurs">
    </form>
</body>

</html>