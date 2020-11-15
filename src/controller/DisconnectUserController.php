<?php
    require_once("Controller.php");
    
    require_once(dirname(__DIR__) . "/model/User.php");
    require_once(dirname(__DIR__) . "/model/UserDAO.php");
    
    class DisconnectUserController implements Controller
    {
        public function handle($request)
        {
            echo "<h1>";
            if (isset($_SESSION["connected_user"]))
            {
                unset($_SESSION["connected_user"]);

                echo "Deconnecte avec succes !";
                echo "</h1>";
            }
            else
            {
                echo "Vous n'etes pas connecte";
                echo "</h1>";
            }

            echo '<a href="?page=/">Accueil</a>';
        }
    }
?>