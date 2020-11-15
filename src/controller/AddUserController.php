<?php
    require_once("Controller.php");

    // TODO : change this
    require_once(dirname(__DIR__) . "/model/User.php");
    require_once(dirname(__DIR__) . "/model/UserDAO.php");

    class AddUserController implements Controller
    {
        public function handle($request)
        {
            $lname = $request["lname"];
            $fname = $request["fname"];
            
            $date = $request["birth_date"];
            $gender = $request["gender"];
            
            $size = $request["size"];
            $weight = $request["weight"];

            $email = $request["email"];
            $pswd = $request["pswd"];

            $user = new User();
            $user->init($email, $lname, $fname, $date, $gender, $size, $size, $pswd);

            $dao = UserDAO::getInstance();

            echo "<h1>";
            if ($dao->emailExists($email))
            {
                echo "L'adresse email '$email' est deja utilisee";
                echo "</h1>";
                
                echo '<a href="?page=user_add_form">Retour</a>';
            }
            else
            {
                $dao->insert($user);
                
                echo "Compte cree avec succes !";
                echo "</h1>";
                
                echo '<a href="?page=/">Accueil</a>';
            }
        }
    }
?>
