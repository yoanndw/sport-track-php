<?php
    require_once("Controller.php");
    
    require_once(dirname(__DIR__) . "/model/User.php");
    require_once(dirname(__DIR__) . "/model/UserDAO.php");
    
    class ConnectUserController implements Controller
    {
        public function handle($request)
        {
            $email = $request["email"];
            $pswd = $request["pswd"];
            
            $dao = UserDAO::getInstance();
            $user = $dao->identifyUser($email, $pswd);
            
            echo "<h1>";
            if (!$user)
            {
                echo "Identifiant ou mot de passe invalide";
                echo "</h1>";
                
                echo '<a href="?page=user_connect_form">Retour</a>';
            }
            else
            {
                echo "Vous etes maintenant connecte";
                echo "</h1>";

                $_SESSION["connected_user"] = $user;

                echo '<a href="?page=/">Accueil</a>';
            }
        }
    }
?>
