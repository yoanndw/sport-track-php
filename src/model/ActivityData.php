<?php
    require_once("Activity.php");

    class ActivityData
    {
        private $idData;

        private $time;
        private $cardioFreq;
        
        private $latitude;
        private $longitude;
        private $altitude;
        
        private $fkActivity;

        public function __construct() {}

        public function init($id, $time, $cardioFreq, $lat, $long, $alt, $act)
        {
            $this->idData = $id;
            $this->time = $time;
            $this->cardioFreq = $cardioFreq;
            $this->latitude = $lat;
            $this->longitude = $long;
            $this->altitude = $alt;
            $this->fkActivity = $act;
        }

        public function getId()
        {
            return $this->idData;
        }

        public function getTime()
        {
            return $this->time;
        }

        public function getCardioFreq()
        {
            return $this->cardioFreq;
        }

        public function getLatitude()
        {
            return $this->latitude;
        }

        public function getLongitude()
        {
            return $this->longitude;
        }

        public function getAltitude()
        {
            return $this->altitude;
        }

        public function getActivity()
        {
            return $this->fkActivity;
        }
    }
?>