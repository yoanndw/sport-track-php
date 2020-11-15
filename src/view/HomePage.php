<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Track - Suivi d'activites en ligne</title>
</head>

<body>
    <h1>Bienvenue sur Sport Track</h1>
    
    <?php
        if (isset($_SESSION["connected_user"]))
        {
            echo "<h2>Bonjour " . $_SESSION["connected_user"]->getFirstName() . " !</h2>";
        }
    ?>

    <a href="?page=user_add_form">S'inscrire</a><br>
    <a href="?page=user_connect_form">Se connecter</a>

    <?php
        if (isset($_SESSION["connected_user"]))
        {
            echo '<br><a href="?page=user_disconnect">Se deconnecter</a>';
            echo '<br><a href="?page=upload_activity_form">Enregistrer activite</a>';
            echo '<br><a href="?page=list_activities">Activites</a>';
        }
    ?>
</body>

</html>