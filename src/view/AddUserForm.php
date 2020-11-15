<!DOCTYPE html>
<html>
<header>
</header>
    <title>Inscription - Sport Track</title>
<body>
    <h1>Nouveau compte utilisateur</h1>
    <form action="?page=user_add" method="post">
        <div>
            <label for="lname">Nom</label><br>
            <input type="text" name="lname">
        </div>

        <div>
            <label for="fname">Prenom</label><br>
            <input type="text" name="fname">
        </div>

        <div>
            <label for="birth_date">Date de naissance</label><br>
            <input type="date" name="birth_date">
        </div>

        <div>
            <label for="gender">Sexe</label><br>
            <input type="radio" name="gender" value="male" required>
            <label for="male">Homme</label>

            <input type="radio" name="gender" value="female" required>
            <label for="female">Femme</label>
        </div>

        <div>
            <label for="size">Taille</label><br>
            <input type="number" name="size" required>
            <label for="">cm</label>
        </div>

        <div>
            <label for="weight">Poids</label><br>
            <input type="number" name="weight" required>
            <label for="">kg</label>
        </div>

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