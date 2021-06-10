<?php
var_dump($_POST);
// verifier si id_auteur existe
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}

// //requete
//dans le select on prea-ffiche l'auteur
  $requete='SELECT auteur_id FROM livre WHERE `auteur_id` = '.$_POST['auteur_id'];

//reponse
$reponse = $bdd->query($requete);
if ($reponse === false) {
    echo 'Identifiant auteur non existant dans la base.';
    die();
}
 
// On vérifie le contenu du formulaire
if (
    
    !empty($_POST['titre'])
    && !empty($_POST['isbn'])
    && !empty($_POST['stock'])
    && !empty($_POST['date_publication'])
    && !empty($_POST['auteur_id'])

    && is_numeric($_POST['isbn'])
    && is_numeric($_POST['stock'])
    

) {
     
      $titre=$_POST['titre'];
      $auteur_id=$_POST['auteur_id'];
      $isbn=$_POST['isbn'];
      $stock=$_POST['stock'];
      $datepublication=$_POST['date_publication'];
      
      $requete= "INSERT INTO `livre`
      VALUES ( NULL, $auteur_id,'$titre',$isbn,$stock,'$datepublication')";

    //Etape 1 : connexion
    $bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
    if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
    } 
    
     //Etape 2 : Envoyer la requête

    $reponse = $bdd->query($requete);
    if ($reponse === false) {
        echo 'Problème pendant l\'insertion.';
        die();
    } else {
        // L'insertion a réussi
        // On redirige
        header('location: retrieve_livre.php');
    }
} else {
    echo 'Erreur de saisie du formulaire.';
    die();
}
