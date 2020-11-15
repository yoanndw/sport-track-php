<?php
    class SqliteConnection
    {
        private static $connection = null;

        private function __construct()
        {
            try
            {
                self::$connection = new PDO("sqlite:sport_track.db");
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e)
            {
                print("Error while accessing to DB: " . $e);
            }
        }

        public static function getConnection()
        {
            if (self::$connection == null)
            {
                new SqliteConnection();
            }

            return self::$connection;
        }
    }
?>