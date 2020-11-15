<?php
    require_once("Controller.php");
    
    require_once(dirname(__DIR__) . "/model/Activity.php");
    require_once(dirname(__DIR__) . "/model/ActivityDAO.php");
    
    class ListActivityController implements Controller
    {
        public function handle($request)
        {
            if (isset($_SESSION["connected_user"]))
            {
                //echo "connected user is set";
                $usr = $_SESSION["connected_user"];

                $dao = ActivityDAO::getInstance();
                $activities = $dao->getUserActivities($usr);

                // Rows
                foreach ($activities as $akey => $act)
                {
                    echo "<tr>";
                    // Columns
                    echo "<td>" . $act->getUser() . "</td>";
                    echo "<td>" . $act->getDateStr() . "</td>";
                    echo "<td>" . $act->getDescription() . "</td>";
                    echo "<td>" . $act->getDistance() . "</td>";
                    echo "<td>" . $act->getDurationStr() . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                echo "</body>
                </html>";
            }
        }
    }
?>
