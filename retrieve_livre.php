<?php

//Etape 1 : connexion
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}

//requete
$requete='SELECT 
livre.id,
livre.titre,
livre.isbn,
livre.stock,
livre.date_publication,
auteur.nom AS auteur
FROM livre
JOIN auteur ON livre.auteur_id = auteur.id';



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
    <title>Livres de ma bibliotheque</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                   <a class="navbar-brand" href="#">HOME</a>
                    <!-- <a class="navbar-brand" href="delete_livre.php">modifier</a> -->
                    <a class="navbar-brand" href="create-livre.php">creer un livre</a>
                    <a class="navbar-brand" href="retrieve_emprunt.php">voir les emprunts</a>
                    <a class="navbar-brand" href="create_emprunt.php">creer un emprunt</a>
            </div>
        </nav>

        <h1>LISTE DE MES LIVRES</h1>
        <table class="table table-striped w-75 mx-auto">
            <tr>
                <th>auteur </th>
                <th>titre</th>
                <th>isbn</th>
                <th>stock</th>
                <th>date de publication</th>
            </tr>




            <?php foreach ($liste as $element) { ?>
                <tr>
                    <td class="w-25"><?php echo $element['auteur']; ?></td>
                    <td class="w-25"><?php echo $element['titre']; ?></td>
                    <td class="w-25"><?php echo $element['isbn']; ?></td>
                    <td class="w-25"><?php echo $element['stock']; ?></td>
                    <td class="w-25"><?php echo $element['date_publication']; ?></td>
                    <td><a class="btn btn-danger" href="delete_livre.php?id=<?php echo $element['id']; ?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>