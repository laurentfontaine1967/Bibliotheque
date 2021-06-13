<?php
//abonne
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}

$requete= 'SELECT
 id,
 nom,
 prenom
 FROM personne ';
$reponse = $bdd->query($requete);
if ($reponse === false){
    echo"pb de traitement de la requete(recherche abonne)";
    die();
}
$abonne= $reponse->fetch_all(MYSQLI_ASSOC);
// echo'<pre>';
// var_dump ($abonne);
// echo'</pre>';

//livre
$bdd = new mysqli('localhost', 'root', '', 'bibliotheque');
if ($bdd->connect_errno != 0) {
    echo 'Impossible de se connecter à la BDD.';
    die();
}
$requet= 'SELECT
livre.id,
livre.titre,
auteur.nom,
auteur.prenom
FROM livre  LEFT JOIN auteur ON livre.id=auteur.id';


$repons = $bdd->query($requet);
if ($repons === false) {
    echo"pb de traitement de la requete(retrieve livre)";
    die();
}

$livre=$repons->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creer emprunt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                < <a class="navbar-brand" href="#">HOME</a>
                    
                    <a class="navbar-brand" href="delete_emprunt.php">supprimer un emprunt</a>
                   
            </div>
            </div>
        </nav>

        <h1>EMPRUNTER UN LIVRE</h1>

        <form action="create_handler_emprunts.php" method="POST">
           
        <div class="mb-3">
           
                <label for="abonne" class="form-label">abonne</label>
                <select name="abonne" >
                <?php foreach($abonne as $a)
                 { ?>
                 <option value="<?php echo $a['id']?>"><?php echo$a['nom'],"-" , $a['prenom']?></option>               
                <?php
                } 
                ?>
                 </select>
                </div>
                
                <div class="mb-3">
                <label for="livre" class="form-label">livre</label>
                <select name="livre" >
                <?php foreach($livre as $b)
                 { ?>
                 <option value="<?php echo $b['id']?>"><?php echo$b['titre'],"",' --Ecrit par--',$b['prenom']," ",$b['nom'] ?></option>               
                <?php
                } 
                ?>
                 </select>
                </div>

                <div class="mb-3">
          
                    <label for="date_emprunt" class="form-label">date emprunt</label>
                    <input type="date" class="form-control" name="date_emprunt">
                </div>

                <div class="mb-3">
                    <label for="date_retour" class="form-label">date de retour</label>
                    <input type="date" class="form-control" name="date_retour">
                </div>

                <button type="submit" class="btn btn-warning" name="valider">Enregistrer en base</button>
        </form>
    </div>
    </div>
</body>

</html>