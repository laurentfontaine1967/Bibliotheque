
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
                    
                    <a class="navbar-brand" href="create_livre.php">supprimer</a>
            </div>
        </nav>

        <h1>EMPRUNTER UN LIVRE</h1>

        <form action="create-handler.php" method="POST">
            <div class="mb-3">
                <label for="abonne" class="form-label">abonne</label>
                <input type="number" class="form-control" name="abonne">
                </div>
                
                <div class="mb-3">
                    <label for="livre" class="form-label">livre</label>
                    <input type="number" class="form-control" name="titre">
                </div>

                <div class="mb-3">
                    <label for="date_emprunt" class="form-label">date emprunt</label>
                    <input type="text" class="form-control" name="date_emprunt">
                </div>

                <div class="mb-3">
                    <label for="date_retour" class="form-label">date de retour</label>
                    <input type="text" class="form-control" name="date_retour">
                </div>

                <button type="submit" class="btn btn-warning" name="valider">Enregistrer en base</button>
        </form>
    </div>
    </div>
</body>

</html>