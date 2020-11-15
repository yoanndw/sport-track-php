<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout activite - Sport Track</title>
</head>

<body>
    <form action="?page=upload_activity" enctype="multipart/form-data" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000">

        <div>
            <label for="last_activity">Selectionner fichier a enregistrer</label><br>
            <input type="file" accept=".json" name="last_activity">
        </div>

        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
    </form>

    <a href="?page=/">Retour</a>
</body>

</html>