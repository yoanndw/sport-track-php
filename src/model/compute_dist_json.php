<?php
    require_once("Activity.php");
    require_once("calcul_dist_impl.php");
    class JsonCompute
    {
        private $calc_dist;

        public function __construct()
        {
            $this->calc_dist = new CalculDistanceImpl();
        }

        public function jsonToActivity(string $currentUser, string $content)
        {
            $act = new Activity();
            $json = json_decode($content);

            $date = strtotime($json->{"activity"}->{"date"}); // h:m:s -> Unix timestamp
            $desc = $json->{"activity"}->{"description"};

            $dist = $this->calculDistanceDepuisJson($content);
            $duree = $this->calculDureeDepuisJson($content);

            $act->init(time(), $date, $desc, $currentUser, $dist, $duree);
            return $act;
        }

        private function calculDistanceDepuisJson(string $json_content)
        {
            /*
            {
                "activity":{
                    "date":"01/09/2018",
                    "description": "IUT -> RU"
                },
                "data":[
                    {"time":"13:00:00","cardio_frequency":99,"latitude":47.644795,"longitude":-2.776605,"altitude":18},
                    {"time":"13:00:05","cardio_frequency":100,"latitude":47.646870,"longitude":-2.778911,"altitude":18},
                    {"time":"13:00:10","cardio_frequency":102,"latitude":47.646197,"longitude":-2.780220,"altitude":18},
                    {"time":"13:00:15","cardio_frequency":100,"latitude":47.646992,"longitude":-2.781068,"altitude":17},
                    {"time":"13:00:20","cardio_frequency":98,"latitude":47.647867,"longitude":-2.781744,"altitude":16},
                    {"time":"13:00:25","cardio_frequency":103,"latitude":47.648510,"longitude":-2.780145,"altitude":16}
                ]
            }
            */
            $json = json_decode($json_content);

            $data_arr = $json->{"data"};

            $parcours = array();
            foreach ($data_arr as $key => $value)
            {
                $lat = $value->{"latitude"};
                $long = $value->{"longitude"};

                array_push($parcours, array($lat, $long));
            }

            return $this->calc_dist->calculDistanceTrajet($parcours);
        }

        private function calculDureeDepuisJson(string $json_content)
        {
            $json = json_decode($json_content);
            
            $data_arr = $json->{"data"};
            
            $time = 0;
            if (count($data_arr) != 0)
            {
                $last = $data_arr[count($data_arr) - 1];
                $first = $data_arr[0];

                $end = strtotime($last->{"time"});
                $start = strtotime($first->{"time"});

                $time = $end - $start;
            }

            return $time;
        }

        public function calculDistanceDepuisFichier(string $filename)
        {
            $content = file_get_contents($filename);
            return $this->calculDistanceDepuisJson($content);
        }
        
        public function calculDureeDepuisFichier(string $filename)
        {
            $content = file_get_contents($filename);
            return $this->calculDureeDepuisJson($content);
        }
    }
?>