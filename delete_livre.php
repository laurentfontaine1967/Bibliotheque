<?php

// On veut un id dans l'URL ($_GET['id'])
if (empty($_GET['id'])) {
    echo 'Mauvais id.';
    die();
}

//verifier si le livre est dans la table des prets
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}
$idemprunt=$_GET['id'];
$quete= "SELECT id from emprunt WHERE id=$idemprunt";
$rep = $bdd->query($quete);
if ($rep !== null) {
    echo " Le livre est en pret . Ne pas le supprimer";
    die();
}

 //Etape 1 : Connexion
 $idlivre=$_GET['id'];
 $bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
 if ($bdd->connect_errno != 0) {
     echo 'Impossible de se connecter à la BDD.';
     die();
 }

// Etape 2 : Envoyer la requête
$requete = "DELETE FROM `livre` WHERE `id` = $idlivre";
$reponse = $bdd->query($requete);

if ($reponse === false) {
    echo 'Il y a eu un souci pendant la requête.';
    die();
}

header('location: retrieve_livre.php');