
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                < <a class="navbar-brand" href="#">HOME</a>
                    
                    <a class="navbar-brand" href="delete_livre.php">supprimer</a>
            </div>
        </nav>

        <h1>INSERER UN LIVRE EN BASE DE DONNEE</h1>

        <form action="create-handler.php" method="POST">
            <div class="mb-3">
                <label for="auteur" class="form-label">Idntifiant auteur</label>
                <input type="number" class="form-control" name="auteur_id">
                </div>
                
                <div class="mb-3">
                    <label for="titre" class="form-label">titre du livre</label>
                    <input type="text" class="form-control" name="titre">
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="number" class="form-control" name="isbn">
                </div>

                <div class="mb-3">
                    <label for="titre" class="form-label">stock</label>
                    <input type="number" class="form-control" name="stock">
                </div>

                <div class="mb-3">
                    <label for="titre" class="form-label">date de publication</label>
                    <input type="text" class="form-control" name="date_publication">
                </div>

                <button type="submit" class="btn btn-warning" name="valider">Enregistrer en base</button>
        </form>
    </div>
    </div>
</body>

</html>