<?php
    class Activity
    {
        private $idActivity;

        private $actDate;
        private $description;

        private $user;

        private $distanceTot;
        private $dureeTot;

        public function __construct() {}

        public function init($id, $date, $desc, $usr, $dist, $duree)
        {
            $this->idActivity = $id;
            $this->actDate = $date;
            $this->description = $desc;
            $this->user = $usr;
            $this->distanceTot = $dist;
            $this->dureeTot = $duree;
        }

        public function getId()
        {
            return $this->idActivity;
        }

        public function getDate()
        {
            return $this->actDate;
        }

        public function getDateStr()
        {
            return date("d/m/Y", $this->actDate);
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getUser()
        {
            return $this->user;
        }

        public function getDistance()
        {
            return $this->distanceTot;
        }

        public function getDuration()
        {
            return $this->dureeTot;
        }

        public function getDurationStr()
        {
            return date("H:i:s", $this->dureeTot);
        }
    }
?>