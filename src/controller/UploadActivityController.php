<?php
    require_once("Controller.php");
    
    require_once(dirname(__DIR__) . "/model/Activity.php");
    require_once(dirname(__DIR__) . "/model/ActivityDAO.php");
    require_once(dirname(__DIR__) . "/model/compute_dist_json.php");
    
    class UploadActivityController implements Controller
    {
        public function handle($request)
        {
            if (isset($_FILES["last_activity"]))
            {
                $file = $_FILES["last_activity"];

                $tmp_name = $file["tmp_name"];

                $email = $_SESSION["connected_user"]->getEmail();
                $act = (new JsonCompute())->jsonToActivity($email, file_get_contents($tmp_name));

                $dao = ActivityDAO::getInstance();
                $dao->insert($act);
            }
        }
    }
?>
