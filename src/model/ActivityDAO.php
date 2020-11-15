<?php
    require_once("SqliteConnection.php");

    class ActivityDAO
    {
        // DAO instance
        private static $dao = null;

        private function __construct() {}

        public static function getInstance()
        {
            if (self::$dao == null)
            {
                self::$dao = new ActivityDAO();
            }

            return self::$dao;
        }

        public function findAll()
        {
            $dbc = SqliteConnection::getConnection();
            
            $query = "SELECT * FROM Activity ORDER BY idActivity";
            $stmt = $dbc->query($query);

            return $stmt->fetchAll(PDO::FETCH_CLASS, "Activity");
        }

        public function insert($act)
        {
            if ($act instanceof Activity)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "INSERT INTO Activity VALUES (:i, :d, :de, :u, :di, :du)";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":i", $act->getId(), PDO::PARAM_INT);
                $stmt->bindValue(":d", $act->getDate(), PDO::PARAM_INT);
                $stmt->bindValue(":de", $act->getDescription(), PDO::PARAM_STR);
                $stmt->bindValue(":u", $act->getUser(), PDO::PARAM_STR); // date
                $stmt->bindValue(":di", $act->getDistance(), PDO::PARAM_INT);
                $stmt->bindValue(":du", $act->getDuration(), PDO::PARAM_INT);

                $stmt->execute();
            }
        }

        public function delete($act)
        {
            if ($act instanceof Activity)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "DELETE FROM Activity
                WHERE idActivity = :i 
                AND UPPER(actDate) = UPPER(:d) 
                AND UPPER(description) = UPPER(:de)
                AND UPPER(user) = UPPER(:u)
                AND distanceTot = :di
                AND dureeTot = :du";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":i", $act->getId(), PDO::PARAM_INT);
                $stmt->bindValue(":d", $act->getDate(), PDO::PARAM_INT);
                $stmt->bindValue(":de", $act->getDescription(), PDO::PARAM_STR);
                $stmt->bindValue(":u", $act->getUser(), PDO::PARAM_STR); // date
                $stmt->bindValue(":di", $act->getDistance(), PDO::PARAM_INT);
                $stmt->bindValue(":du", $act->getDuration(), PDO::PARAM_INT);

                $stmt->execute();
            }
        }

        public function update($act)
        {
            if ($act instanceof Activity)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "UPDATE Activity 
                SET actDate = :d,
                    description = :de,
                    user = :u
                    distanceTot = :di
                    dureeTot = :du
                WHERE idActivity = :i"; 

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":i", $act->getId(), PDO::PARAM_INT);
                $stmt->bindValue(":d", $act->getDate(), PDO::PARAM_INT);
                $stmt->bindValue(":de", $act->getDescription(), PDO::PARAM_STR);
                $stmt->bindValue(":u", $act->getUser(), PDO::PARAM_STR); // date
                $stmt->bindValue(":di", $act->getDistance(), PDO::PARAM_INT);
                $stmt->bindValue(":du", $act->getDuration(), PDO::PARAM_INT);

                $stmt->execute();
            }
        }

        public function getUserActivities($usr)
        {
            if ($usr instanceof User)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "SELECT * 
                FROM Activity
                WHERE UPPER(user) = UPPER(:m)";
                
                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":m", $usr->getEmail(), PDO::PARAM_STR);

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_CLASS, "Activity");
            }
        }
    }
?>