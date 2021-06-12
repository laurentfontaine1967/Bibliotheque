<?php
//on verifie le post
if (
    
    !empty($_POST['abonne'])
    && !empty($_POST['titre'])
    && !empty($_POST['date_emprunt'])
    && !empty($_POST['date_retour'])
    

    && is_numeric($_POST['abonne'])
    && is_numeric($_POST['titre'])
    
) 
{


//--------------------------
//recherche si id abonne existe
//connexion
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}
$abonne=$_POST['abonne'];
$requete="SELECT id FROM personne WHERE `id` =$abonne ";

//reponse
$reponse = $bdd->query($requete);
if ($reponse === false) {
    echo 'pb de connexion a la bdd';
    die();
}
//lire reponse
$existe=$reponse->fetch_all(MYSQLI_ASSOC);
if ($existe == null) {
    echo "Acun abonne a ce numero";
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
$livre=$_POST['titre'];
$requetes="SELECT id FROM livre WHERE `id` = $livre";

//reponse
$reponses = $bdd->query($requetes);
if ($reponses === false) {
    echo 'pb de connexion a la bdd-verif id livre';
    die();
}
//lire reponse
$existe=$reponses->fetch_all(MYSQLI_ASSOC);
if ($existe == null) {
    echo "Aucun livre a ce numero";
    die();
}
$abonne=$_POST['abonne'];
$livre=$_POST['titre'];
$date_pret=$_POST['date_emprunt'];
$date_retour=$_POST['date_retour'];


$quete= "INSERT INTO `emprunt`
VALUES ( NULL, $abonne,'$livre','$date_pret','$date_retour')";

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
else 
{
    echo 'Erreur de saisie du formulaire.';
    die();
}

