<?php
//on verifie le post
if (
    
    !empty($_POST['abonne'])
    && !empty($_POST['titre'])
    && !empty($_POST['date_emprunt'])
    && !empty($_POST['date_retour'])
    

    && is_numeric($_POST['abonne'])
    && is_numeric($_POST['titre'])
    
) {


//--------------------------
//recherche si id abonne existe
//connexion
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}
$requete='SELECT id FROM personne WHERE `id` = '.$_POST['abonne'];

//reponse
$reponse = $bdd->query($requete);
if ($reponse === false) {
    echo 'abonne inconnu dans la base.';
    die();
}
//--------------------
//recherche si id livre existe
//connexion
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}
$requetes='SELECT id FROM livre WHERE `id` = '.$_POST['livre'];
//reponse
$reponses = $bdd->query($requete);
if ($reponses === false) {
    echo 'Livre inconnu dans la base.';
    die();
}

$abonne=$_POST['abonne'];
$livre=$_POST['livre'];
$date_pret=$_POST['date_emprunt'];
$date_retour=$_POST['date_retour'];


$quete= "INSERT INTO `emprunt`
VALUES ( NULL, $abonne,'$livre','$date_emprunt,'$date_retour')";

// connexion
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
echo 'Impossible de se connecter à la BDD.';
die();
} 
//reponse
$reponse = $bdd->query($quete);
    if ($reponse === false) {
        echo 'Problème pendant l\'insertion.';
        die();
    } else {
        // L'insertion a réussi
        // On redirige
        header('location: retrieve_emprunt.php');
    }
}
else {
    echo 'Erreur de saisie du formulaire.';
    die();
}

