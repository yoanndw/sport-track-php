<?php
    require_once("SqliteConnection.php");

    class ActivityDataDAO
    {
        // DAO instance
        private static $dao = null;

        private function __construct() {}

        public static function getInstance()
        {
            if (self::$dao == null)
            {
                self::$dao = new ActivityDataDAO();
            }

            return self::$dao;
        }

        public function findAll()
        {
            $dbc = SqliteConnection::getConnection();
            
            $query = "SELECT * FROM ActivityData ORDER BY idData";
            $stmt = $dbc->query($query);

            return $stmt->fetchAll(PDO::FETCH_CLASS, "ActivityData");
        }

        public function insert($act)
        {
            if ($act instanceof ActivityData)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "INSERT INTO ActivityData VALUES (:i, :d, :de, :la, :l, :a, :ac)";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":i", $act->getId(), PDO::PARAM_STR);
                $stmt->bindValue(":d",  format_time($act->getTime()), PDO::PARAM_STR);
                $stmt->bindValue(":de", $act->getCardioFreq(), PDO::PARAM_STR);
                $stmt->bindValue(":la", $act->getLatitude(), PDO::PARAM_STR);
                $stmt->bindValue(":l", $act->getLongitude(), PDO::PARAM_STR);
                $stmt->bindValue(":a", $act->getAltitude(), PDO::PARAM_STR);
                $stmt->bindValue(":ac", $act->getActivity(), PDO::PARAM_STR);

                $stmt->execute();
            }
        }

        public function delete($act)
        {
            if ($act instanceof Activity)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "DELETE FROM ActivityData
                WHERE idData = :i
                AND UPPER(time) = UPPER(:d) 
                AND cardioFreq = :de
                AND latitude = :la
                AND longitude = :l
                AND altitude = :a
                AND fkactivity = :ac";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":i", $act->getId(), PDO::PARAM_STR);
                $stmt->bindValue(":d",  $act->getTime(), PDO::PARAM_STR);
                $stmt->bindValue(":de", $act->cardioFreq(), PDO::PARAM_STR);
                $stmt->bindValue(":la", $act->getLatitude(), PDO::PARAM_STR);
                $stmt->bindValue(":l", $act->getLongitude(), PDO::PARAM_STR);
                $stmt->bindValue(":a", $act->getAltitude(), PDO::PARAM_STR);
                $stmt->bindValue(":ac", $act->getActivity(), PDO::PARAM_STR);

                $stmt->execute();
            }
        }

        public function update($act)
        {
            if ($act instanceof Activity)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "UPDATE User 
                SET time = :d,
                    description = :de,
                    user = :u                
                WHERE idActivity = :i"; 

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":i", $act->getId(), PDO::PARAM_STR);
                $stmt->bindValue(":d",  format_time($act->getTime()), PDO::PARAM_STR);
                $stmt->bindValue(":de", $act->cardioFreq(), PDO::PARAM_STR);
                $stmt->bindValue(":la", $act->getLatitude(), PDO::PARAM_STR);
                $stmt->bindValue(":l", $act->getLongitude(), PDO::PARAM_STR);
                $stmt->bindValue(":a", $act->getAltitude(), PDO::PARAM_STR);
                $stmt->bindValue(":ac", $act->getActivity(), PDO::PARAM_STR);

                $stmt->execute();
            }
        }

        public function getActivityData($act)
        {
            if ($act instanceof Activity)
            {
                $dbc = SqliteConnection::getConnection();
                $query = "SELECT * 
                FROM ActivityData
                WHERE fkActivity = :a";
                
                $stmt = $dbc->prepare($query);
                $stmt->bindValue(":a", $act->getId(), PDO::PARAM_STR);

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_CLASS, "ActivityData");
            }
        }
    }
?>