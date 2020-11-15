<!DOCTYPE html>
<html>
<header>
    <title>Connexion - Sport Track</title>
</header>

<body>
    <h1>Se connecter</h1>
    <form action="?page=user_connect" method="post">
        <div>
            <label for="email">Adresse e-mail</label><br>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="pswd">Mot de passe</label><br>
            <input type="password" name="pswd" required>
        </div>

        <input type="submit" name="submit" value="Valider">
    </form>
</body>

</html>