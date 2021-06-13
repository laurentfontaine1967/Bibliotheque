<?php

//Etape 1 : connexion
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}

//requete

$requete ='SELECT 
personne.nom AS emprunteur,
personne.prenom AS prenom,
role.nom AS son_role,
livre.titre AS livre, 
auteur.nom AS auteur_nom,
auteur.prenom AS auteur_prenom,
emprunt.id AS id
 FROM emprunt
 JOIN personne ON emprunt.abonne=personne.id
 JOIN livre ON livre.id =emprunt.livre
 JOIN auteur ON livre.auteur_id=auteur.id
 JOIN role ON personne.role_id=role.id';


$reponse = $bdd->query($requete);
if ($reponse === false) {
    echo 'Problème lors de la requête.';
    die();
}

//reponse
$liste = $reponse->fetch_all(MYSQLI_ASSOC);
?>


<!-- HTML pour affichage -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des emprunts</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                < <a class="navbar-brand" href="#">HOME</a>
                   
                   <a class="navbar-brand" href="create_emprunt.php">CREER UN ENPRUNT</a> -->
            </div>
        </nav>

        <h1>LISTE DES EMPRUNTS</h1>
        <table class="table table-striped w-75 mx-auto">
            <tr>
                <th>nom de l'emprunteur</th>
                <th>prenom de l'emprunteur</th>
                <th>role de l'emprunteur</th>
                <th>livre emprunte</th>
                <th>nom de l'auteur</th>
                <th>prenom de l'auteur</th>
            </tr>

            <?php foreach ($liste as $element) { ?>
                <tr>
                    <td class="w-25"><?php echo $element['emprunteur']; ?></td>
                    <td class="w-25"><?php echo $element['prenom']; ?></td>
                    <td class="w-25"><?php echo $element['son_role']; ?></td>
                    <td class="w-25"><?php echo $element['livre']; ?></td>
                    <td class="w-25"><?php echo $element['auteur_nom']; ?></td>
                    <td class="w-25"><?php echo $element['auteur_prenom']; ?></td>
                    <td><a class="btn btn-danger" href="delete_emprunt.php?id=<?php echo $element['id'];?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>