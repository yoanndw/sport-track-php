<?php
    require_once("SqliteConnection.php");

    class UserDAO
    {
        // DAO instance
        private static $dao = null;

        private function __construct() {}

        public static function getInstance()
        {
            if (self::$dao == null)
            {
                self::$dao = new UserDAO();
            }

            return self::$dao;
        }

        public function findAll()
        {
            $dbc = SqliteConnection::getConnection();
            
            $query = "SELECT * FROM User ORDER BY lastName, firstName";
            $stmt = $dbc->query($query);

            return $stmt->fetchAll(PDO::FETCH_CLASS, "User");
        }

        public function emailExists(string $email)
        {
            $dbc = SqliteConnection::getConnection();
            $query = "SELECT * FROM User WHERE UPPER(email) = UPPER(:m)";

            $stmt = $dbc->prepare($query);
            $stmt->bindValue(":m", $email);

            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_NUM);

            return count($rows) > 0;
        }

        public function identifyUser($email, $pass)
        {
            $dbc = SqliteConnection::getConnection();
            $query = "SELECT * FROM User 
            WHERE email = :m 
            AND password = :p";

            $stmt = $dbc->prepare($query);
            $stmt->bindValue(":m", $email);
            $stmt->bindValue(":p", $pass);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, "User")[0];
        }

        public function insert($usr)
        {
            if ($usr instanceof User)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "INSERT INTO User VALUES (:m, :ln, :fn, :b, :g, :s, :w, :p)";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":m", $usr->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(":ln", $usr->getLastName(), PDO::PARAM_STR);
                $stmt->bindValue(":fn", $usr->getFirstName(), PDO::PARAM_STR);
                $stmt->bindValue(":b", $usr->getBirthDate(), PDO::PARAM_INT); // date
                $stmt->bindValue(":g", $usr->getGender(), PDO::PARAM_STR);
                $stmt->bindValue(":s", $usr->getSize(), PDO::PARAM_INT);
                $stmt->bindValue(":w", $usr->getWeight(), PDO::PARAM_INT);
                $stmt->bindValue(":p", $usr->getPassword(), PDO::PARAM_STR);

                $stmt->execute();
            }
        }

        public function delete($usr)
        {
            if ($usr instanceof User)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "DELETE FROM User 
                WHERE UPPER(email) = UPPER(:m) 
                AND UPPER(lastName) = UPPER(:ln) 
                AND UPPER(firstName) = UPPER(:fn)
                AND UPPER(birthDate) = UPPER(:b)
                AND UPPER(gender) = UPPER(:g)
                AND UPPER(size) = UPPER(:s)
                AND UPPER(weight) = UPPER(:w)
                AND UPPER(password) = UPPER(:p)";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":m", $usr->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(":ln", $usr->getLastName(), PDO::PARAM_STR);
                $stmt->bindValue(":fn", $usr->getFirstName(), PDO::PARAM_STR);
                $stmt->bindValue(":b", $usr->getBirthDate(), PDO::PARAM_INT); // date
                $stmt->bindValue(":g", $usr->getGender(), PDO::PARAM_STR);
                $stmt->bindValue(":s", $usr->getSize(), PDO::PARAM_INT);
                $stmt->bindValue(":w", $usr->getWeight(), PDO::PARAM_INT);
                $stmt->bindValue(":p", $usr->getPassword(), PDO::PARAM_STR);

                $stmt->execute();
            }
        }

        public function update($usr)
        {
            if ($usr instanceof User)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "UPDATE User 
                SET lastName = :ln,
                    firstName = :fn,
                    birthDate = :b,
                    gender = :g,
                    size = :s,
                    weight = :w,
                    password = :p                
                WHERE UPPER(email) = UPPER(:m)"; 

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":m", $usr->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(":ln", $usr->getLastName(), PDO::PARAM_STR);
                $stmt->bindValue(":fn", $usr->getFirstName(), PDO::PARAM_STR);
                $stmt->bindValue(":b", $usr->getBirthDate(), PDO::PARAM_INT); // date
                $stmt->bindValue(":g", $usr->getGender(), PDO::PARAM_STR);
                $stmt->bindValue(":s", $usr->getSize(), PDO::PARAM_INT);
                $stmt->bindValue(":w", $usr->getWeight(), PDO::PARAM_INT);
                $stmt->bindValue(":p", $usr->getPassword(), PDO::PARAM_STR);

                $stmt->execute();
            }
        }
    }
?>