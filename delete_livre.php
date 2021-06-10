<?php

// On veut un id dans l'URL ($_GET['id'])
if (empty($_GET['id'])) {
    echo 'Mauvais id.';
    die();
}

$requete = 'DELETE FROM `livre` WHERE `id` = ' . $_GET['id'];


 //Etape 1 : Connexion
 $bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
 if ($bdd->connect_errno != 0) {
     echo 'Impossible de se connecter à la BDD.';
     die();
 }


// Etape 2 : Envoyer la requête
$reponse = $bdd->query($requete);

if ($reponse === false) {
    echo 'Il y a eu un souci pendant la requête.';
    die();
}

header('location: retrieve_emprunt.php');