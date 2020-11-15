<?php
    require_once("calcul_dist.php");

    class CalculDistanceImpl implements CalculDistance
    {
        public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2)
        {
            $r = 6378.137*1000.0; // km -> m
            
            $lat1 = deg2rad($lat1);
            $long1 = deg2rad($long1);
            
            $lat2 = deg2rad($lat2);
            $long2 = deg2rad($long2);

            $dist = $r*acos(sin($lat2)*sin($lat1) + cos($lat2)*cos($lat1)*cos($long2 - $long1));

            return $dist;
        }

        public function calculDistanceTrajet(Array $parcours)
        {
            $dist = 0;
            for ($i=0; $i + 1 < count($parcours); $i++)
            {
                $point1 = $parcours[$i];
                $point2 = $parcours[$i + 1];

                $lat1 = $point1[0];
                $long1 = $point1[1];
                
                $lat2 = $point2[0];
                $long2 = $point2[1];

                $dist += $this->calculDistance2PointsGPS($lat1, $long1, $lat2, $long2);
            }

            return $dist;
        }
    }
?>